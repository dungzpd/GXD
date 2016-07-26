<?php

namespace Backend\Controllers;

use Auth;

use Alloy\Models\Courses;
use Alloy\Models\Lessons;
use Alloy\Models\Questions;
use Alloy\Validations\QuestionValidate;
use Alloy\Services\Commons;
use Alloy\Facades\MainFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Backend\Controllers\BaseController;

class QuestionController extends BaseController {
    protected $currentUser;
    protected $model;
    protected $validate;
    protected $commonService;

    public function __construct() {        
        parent::__construct();
        
        $this->middleware('admin:admin/sale_lead/teacher_internal/teacher_external/staff');
        
        $this->model = new Questions();
        $this->validate = new QuestionValidate();
        $this->commonService = new Commons();
        $this->currentUser = Auth::user();      
    }

    public function index() {      
        $field = Input::get('field');
        $sort = Input::get('sort');                
                        
        $obj = ($this->currentUser->role->name !== 'admin') ? $this->model->where('author_id', '=', $this->currentUser->id) : $this->model;    
               
        if(empty($field) && empty($sort)) {
            $obj = $obj->orderBy('created_at', 'desc')->paginate($this->perPage);
        } else {        
            $col = ($field == 'author') ? 'author_id' : $field;
            $obj = $obj->orderBy($col, $sort)->paginate($this->perPage);
        }
        
        Input::get('keyword') ? $keyword = Input::get('keyword') : 1 == 1;
        if(isset($keyword)) {
            $obj = $this->model                    
                    ->where(function ($query) use ($keyword) {
                        $query->where('question', 'like', '%'. $keyword .'%');
                    });
                    
                    if($this->currentUser->role->name !== 'admin') {
                        $obj = $obj->where('author_id', '=', $this->currentUser->id)
                                    ->orderBy('created_at', 'desc')  
                                    ->paginate($this->perPage);    
                    } else {
                        $obj = $obj->orderBy('created_at', 'desc')  
                                    ->paginate($this->perPage);     
                    }                                              
        } else {
            $keyword = null;
        }
        
        return view('Backend::question.index', compact('obj', 'keyword', 'field', 'sort'));
    }
    
    public function create(Request $request) {
        $currentCourse = Input::get('course');
        $currentLesson = Input::get('lesson');
        
        $result = array('status' => false, 'action' => 'create', 'title' => 'question.create', 'breadcrumbs' => 'question.create', 'actionForm' => URL::action('\Backend\Controllers\QuestionController@create'), 'data' => '', 'messages' => array('success' => '', 'errors' => ''));
        if ($request->isMethod('POST')) {
            $params = Input::all();
            $result = $this->doCreate($params, $result);
            
            if($result['status'] !== false) {
                $course = (!empty($result['data']['type_course'])) ? $result['data']['type_course'] : 0;
                $lesson = (!empty($result['data']['type_lession'])) ? $result['data']['type_lession'] : 0;
                
                if (!isset($params['saveAndCreate'])) {
                    return redirect()->action('\Backend\Controllers\QuestionController@index');    
                }
                
                return redirect()->action('\Backend\Controllers\QuestionController@create', array('course' => $course, 'lesson' => $lesson));
            }   
        }
                       
        $result['courses'] = Courses::all();
        $result['lessons'] = Lessons::all();
        $result['currentCourse'] = $currentCourse;
        $result['currentLesson'] = $currentLesson;
        $result['isEdit'] = false;

        return view('Backend::question.form', $result);
    }

    protected function doCreate($data, $result) {                       
        $result['data'] = $data;                
        $validator = $this->validate->validatorCreate($data);            
        if ($validator->errors()->count() > 0) {
            $result['messages']['errors'] = $validator->errors()->getMessages();            
            return $result;
        }                
        
        $caculatePercent = $this->commonService->caculatePercent($data['answes'], $data['type_answer'], $data['answer_image'], $this->dirAnswer);
        if($caculatePercent['status'] !== false) {
            $data['answes'] = json_encode($caculatePercent['data']);
            $data['type'] = $caculatePercent['type'];
        } else {
            $result['messages']['errors'] = array('answes' => array($caculatePercent['message']));
            
            return $result;
        }
        
        $data['author_id'] = $this->currentUser->id;                        
        $image = $this->commonService->upload('question_image', $this->dirQuestion);
        if($image) {
            $data['question_image'] = $image;            
        }                
        
        $obj = $this->model->create($data);
        
        if ($obj->exists) {                             
            $result['status'] = true;
            $result['data'] = $obj;
            $result['messages'] = array('success' => 'Bạn đã tạo thành công một câu hỏi', 'errors' => '');
            
            return $result;            
        }

        $result['messages']['errors'] = array('common' => 'Có lỗi xảy ra trong quá trình xử lý dữ liệu');

        return $result;
    }
    
