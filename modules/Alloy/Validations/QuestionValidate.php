<?php

namespace Alloy\Validations;

use Validator;

class QuestionValidate {

    public function validatorCreate(array $data) {
        return Validator::make($data, [
                    'question' => 'bail|required|unique:questions',
                    'answes' => 'bail|required'
        ]);
    }
    
    public function validatorEdit(array $data) {
        return Validator::make($data, [
                    'question' => 'bail|required|unique:questions,question,'.$data['id'],
                    'answes' => 'bail|required'
        ]);
    }
    
}
