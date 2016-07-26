<?php

/**
 * The controller of Lessons
 * 
 * @namespace Backend\Controllers
 * @class LessonsController
 * @extends BaseController
 *
 * @method 
 * {GET} index show all list of Course's categories.
 * {POST} create store the Course's category
 * {POST|PUT} edit update the Course's category
 * {POST|DELETE} delete delete the Course's category
 * {POST|DELETE} deleteMultiple destroy multiple Course's categories
 */

namespace Backend\Controllers;

use Auth;
use Lang;
use DB;
use URL;
use Alloy\Models\Lessons;
use Alloy\Models\Courses;
use Alloy\Models\Users;
use Alloy\Validations\LessonsValidate;
use Alloy\Facades\Run;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Backend\Controllers\BaseController as BaseController;

class LessonsController extends BaseController {

    protected $currentUser;
    protected $atributes;
    protected $imgPath;

    public function __construct() {
        $this->atributes = array(
            "name" => Lang::get('lesson.title'),
            "video" => Lang::get('lesson.video'),
            "posts" => Lang::get('lesson.posts'),
            "attach" => Lang::get('lesson.attach'),
            "exams" => Lang::get('lesson.exams'),
            "question_limit" => Lang::get('lesson.questionLimit'),
            "status" => Lang::get('lesson.status'),
        );
        $this->imgPath = 'images-lessons';
        $this->videoPath = 'videos-lessons';
        $this->attachPath = 'attachLessons';

        if (!Auth::check()) {
            return redirect()->action('\Backend\Controllers\AuthController@login');
        }
        // $this->middleware('admin:admin/sale_lead/teacher_internal/teacher_external/staff');

        $this->currentUser = Auth::user();
    }

    /**
     * show list all of Course's lessons
     * @method GET
     * @return view
     */
    public function index() {
        $currentUserId = $this->currentUser->id;
        $field = Input::get('field');
        $sort = Input::get('sort');
        $keyword = Input::get('keyword');
        $sttShare = (!empty(Input::get('success')) && 1 == Input::get('success')) ? true : false;

        $lessons = Lessons::where('author_id', '=', $currentUserId)
                ->getList(array('by' => $field, 'is' => $sort), array('fields' => ['name', 'video', 'posts', 'attach', 'exams'], 'value' => $keyword))
                ->paginate($this->perPage)
                ->appends(Input::only('field', 'keyword', 'sort'));

        // Get list of Lessons is shared for current User
        $lessonsShared = Lessons::whereHas('users', function ($query) use ($currentUserId) {
                    $query->where('child_id', '=', $currentUserId);
                })
                ->getList(array('by' => $field, 'is' => $sort), array('fields' => ['name', 'video', 'posts', 'attach', 'exams'], 'value' => $keyword))
                ->paginate($this->perPage)
                ->appends(Input::only('field', 'keyword', 'sort'));

        // Get list of Users has role share
        $users = Users::getByRole(
            ['admin', 'sale', 'sale_lead', 'teacher_internal', 'teacher_external', 'staff', 'user', 'user_mode'],
            [$currentUserId]
        )->get();

        // return view
        return view('Backend::lesson.index', compact('lessons', 'lessonsShared', 'users', 'keyword', 'field', 'sort', 'sttShare'));
    }

    /**
     * create the Course's category
     * @method POST
     * @param Request $request
     * return view
     */
    public function create(Request $request) {
        $result = array();
        $result['isEdit'] = false;


        if ($request->isMethod('post') && !empty($request->all())) {
            $result['data'] = $request->all();
            $dataLesson = $result['data']['lessons'];

            $validator = LessonsValidate::validator($result['data'], $result['isEdit'], 0);
            $result['messages'] = $validator->errors();

            if (!$result['messages']->count()) {
                // alias
                $aliasName = str_slug($dataLesson['name']);

                // video file
                $video = $this->uploadFile('lessons.video', $this->videoPath, $aliasName, null);
                if (false != $video) {
                    $dataLesson['video'] = $video;
                }
                // attach file
                $attach = $this->uploadFile('lessons.attach', $this->attachPath, $aliasName, null);
                if (false != $video) {
                    $dataLesson['attach'] = $attach;
                }

                $result['data']['lessons']['order'] = 1 + Lessons::max('order');
                if ($this->onStore(new Lessons, $dataLesson, false)) {
                    if (isset($result['data']['saveAndCreate'])) {
                        return redirect()->action('\Backend\Controllers\LessonsController@create');
                    }
                    return redirect()->action('\Backend\Controllers\LessonsController@index');
                }
            }
        }
        $result['data']['lessons']['videoPath'] = null;
        // $result['data']['courses'] = Courses::where('author_id', $this->currentUser->id)->where('status', '=', 'active')->get();
        //$result['data']['users'] = Users::notId($this->currentUser->id)->get();
        $result['url'] = \URL::action('\Backend\Controllers\LessonsController@create');
        return view('Backend::lesson.create', $result);
    }

