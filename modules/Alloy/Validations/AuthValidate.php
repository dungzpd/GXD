<?php

namespace Alloy\Validations;

use Validator;

class AuthValidate {

    public function validatorLogin(array $data) {
        return Validator::make($data, [
                    'username' => 'required|min:6|max:255',
                    'password' => 'required|min:6|max:255'
        ]);
    }

    public function validatorRegister(array $data) {
        return Validator::make($data, [
                    'email' => 'required|email|max:255|unique:users',
                    'username' => 'required|min:6|max:255|unique:users',
                    'password' => 'required|min:6|max:255',
                    'password_confirmation' => 'required|same:password',
                    'telephone' => 'required|min:10|max:15|regex:/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/',
        ]);
    }

    public function validatorVerify(array $data) {
        return Validator::make($data, [
                    'email' => 'required|email|max:255|unique:users',
                    'username' => 'required|min:6|max:255|unique:users',
                    'password' => 'required|min:6|max:255',
                    'password_confirmation' => 'required|same:password',
                    'telephone' => 'required|min:10|max:15|regex:/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/',
        ]);
    }
    
}
