<?php

namespace Frontend\Controllers;

use Auth;
use Alloy\Models\Users;
use Alloy\Validations\UsersValidate;
use Alloy\Services\Commons;
use Alloy\Facades\MainFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Backend\Controllers\BaseController;

class UserController extends BaseController {


    public function __construct() {

    }

    public function profile($id) {
        $users = Users::find($id);
        return view('Frontend::user.profile',[
            'users' => $users
        ]);
    }

    public function teacher() {
       $list_teacher = Users::where(['status'=>1, 'role_id'=>4])->get();
        return view('Frontend::user.teacher',compact('list_teacher'));
    }
    public function mycourses() {
        $list_teacher = Users::where(['status'=>1, 'role_id'=>4])->get();
        return view('Frontend::user.teacher',[
            'list_teacher' => $list_teacher
        ]);
    }


}
