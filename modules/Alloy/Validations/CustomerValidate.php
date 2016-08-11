<?php

namespace Alloy\Validations;

use Validator;

class CustomerValidate {
    public function validatorCreate(array $data) {
        return Validator::make($data, [
                    'email' => 'required|email|unique:tblcustomers,email',
                    'username' => 'required',
                    'telephone' => 'bail|min:9|max:15|regex:/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/',
        ]);
    }

}
