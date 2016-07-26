<?php

namespace Backend\Controllers;

use Auth;

use Alloy\Models\Users;
use Alloy\Services\Commons;
use Alloy\Facades\MainFacade;
use Alloy\Validations\MainValidate;
use Alloy\Validations\UsersValidate;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers;

    protected $perPage = 20;
    protected $dirAvatar = 'backend/upload/images/avatars/origins';
    
    public function __construct() {
        
    }

    public function index() {     
        if(!Auth::check()) {
            return redirect()->action('\Backend\Controllers\AuthController@login');                             
        } 
        
        return view('Backend::auth.index');
    }

    public function login(Request $request) {    
        if(Auth::check()) {            
            return redirect()->action('\Backend\Controllers\AuthController@index');                             
        } 
        
        $result = array('status' => false, 'data' => '', 'messages' => array('success' => '', 'errors' => ''));
        if ($request->isMethod('post')) {
            $result = $this->doLogin(Input::all());           
            if($result['status'] !== false) {                
                return redirect()->action('\Backend\Controllers\AuthController@index');
            }
        }
        
        return view('Backend::auth.login', $result);
    }

    protected function doLogin($data) {
        $result = array('status' => false, 'data' => $data, 'messages' => array('success' => '', 'errors' => ''));
        
        $mainValidate = new MainValidate();
        $validator = $mainValidate->validatorLogin($data);
        if ($validator->errors()->count() > 0) {
            $result['messages']['errors'] = $validator->errors()->getMessages();
            return $result;
        }       

        $user = Users::whereUsername($data['username'])->where('role_id', '!=', 7)->where('role_id', '!=', 8)->first();
        if (count($user) === 0) {            
            $result['messages']['errors'] = array('username' => array('Tài khoản này không tồn tại trong hệ thống hoặc không có quyền truy cập trang quản trị'));
            return $result;
        }
        
        if (!Hash::check($data['password'], $user->password)) {           
            return array('status' => false, 'data' => $data, 'messages' => array('errors' => array('username' => array('Mật khẩu của bạn không đúng'))));
        }
        
        $findAdmin = Users::whereRoleId(1)->first();
        if(!($user->confirmed > 0)) {     
            if($findAdmin) {
                $result['messages']['errors'] = array('common' => 'Tài khoản của bạn chưa được xác thực. Vui lòng liên hệ số điện thoại '.$findAdmin->telephone.' hoặc qua email '. $findAdmin->email .' để xác thực tài khoản.');
                return $result;
            }
            
            $result['messages']['errors'] = array('common' => 'Tài khoản của bạn chưa được xác thực. Vui lòng liên hệ với quản trị website để xác thực tài khoản.');
            return $result;
        }   
        
        if(!($user->status > 0)) {            
            if($findAdmin) {
                $result['messages']['errors'] = array('common' => 'Tài khoản của bạn đang bị khoá. Vui lòng liên hệ số điện thoại '.$findAdmin->telephone.' hoặc qua email '. $findAdmin->email .' để mở khoá tài khoản.');
                return $result;
            }
            
            $result['messages']['errors'] = array('common' => 'Tài khoản của bạn đang bị khoá. Vui lòng liên hệ với quản trị website để mở khoá tài khoản.');
            return $result;
        }   
        
        isset($data['remember_token']) ? $remember = true : $remember = false;       
        unset($data['_token']);
        unset($data['remember_token']);
        if (Auth::attempt($data, $remember)) {            
            return array('status' => true, 'data' => Auth::user(), 'messages' => array('success' => 'Bạn đã đăng nhập thành công'));
        }
        
        $result['messages']['errors'] = array('common' => 'Có lỗi xảy ra trong quá trình xử lý dữ liệu');

        return $result;
    }

    public function register(Request $request) {
        $result = array('status' => false, 'data' => '', 'messages' => array('success' => '', 'errors' => ''));
        if ($request->isMethod('POST')) {
            $result = $this->doRegister(Input::all());
            if($result['status'] !== false) {
                return redirect()->action('\Backend\Controllers\AuthController@login');
            }            
        }

        return view('Backend::auth.register', $result);
    }

    protected function doRegister($data) {       
        $result = array('status' => false, 'data' => $data, 'messages' => array('success' => '', 'errors' => ''));
        
        $mainValidate = new MainValidate();
        $validator = $mainValidate->validatorRegister($data);            
        if ($validator->errors()->count() > 0) {
            $result['messages']['errors'] = $validator->errors()->getMessages();            
            return $result;
        }

        $services = new Commons();
        $data['role_id'] = 2;
        $data['confirmation_code'] = $services->randomString(6);
        $data['password'] = bcrypt($data['password']);
        
        $user = Users::create($data);
        
        if ($user->exists) {
            $findAdmin = Users::whereRoleId(1)->first();            
            if($user['email']) {
                $link = URL::action('\Backend\Controllers\AuthController@verify', ['id' => base64_encode(json_encode(array('id' => $user['id'], 'code' => $user['confirmation_code'])))]);
                $mailContent = array('subject' => 'Kích hoạt tài khoản', 'from' => $findAdmin['email'], 'to' => $user['email'], 'name' => $user['username'], 'link' => $link);                
                MainFacade::sendEmail('Backend::layouts.frontend.emailtemplates.verify', $mailContent);      
            }
                  
            return array('status' => true, 'data' => $user, 'messages' => array('success' => 'Bạn đã tạo thành công một tài khoản', 'errors' => ''));
        }

        $result['messages']['errors'] = array('common' => 'Có lỗi xảy ra trong quá trình xử lý dữ liệu');

        return $result;
    }   

    public function verify($id) {   
        $verify = $this->doVerify($id);
        if($verify['status'] !== false) {
            return redirect()->action('\Backend\Controllers\AuthController@login');
        }  
        
        return redirect()->action('\Backend\Controllers\AuthController@login');
    }
    
    public function doVerify($id) {        
        if(empty($id)) {
            return array('status' => false);
        }
        
        $data = json_decode(base64_decode($id));
        if(isset($data->id) && isset($data->code)) {
            $userCheck = Users::whereId($data->id)->whereConfirmationCode($data->code)->first();
            if($userCheck) {
                $userCheck->status = 1;
                $userCheck->confirmed = 1;
                $userCheck->save();
                
                return array('status' => true);
            }
        }
        
        return array('status' => false);
    }        

    public function logout() {
        Auth::logout();
        if (!Auth::check()) {
            return redirect()->action('\Backend\Controllers\AuthController@login');
        }
        
        return redirect()->action('\Backend\Controllers\AuthController@index');
    }    
    
    public function profile(Request $request) {        
        if (!Auth::check()) {
            return redirect()->action('\Backend\Controllers\AuthController@login');
        }
       
        $title = 'Cập nhật tài khoản';
        $actionForm = URL::action('\Backend\Controllers\AuthController@profile');
        $profile = Auth::user();        
        
        $result = array(
            'status' => false, 
            'data' => $profile, 
            'action' => 'edit', 
            'title' => $title, 
            'breadcrumbs' => 'account.edit', 
            'actionForm' => $actionForm, 
            'messages' => array('success' => '', 'errors' => '')
        );
        
        if($request->isMethod('POST')) {                        
            $data = $request->all();
            $result['data'] = $data;
            $data['id'] = $profile->id;
            
            if(empty($data['password'])) {
                unset($data['password']);
                unset($data['password_confirmation']);
            }
            
            $userValidate = new UsersValidate();
            $validator = $userValidate->validatorEdit($data);            
            if ($validator->errors()->count() > 0) {
                $result['messages']['errors'] = $validator->errors()->getMessages();            
                return view('Backend::auth.profile', $result);
            }

            $services = new Commons();
            $image = $services->upload('avatar', $this->dirAvatar);
            if($image) {
                $data['avatar'] = $this->dirAvatar . '/' . $image;
            }
            
            $data['password'] = bcrypt($data['password']);
            
            $profile->update($data);
            
            if ($profile->exists) {      
                $result['status'] = true;
                $result['data'] = $profile;
                $result['messages'] = array('success' => 'Bạn đã cập nhật thành công tài khoản', 'errors' => '');

                return view('Backend::auth.profile', $result);
            }

            $result['messages']['errors'] = array('common' => 'Có lỗi xảy ra trong quá trình xử lý dữ liệu');

        }
        
        return view('Backend::auth.profile', $result);
    }
}