    /**
     * Edit the lesson
     * @method POST|PUT
     * @param Request $request
     * return view
     */
    public function edit($id) {
        $result = array();

        $result['isEdit'] = true;
        $result['data']['coursesId'] = [];
        $result['data']['usersId'] = [];
        $result['success'] = false;

        if (\Request::isMethod('post') && !empty(\Request::all())) {
            $result['data'] = \Request::all();

            $validator = LessonsValidate::validator($result['data'], $result['isEdit'], $id);
            $result['messages'] = $validator->errors();
            if (!$result['messages']->count()) {

                $lesson = Lessons::find($id);
                if ($lesson) {
                    $dataLesson = $result['data']['lessons'];
                    $aliasName = str_slug($dataLesson['name']);
                    // video file
                    /*if (!\Request::hasFile('lessons.video')) {
                        if (Storage::disk(Run::disk($this->videoPath))->has($lesson->video)) {
                            Storage::disk(Run::disk($this->videoPath))->delete($lesson->video);
                        }
                    }*/
                    $video = $this->uploadFile('lessons.video', $this->videoPath, $aliasName, $lesson->video);
                    if (false != $video) {
                        $dataLesson['video'] = $video;
                    } else {
                        $dataLesson['video'] = $dataLesson['tmpVideo'];
                    }
                    // attach file
                    $attach = $this->uploadFile('lessons.attach', $this->attachPath, $aliasName, $lesson->attach);
                    if (false != $attach) {
                        $dataLesson['attach'] = $attach;
                    } else {
                        $dataLesson['attach'] = $dataLesson['tmpAttach'];
                    }

                    $result['data']['lessons']['order'] = $lesson->order;

                    if ($this->onStore($lesson, $dataLesson, true)) {
                        $result['success'] = true;
                        //return redirect()->action('\Backend\Controllers\LessonsController@index');
                    }
                }
            }
        }
        
        $result['data']['lessons'] = $lesson = Lessons::find($id);
        // $result['data']['courses'] = Courses::where('author_id', $this->currentUser->id)->where('status', '=', 'active')->get();
        $result['data']['users'] = Users::getByRole(
            ['admin', 'sale', 'sale_lead', 'teacher_internal', 'teacher_external', 'staff', 'user', 'user_mode'],
            [$this->currentUser->id]
        )->get();
        // convert
        foreach ($lesson->courses as $course) {
            $result['data']['coursesId'][] = $course->pivot->course_id;
        }
        // convert
        foreach ($lesson->users as $user) {
            $result['data']['usersId'][] = $user->pivot->child_id;
        }

        $result['url'] = \URL::action('\Backend\Controllers\LessonsController@edit', $result['data']['lessons']['id']);

        $result['data']['lessons']['videoPath'] = empty($lesson->video) ? null : URL::action('\Backend\Controllers\BaseController@streamFile', array('disk' => $this->videoPath, 'fileName' => $lesson->video));
        
        return view('Backend::lesson.create', $result);
    }

    /**
     * Share lesson for list of users.
     * @method POST|PUT
     * @param Request $request
     * return view
     */
    public function share($id) {
        if (\Request::isMethod('post') && !empty(\Request::all())) {
            $params = \Request::all();

            $lesson = Lessons::find($id);

            if ($lesson && $this->onStoreUser($lesson, $params)) {
                \Session::flash('success', true);
                return redirect()->action('\Backend\Controllers\LessonsController@index', ['success' => true]);
            }
        }
    }

    /**
     * delete the Lesson
     * @method POST|DELETE
     * @param integer $id
     * return view
     */
    public function delete($id) {
        $params = \Request::all();
        $currentPage = !empty($params['currentPage']) ? $params['currentPage'] : '';
        $lesson = Lessons::find($id);
        $lesson->courses()->detach();

        if ($lesson && $lesson->forceDelete()) {
            return redirect()->action('\Backend\Controllers\LessonsController@index', ['page' => $currentPage]);
        }
    }

    /**
     * delete multiple the Course's category
     * @method POST|DELETE
     * @param Request $request
     * return view
     */
    public function deleteMultiple(Request $request) {
        $params = \Request::all();
        if (Categories::destroy($params['arrId'])) {
            return redirect()->action('\Backend\Controllers\LessonsController@index');
        }
    }

