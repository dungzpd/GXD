<?php

namespace Frontend\Controllers;

use Alloy\Models\Certificates;
use Alloy\Models\Courses;
use Auth;
use Alloy\Models\Users;
use Alloy\Services\Commons;
use Alloy\Facades\MainFacade;
use Alloy\Validations\MainValidate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers;

    public function __construct() {

    }

    public function index() {
        $courses = Courses::where(['status'=>'active','feature'=>'active'])->take(8)->get();
        $courses_frees = Courses::where(['status'=>'active', 'price'=>0, 'sell_price'=>0])->take(4)->get();
        $list_teacher = Users::where('role_id', 4)->take(4)->get();
        $list_student = Users::where('role_id', 7)->take(4)->get();
        $certificates = Certificates::where('status', 'active')->take(4)->get();

        return view('Frontend::auth.index', [
            'courses' => $courses,
            'courses_frees' => $courses_frees,
            'list_teacher' => $list_teacher,
            'list_student' => $list_student,
            'certificates' => $certificates
        ]);
    }

    public function about() {
        return view('Frontend::auth.about', [
        ]);
    }

    public function contact() {
        return view('Frontend::auth.contact', [
        ]);
    }

    public function login(Request $request) {
        if ($request->ajax()) {
            $result = array('status' => false, 'data' => '', 'messages' => array('success' => '', 'errors' => ''));
            if ($request->isMethod('post')) {
                $result = $this->doLogin(Input::all());
            }

            return $result;
        }

       return redirect()->action('\Frontend\Controllers\AuthController@index');
    }

    protected function doLogin($data) {
        $result = array('status' => false, 'data' => $data, 'messages' => array('success' => '', 'errors' => ''));

        $mainValidate = new MainValidate();
        $validator = $mainValidate->validatorLogin($data);
        if ($validator->errors()->count() > 0) {
            $result['messages']['errors'] = $validator->errors()->getMessages();
            return $result;
        }

        $user = Users::whereUsername($data['username'])->first();
        if (count($user) === 0) {
            $result['messages']['errors'] = array('username' => array('Tài khoản này không tồn tại trong hệ thống'));
            return $result;
        }

        if (!Hash::check($data['password'], $user->password)) {
            return array('status' => false, 'data' => $data, 'messages' => array('errors' => array('password' => array('Mật khẩu của bạn không đúng'))));
        }

        if (!($user->confirmed > 0)) {
            $findAdmin = Users::whereRoleId(1)->first();
            if ($findAdmin) {
                $result['messages']['errors'] = array('common' => 'Tài khoản của bạn chưa được xác thực. Vui lòng liên hệ số điện thoại ' . $findAdmin->telephone . ' hoặc qua email ' . $findAdmin->email . ' để xác thực tài khoản.');
                return $result;
            }

            $result['messages']['errors'] = array('common' => 'Tài khoản của bạn chưa được xác thực. Vui lòng liên hệ với quản trị website để xác thực tài khoản.');
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
            if ($result['status'] !== false) {
                return redirect()->action('\Frontend\Controllers\AuthController@login');
            }
        }

        return view('Frontend::auth.register', $result);
    }

    protected function doRegister($data) {
        $result = array('status' => false, 'data' => $data, 'messages' => array('success' => '', 'errors' => ''));

        $mainValidate = new MainValidate();
        $validator = $mainValidate->validatorRegister($data);
        if ($validator->errors()->count() > 0) {
            $result['messages']['errors'] = $validator->errors()->getMessages();
            return $result;
        }

        $user = $this->create($data);
        if ($user->exists) {
            $findAdmin = Users::whereRoleId(1)->first();
            if ($user['email']) {
                $link = URL::action('\Frontend\Controllers\AuthController@verify', ['id' => base64_encode(json_encode(array('id' => $user['id'], 'code' => $user['confirmation_code'])))]);
                $mailContent = array('subject' => 'Kích hoạt tài khoản', 'from' => $findAdmin['email'], 'to' => $user['email'], 'name' => $user['username'], 'link' => $link);
                MainFacade::sendEmail('Frontend::layouts.emailtemplates.verify', $mailContent);
            }

            return array('status' => true, 'data' => $user, 'messages' => array('success' => 'Bạn đã tạo thành công một tài khoản', 'errors' => ''));
        }

        $result['messages']['errors'] = array('common' => 'Có lỗi xảy ra trong quá trình xử lý dữ liệu');

        return $result;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        $services = new Commons();
        $data['role_id'] = 2;
        $data['confirmation_code'] = $services->randomString(6);
        $data['password'] = bcrypt($data['password']);

        return Users::create($data);
    }

    public function verify($id) {
        $verify = $this->doVerify($id);
        if ($verify['status'] !== false) {
            return redirect()->action('\Frontend\Controllers\AuthController@login');
        }

        return redirect()->action('\Frontend\Controllers\AuthController@login');
    }

    public function doVerify($id) {
        if (empty($id)) {
            return array('status' => false);
        }

        $data = json_decode(base64_decode($id));
        if (isset($data->id) && isset($data->code)) {
            $userCheck = Users::whereId($data->id)->whereConfirmationCode($data->code)->first();
            if ($userCheck) {
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

        return redirect()->action('\Frontend\Controllers\AuthController@login');
    }

}
