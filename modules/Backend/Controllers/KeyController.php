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
use Alloy\Facades\Run;

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
        $category = Input::get('category');

//        $list = Courses::getList(array('by' => $field, 'is' => $sort), array('fields' => ['name', 'price'], 'value' => $keyword))->where('author_id', '=', $this->currentUser->id);
//        if (!empty($category)) {
//            $list = $list->whereHas('products', function ($query) use ($category) {
//                $query->where('category_id', $category);
//            });
//        }

        //$list = $list->paginate($this->perPage)->appends(Input::only('field', 'keyword', 'sort'));
        $products = Products::where('name', 'product_type', 'id')->orderBy('id', 'ASC')->get();
        
            die($products->count());
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

