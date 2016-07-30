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
        $field = Input::get('field');
        $sort = Input::get('sort');
        $keyword = Input::get('keyword');
        
      
         //$products = Products::select('name','id')->get()->toArray();
         $products = DB::table('products')->select('id','name')->get();
//         foreach ($products as $x) {
//                    echo $x->name.'</br>';
//                }
                //echo $products->count();
          //  die();
        return view('Backend::keys.index', compact('list', 'sort', 'keyword', 'field', 'category', 'products'));
    }

    /**
     * Save score when the user complete the exams.
     *
     * @method POST
     * @param Request $request
     * return view
     */
    
}