    public function edit($id, Request $request) {
        if(!$id) {
            return redirect()->action('\Backend\Controllers\QuestionController@index');
        }
        
        $obj = $this->model->find($id);
        if(!$obj) {
            return redirect()->action('\Backend\Controllers\QuestionController@index');
        }        
        
        $data = $obj->toArray();
        if(!empty($data['answes'])) {
            $answerInfo = !empty(json_decode($data['answes'])) ? json_decode($data['answes']) : [];
            $data['answes'] = array();
            foreach($answerInfo as $key => $val) {
                $data['answes'][$key] = $val->name;
                $data['type_answer'][$key] = ($val->percent > 5) ? 1 : 0;
                $data['answer_image'][$key] = !empty($val->image) ? $val->image : null;
            }
            
            $data['answes'][0] = $data['type_answer'][0] = $data['answer_image'][0] = '';
        }
        
        $result = array('status' => false, 'data' => $data, 'action' => 'edit', 'title' => 'question.edit', 'breadcrumbs' => 'question.edit', 'actionForm' => URL::action('\Backend\Controllers\QuestionController@edit', array('id' => $id)), 'messages' => array('success' => '', 'errors' => ''));
        if ($request->isMethod('POST')) {
            $result = $this->doEdit(Input::all(), $obj, $result);                 
        }
        
        $result['courses'] = Courses::all();
        $result['lessons'] = Lessons::all();
        $result['isEdit'] = true;
        
        $result['prev'] = $this->model->where('id', '<', $id)->max('id');
        $result['next'] = $this->model->where('id', '>', $id)->min('id');  
                
        return view('Backend::question.form', $result);
    }
    
    protected function doEdit($data, $obj, $result) {  
        $result['data'] = $data;
        $data['id'] = $obj->id;
                
        $validator = $this->validate->validatorEdit($data);            
        if ($validator->errors()->count() > 0) {            
            $result['messages']['errors'] = $validator->errors()->getMessages();            
            return $result;
        }
        
        $caculatePercent = $this->commonService->caculatePercent($data['answes'], $data['type_answer'], $data['answer_image'], $this->dirAnswer);
        if($caculatePercent['status'] !== false) {
            $data['answes'] = json_encode($caculatePercent['data']);
            $data['type'] = $caculatePercent['type'];
        } else {
            $result['messages']['errors'] = array('answes' => array($caculatePercent['message']));
            
            return $result;
        }
        
        $data['author_id'] = $this->currentUser->id;                        
        $image = $this->commonService->upload('question_image', $this->dirQuestion);
        if($image) {
            $data['question_image'] = $image;            
        }                
   
        $obj->update($data);
        if ($obj->exists) {
            $dataConvert = $obj->toArray();
            if(!empty($dataConvert['answes'])) {
                $answerInfo = json_decode($dataConvert['answes']);    
                $dataConvert['answes'] = array();
                foreach($answerInfo as $key => $val) {
                    $dataConvert['answes'][$key] = $val->name;
                    $dataConvert['type_answer'][$key] = ($val->percent > 5) ? 1 : 0;
                    $dataConvert['answer_image'][$key] = $val->image;
                }

                $dataConvert['answes'][0] = $dataConvert['type_answer'][0] = $dataConvert['answer_image'][0] = '';
            }
                              
            $result['status'] = true;
            $result['data'] = $dataConvert;
            $result['messages'] = array('success' => 'Bạn đã cập nhật thành công câu hỏi', 'errors' => '');            
            
            return $result;
        }

        $result['messages']['errors'] = array('common' => 'Có lỗi xảy ra trong quá trình xử lý dữ liệu');

        return $result;
    }
    
    public function delete($id) {
        $params = \Request::all();
        $currentPage = !empty($params['currentPage']) ? $params['currentPage'] : '';
        if($id) {
            $obj = $this->model->find($id);
            if($obj) {                
                $obj->forceDelete();
            }
        }
        
        return redirect()->action('\Backend\Controllers\QuestionController@index', ['page' => $currentPage]);
    }
    
    public function status($id) {
        if($id) {
            $obj = $this->model->find($id);
            if($obj) {
                $obj->status !== 'inactive' ? $obj->status = 'inactive' : $obj->status = 'active';
                $obj->save();
            }
        }
        
        return redirect()->action('\Backend\Controllers\QuestionController@index');
    }        
}
