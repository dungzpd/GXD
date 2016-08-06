<?php

namespace Backend\Controllers;

use Auth;
use Alloy\Models\Users;
use Alloy\Validations\UsersValidate;
use Alloy\Services\Commons;
use Alloy\Facades\MainFacade;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Backend\Controllers\BaseController;

class CustomersController extends BaseController {
    protected $currentUser;
    protected $currentFilterRoles;
    protected $currentFilterRoleIds;

    public function __construct() {        
        parent::__construct();
        
        $this->middleware('admin:admin/sale_lead/sale');

        $this->currentUser = Auth::user();
        $this->currentFilterRoles = $this->filterRoles($this->currentUser->role->name);
        $this->currentFilterRoleIds = $this->filterRoles($this->currentUser->role->name, 'id');
    }

    public function index() {      
    	
        $field = Input::get('field');
        $sort = Input::get('sort');
        Input::get('keyword') ? $keyword = Input::get('keyword') : 1 == 1;

        $users = Users::where('id', '!=', $this->currentUser->id)->whereIn('role_id', $this->currentFilterRoleIds);

        if(empty($field) && empty($sort)) {
            $users = $users->orderBy('created_at', 'asc')->paginate($this->perPage);
        } else {
            ($field == 'role') ? $col = 'role_id' : $col = $field;
            $users = $users->orderBy($col, $sort)->paginate($this->perPage);
        }
        
        
        if(isset($keyword)) {
            $users = Users::where('id', '!=', $this->currentUser->id)
                    ->whereIn('role_id', $this->currentFilterRoleIds)                                      
                    ->where(function ($query) use ($keyword) {
                        $query->where('username', 'like', '%'. $keyword .'%')
                                ->orWhere('email', 'like', '%'. $keyword .'%')
                                ->orWhere('name', 'like', '%'. $keyword .'%');
                    })
                    ->orderBy('created_at', 'desc')  
                    ->paginate($this->perPage);    
        } else {
            $keyword = null;
        }
        
        return view('Backend::customers.index', compact('users', 'keyword', 'field', 'sort'));
    }
    public function create(Request $request) {
        $result = array('status' => false, 'action' => 'create', 'title' => 'customers.accountCreate', 'breadcrumbs' => 'account.create', 'actionForm' => URL::action('\Backend\Controllers\CustomersController@create'), 'data' => '', 'messages' => array('success' => '', 'errors' => ''));
        if ($request->isMethod('POST')) {
            $params = Input::all();
            $result = $this->doCreate($params, $result);
            if($result['status'] !== false) {
                if (isset($params['saveAndCreate'])) {
                    return redirect()->action('\Backend\Controllers\CustomersController@create');
                }
                return redirect()->action('\Backend\Controllers\CustomersController@index');
            }            
        }
                       
        $result['roles'] = $this->currentFilterRoles;
        $result['isEdit'] = false;
        
        return view('Backend::customers.form', $result);
    }
   

    protected function doCreate($data, $result) {               
        $result['data'] = $data;
        
        $userValidate = new UsersValidate();
        $validator = $userValidate->validatorCreate($data);            
        if ($validator->errors()->count() > 0) {
            $result['messages']['errors'] = $validator->errors()->getMessages();            
            return $result;
        }

        $passNotHash = $data['password'];
        
        $services = new Commons();
        $data['confirmed'] = 1;
        $data['confirmation_code'] = $services->randomString(6);
        $data['password'] = bcrypt($data['password']);
                
        $image = $services->upload('avatar', $this->dirAvatar);
        if($image) {
            $data['avatar'] = $this->dirAvatar . '/' . $image;
        }
        
        $user = Users::create($data);
        
        if ($user->exists) {
            $findAdmin = Users::whereRoleId(1)->first();            
            if($user['email']) {
                $link = URL::action('\Frontend\Controllers\AuthController@login');
                $mailContent = array('subject' => 'Thông tin tài khoản', 'from' => $findAdmin['email'], 'to' => $user['email'], 'name' => $user['username'], 'link' => $link, 'password' => $passNotHash);                
                MainFacade::sendEmail('Backend::layouts.emailtemplates.password', $mailContent);      
            }
                  
            $result['status'] = true;
            $result['data'] = $user;
            $result['messages'] = array('success' => 'Bạn đã tạo thành công một tài khoản', 'errors' => '');
            
            return $result;            
        }

        $result['messages']['errors'] = array('common' => 'Có lỗi xảy ra trong quá trình xử lý dữ liệu');

        return $result;
    }
    
    public function edit($id, Request $request) {
        if(!$id) {
            return redirect()->action('\Backend\Controllers\CustomersController@index');
        }
        
        $user = Users::find($id);
        if(!$user) {
            return redirect()->action('\Backend\Controllers\CustomersController@index');
        }
        
        $result = array('status' => false, 'data' => $user, 'action' => 'edit', 'title' => 'user.accountEdit', 'breadcrumbs' => 'account.edit', 'actionForm' => URL::action('\Backend\Controllers\CustomersController@edit', array('id' => $id)), 'messages' => array('success' => '', 'errors' => ''));
        if ($request->isMethod('POST')) {
            $result = $this->doEdit(Input::all(), $user, $result);          
        }
        
        $result['roles'] = $this->currentFilterRoles;
        $result['isEdit'] = true;
        
        return view('Backend::user.form', $result);
    }
    
    protected function doEdit($data, $user, $result) {               
        $result['data'] = $data;
        $data['id'] = $user->id;
        
        $userValidate = new UsersValidate();
        $validator = $userValidate->validatorEdit($data);            
        if ($validator->errors()->count() > 0) {
            $result['messages']['errors'] = $validator->errors()->getMessages();            
            return $result;
        }
        
        $services = new Commons();
        $image = $services->upload('avatar', $this->dirAvatar);
        if($image) {
            $data['avatar'] = $this->dirAvatar . '/' . $image;
        }
        
        $user->update($data);
        if ($user->exists) {      
            $result['status'] = true;
            $result['data'] = $user;
            $result['messages'] = array('success' => 'Bạn đã cập nhật thành công tài khoản', 'errors' => '');
            
            return $result;
        }

        $result['messages']['errors'] = array('common' => 'Có lỗi xảy ra trong quá trình xử lý dữ liệu');

        return $result;
    }
    
    public function delete($id) {
        $params = \Request::all();
        $currentPage = !empty($params['currentPage']) ? $params['currentPage'] : '';
        if($id) {
            $user = Users::find($id);
            if($user) {                
                $user->forceDelete();
            }
        }
        
        return redirect()->action('\Backend\Controllers\CustomersController@index', ['page' => $currentPage]);
    }
    
    public function status($id) {
        if($id) {
            $user = Users::find($id);            
            if($user) {
                $user->status > 0 ? $user->status = 0 : $user->status = 1;
                $user->save();
            }
        }
        
        return redirect()->action('\Backend\Controllers\CustomersController@index');
    }
    
}
