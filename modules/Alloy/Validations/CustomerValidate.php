<?php

namespace Alloy\Validations;

use Validator;

class CustomerValidate {
    public function validatorCreate(array $data) {
        return Validator::make($data, [
                    'email' => 'required|email',
                    'username' => 'required',
                    
        ]);
    }

}
