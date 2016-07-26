<?php

namespace Alloy\Validations;

use Validator;

class LessonsValidate {

    /**
     * Validate data get from Request
     *
     * @param {boolean} $isEdit, {array} $data.
     * $isEdit is true => Edit form else Create form
     * @return Validator
     **/
    public static function validator(array $data, $isEdit,  $id)
    {
        $rule = [
            'lessons.name' => 'bail|required|min:6|max:255|unique:lessons',
            'lessons.video' => 'mimes:mp4,mpg4,mp4v,mpeg,avi,flv,quicktime,mov,MOV','ogg',
            'lessons.status' => 'required'
        ];

        if(!empty($id) && !empty($isEdit) && $isEdit === true) {
             $rule['lessons.name'] = 'bail|required|min:6|max:255|unique:lessons,name,' . $id;
        }

        return Validator::make($data, $rule);
    }

}
