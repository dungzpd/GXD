<?php

/**
 * The controller of Exams
 *
 * @namespace Backend\Controllers
 * @class ExamsController
 * @extends BaseController
 *
 * @method
 * {GET} index show all list of Course's categories.
 * {POST} create store the Course's category
 * {POST|PUT} edit update the Course's category
 * {POST|DELETE} delete delete the Course's category
 * {POST|DELETE} deleteMultiple destroy multiple Course's categories
 */

namespace Backend\Controllers;

use Alloy\Models\Users;
use Auth;
use Lang;
use DB;
use Alloy\Models\Products;
//use Alloy\Models\Courses;
use Alloy\Models\Keys;
use Alloy\Facades\Run;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Backend\Controllers\BaseController as BaseController;

class KeyController extends BaseController
{

    protected $currentUser;

    public function __construct()
    {
        if (!Auth::check()) {
            return redirect()->action('\Backend\Controllers\AuthController@login');
        }
        $this->currentUser = Auth::user();
        // $this->middleware('admin:admin/sale_lead/teacher_internal/teacher_external/staff');
    }

    /**
     * show all exams
     * @method GET
     * @return view
     */
    public function index()
    {
        $status = Input::get('status');
        $product_id = Input::get('product');
        $product = Products::select('product_type')->where(['id'=>$product_id])->get();
        if((!empty($status) || $status == '0') && !empty($product) ){
            $keys = Keys::listkey($status,$product);
        }else $keys = Keys::select()->get();
        $products = Products::select('id','name')->get();
        return view('Backend::keys.index', compact('list', 'keys', 'keyword', 'field', 'category', 'products'));
    }
    public function edit(){
        return 'Đây là trang edit';
    }

}

