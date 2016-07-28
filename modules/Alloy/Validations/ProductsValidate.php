<?php

namespace Alloy\Validations;

use Validator;

class ProductsValidate {

    /**
     * validator
     * */
    public static function validator(array $data, $id) {
	return Validator::make($data, [
		    'products.name' => empty($id) ? 'bail|required|min:6|max:255|unique:products' : 'bail|required|min:6|max:255|unique:products,name,' . $id,
		    
		    
		    
	]);
    }

}
