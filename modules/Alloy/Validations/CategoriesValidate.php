<?php

namespace Alloy\Validations;

use Validator;

class CategoriesValidate {

    /**
     * validator
     * */
    public static function validator(array $data, $id) {
	return Validator::make($data, [
		    'categories.name' => empty($id) ? 'bail|required|min:6|max:255|unique:categories' : 'bail|required|min:6|max:255|unique:categories,name,' . $id,
		    'categories.description' => 'required|min:6',
		    'categories.image' => 'mimes:jpg,png,gif,svg,jpeg',
		    'categories.status' => 'required'
	]);
    }

}
