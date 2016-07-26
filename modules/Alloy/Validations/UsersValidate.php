<?php

namespace Alloy\Validations;

use Validator;

class UsersValidate {

    public function validatorCreate(array $data) {
        return Validator::make($data, [
                    'email' => 'bail|required|email|max:255|unique:users',
                    'username' => 'bail|required|min:4|max:255|unique:users',
                    'password' => 'bail|required|min:6|max:255',
                    'password_confirmation' => 'bail|required|same:password',
                    'card' => 'bail|required|min:6|max:25',
                    'telephone' => 'bail|min:10|max:15|regex:/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/',
        ]);
    }

    public function validatorEdit(array $data) {
        return Validator::make($data, [
                    'email' => 'bail|required|email|max:255|unique:users,email,'.$data['id'],
                    'card' => 'bail|required|min:6|max:25',
                    'telephone' => 'bail|min:10|max:15|regex:/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/',
                    'password' => 'bail|min:6|max:255',
                    'password_confirmation' => 'bail|same:password',
        ]);
    }

}
