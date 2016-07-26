<?php

/**
 * The controller of Categories
 *
 * @namespace Frontend\Controllers
 * @class CategoriesController
 * @extends BaseController
 *
 * @method
 */
namespace Frontend\Controllers;
use Auth;
use Lang;
use DB;
use Alloy\Models\Categories;
use Alloy\Models\Courses;
use Alloy\Validations\CategoriesValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Frontend\Controllers\BaseController as BaseController;

class CategoriesController extends BaseController {

    /**
     * show list all of Course's categories
     * @method GET
     * @return view
     */
    public function index() {
		return view('Frontend::categories.index');
    }


}
