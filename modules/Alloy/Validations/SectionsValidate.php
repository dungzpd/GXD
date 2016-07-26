<?php

namespace Alloy\Validations;

use Validator;

class SectionsValidate {

    /**
     * validator
     * */
    public static function validator(array $data, $id) {
	return Validator::make($data, [
		    'sections.name' => empty($id) ? 'bail|required|min:6|max:255' : 'bail|required|min:6|max:255',
	]);
    }

}