    /**
     * change status of the course
     *
     * @param {integer} $id
     *
     * @return redirect
     *
     */
    public function status($id) {
        $params = \Request::all();
        $currentPage = !empty($params['currentPage']) ? $params['currentPage'] : 1;
        if($id) {
            $node = Lessons::find($id);
            if($node) {
                $node->status == 'active' ? $node->status = 'deactivate' : $node->status = 'active';
                $node->save();
            }
        }

        return redirect()->action('\Backend\Controllers\LessonsController@index', ['page' => $currentPage]);
    }

    /**
     * Private function onStore
     *
     * @param {Alloy\Models\Lessons} $lesson, {Array} $param, {boolean} $flag use check is edit or create
     * @return boolean
     * */
    private function onStore($lesson, $params, $flag) {
        $lesson->author_id = $this->currentUser->id;
        $lesson->name = isset($params['name']) ? $params['name'] : '';
        $lesson->alias = isset($params['alias']) ? $params['alias'] : '';
        $lesson->video = isset($params['video']) ? $params['video'] : '';
        $lesson->video_link = isset($params['video_link']) ? $params['video_link'] : '';
        $lesson->video_type = isset($params['video_type']) ? $params['video_type'] : 'upload';
        $lesson->attach = isset($params['attach']) ? $params['attach'] : '';
        $lesson->exams = isset($params['exams']) ? $params['exams'] : false;
        $lesson->attach = isset($params['attach']) ? $params['attach'] : '';
        $lesson->question_limit = isset($params['question_limit']) ? $params['question_limit'] : 0;
        $lesson->posts = isset($params['posts']) ? $params['posts'] : '';
        $lesson->order = isset($params['order']) ? $params['order'] : 0;
        $lesson->status = isset($params['status']) ? $params['status'] : 'inactive';

        if ($lesson->save()) {
            $params['courses'] = (isset($params['courses']) && !empty($params['courses'])) ? $params['courses'] : null;
            // $this->onStoreCourse($lesson, $params['courses'], $flag);
            $this->onStoreUser($lesson, $params);
            return true;
        }

        return false;
    }

    /**
     * Update courses
     * (Save attach to pivot table courses_lessons)
     * @param {Alloy\Models\Lessons} $lesson, {array} $coursesId
     * 
     * */
    private function onStoreCourse($lesson, $coursesId, $flag) {
        if (!empty($lesson)) {
            if ($lesson->courses() && (!isset($coursesId) || empty($coursesId))) {
                $lesson->courses()->detach();
            }

            if (!empty($coursesId)) {
                $courses = Courses::whereIn('id', $coursesId)->get();
                $sync = [];
                foreach ($courses as $course) {
                    $order = !empty($course->lessons->max('order')) ? $course->lessons->max('order') : 0;
                    $sync[$course->id] = [
                    'caption' => '',
                    'status' => '',
                    'order' => $flag ? $order : $order + 1,
                    'be_shared' => '',
                    ];
                }
                $lesson->courses() ? $lesson->courses()->sync($sync) : $lesson->courses()->attach($sync);
            }
            
        }
    }

    /**
     * Update users
     * (Save attach to pivot table users_lessons)
     * @param {Alloy\Models\Lessons} $lesson, {array} $usersId
     *
     * */
    private function onStoreUser($lesson, $params) {
        if (!empty($lesson) && !empty($params)) {
            if ($lesson->users() && (!isset($params['users']) || empty($params['users']))) {
                $lesson->users()->detach();
            }

            if (!empty($params['users']) && !empty($params['allow_share']) && '1' == $params['allow_share']) {
                $users = Users::whereIn('id', $params['users'])->get();

                $sync = [];
                foreach ($users as $user) {
                    $sync[$user->id] = [
                        'allow_share' => $params['allow_share'],
                        'user_id' => $this->currentUser->id,
                        'status' => config("model.status.1.value"),
                        'note' => ''
                    ];
                }
                $lesson->users() ? $lesson->users()->sync($sync) : $lesson->users()->attach($sync);
            }
            
            return true;
        }
        return false;
    }

    /**
     * updateCourse
     * */
    protected function updateCourse($lesson, $arrCsId, $fields, $exFields) {
        if ($lesson->courses() && empty($arrCsId)) {
            $lesson->courses()->detach();
        }

        $courses = Courses::whereIn('id', $arrCsId)->get();
        $sync = [];

        foreach ($courses as $course) {
            $extraFields = [];
            foreach ($fields as $field) {
                $extraFields[] = [$field => $exFields[$field]];
            }
            $sync[$category->id] = $extraFields;
        }
        $category->courses() ? $category->courses()->sync($sync) : $category->courses()->attach($sync);
    }

}
