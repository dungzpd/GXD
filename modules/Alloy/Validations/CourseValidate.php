<?php

namespace Alloy\Validations;

use Validator;

class CourseValidate {

    public function validator(array $data, $id = null) {

        return Validator::make($data, [
                    'courses.name' => empty($id) ? 'bail|required|min:6|max:255|unique:courses' : 'bail|required|min:6|max:255|unique:courses,name,' . $id,
                    'courses.alias' => empty($id) ? 'bail|required|unique:courses' : 'bail|required|unique:courses,alias,' . $id,
                    'courses.price' => 'integer|min:0',
                    'courses.sell_price' => 'integer|min:0',
                    'courses.image' => 'mimes:jpg,png,gif,jpeg',
                    'courses.video' => 'mimes:mp4,mpg4,mp4v,mpeg',
                    'courses.duration' => 'bail|integer|min:0'
        ]);
    }

}
