<?php

namespace Backend\Controllers;

use Auth,
    Lang,
    Uuid,
    URL;
use Alloy\Facades\Run;
use Alloy\Models\Categories;
use Alloy\Models\Courses;
use Alloy\Models\Products;
use Alloy\Models\Section;
use Alloy\Models\Lessons;
use Alloy\Validations\ProductsValidate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Backend\Controllers\BaseController as BaseController;

class ProductController extends BaseController
{
    protected $atributes;
    protected $imgPath;
    protected $perPage;

    public function __construct()
    {
        $this->atributes = array(
            "name" => Lang::get('products.name'),
            "description" => Lang::get('products.description'),
        );
        $this->perPage = 10;
        $this->imgPath = 'images-products';

        if (!Auth::check()) {
            return redirect()->action('\Backend\Controllers\AuthController@login');
        }
        // $this->middleware('admin:admin/sale_lead/teacher_internal/teacher_external/staff');
    }

    /**
     * show list all of Course's products
     * @method GET
     * @return view
     */
    public function index()
    {
        $field = Input::get('field');
        $sort = Input::get('sort');
        $keyword = Input::get('keyword');

        $categories = Categories::getList(array('by' => $field, 'is' => $sort), array('fields' => ['name', 'description'], 'value' => $keyword))
            ->paginate($this->perPage)->appends(Input::only('field', 'keyword', 'sort'));

        return view('Backend::categories.index', compact('categories', 'keyword', 'field', 'sort'));
    }

    /**
     * Function create category
     *
     * @method POST
     * @param Request $request
     * return view
     */
    public function create(Request $request)
    {

        $result = array();
        $result['isEdit'] = false;

        if ($request->isMethod('post') && !empty($request->all())) {
            $result['data'] = $request->all();
            $validator = ProductsValidate::validator($result['data'], null);
            $result['messages'] = $validator->errors();
//die($validator->errors());
            if (!$result['messages']->count()) {

               // die("khong co loi");
                $image = $this->uploadFile('products.image', $this->imgPath, str_slug($result['data']['products']['name']), null);
                if (!$image) {
                    $result['data']['products']['image'] = null;
                } else {
                    $result['data']['products']['image'] = $image;
                }

                if ($this->onStore(new Products, $result['data']['products'])) {

                    if (isset($result['data']['saveAndCreate'])) {
                        return redirect()->action('\Backend\Controllers\ProductController@create');
                    }
                    return redirect()->action('\Backend\Controllers\ProductController@index');
                }
            }
            //die("co loi");
        }
 //die($image);
        //$result['data']['products'] = $this->allProduct();
        $result['url'] = \URL::action('\Backend\Controllers\ProductController@create');
        return view('Backend::products.create', $result);
    }

    /**
     * edit the Course's category
     * @method POST|PUT
     * @param Request $request
     * return view
     */
    public function edit($id)
    {
        $result = array();

        $result['isEdit'] = true;
        $result['data']['categories'] = $category = Categories::find($id);
        $result['data']['coursesId'] = [];
        // convert
        foreach ($category->courses as $course) {
            $result['data']['coursesId'][] = $course->pivot->course_id;
        }

        if (\Request::isMethod('post') && !empty(\Request::all())) {
            $result['data'] = \Request::all();

            $validator = CategoriesValidate::validator($result['data'], $id);
            $result['messages'] = $validator->errors();
            if (!$result['messages']->count()) {

                $category = Categories::find($id);

                if ($category) {
                    $params = $result['data']['categories'];

                    // check upload image
                    $image = $this->uploadFile('categories.image', $this->imgPath, str_slug($result['data']['categories']['name']), $category->image);
                    if (!$image) {
                        $result['data']['categories']['image'] = $params['tmpImage'];
                    } else {
                        $result['data']['categories']['image'] = $image;
                    }

                    if ($this->onStore($category, $result['data']['categories'])) {
                        
                        return redirect()->action('\Backend\Controllers\ProductController@index');
                    }
                }
            }
        }
        $result['data']['courses'] = $this->allCourse();
        $result['url'] = \URL::action('\Backend\Controllers\ProductController@edit', $result['data']['categories']['id']);

        return view('Backend::categories.create', $result);
    }

    /**
     * change status of the course
     *
     * @param {integer} $id
     *
     * @return redirect
     *
     */
    public function status($id) {
        $params = \Request::all();
        $currentPage = !empty($params['currentPage']) ? $params['currentPage'] : 1;
        if($id) {
            $node = Categories::find($id);
            if($node) {
                $node->status == 'active' ? $node->status = 'deactivate' : $node->status = 'active';
                $node->save();
            }
        }

        return redirect()->action('\Backend\Controllers\ProductController@index', ['page' => $currentPage]);
    }

    /**
     * Function delete category. It delete image of category, delete courses attach
     *
     * @method POST|DELETE
     * @param integer $id
     * return view
     */
    public function delete($id)
    {
        $params = \Request::all();
        $currentPage = !empty($params['currentPage']) ? $params['currentPage'] : '';
        $category = Categories::find($id);

        $this->deleteFile($this->imgPath, $category->image);
        $category->courses()->detach();

        if ($category && $category->forceDelete()) {
            return redirect()->action('\Backend\Controllers\ProductController@index', ['page' => $currentPage]);
        }
    }

    /**
     * delete multiple the Course's category
     * @method POST|DELETE
     * @param Request $request
     * return view
     */
    public function deleteMultiple(Request $request)
    {
        $params = \Request::all();
        if (Categories::destroy($params['arrId'])) {
            return redirect()->action('\Backend\Controllers\ProductController@index');
        }
    }

    /**
     * Get list all courses
     *
     * @return list courses
     * */
    protected function allCourse()
    {
        return Courses::select('id', 'name', 'status')
            ->where('status', 'active')
            ->get();
    }

    /**
     * Protected function onStore. save data to DB
     *
     * @param {Alloy\Models\Categories} $category, {Array} $params
     * @return boolean
     * */
    protected function onStore($product, $params)
    {

        $product->name = isset($params['name']) ? $params['name'] : '';
       
        $product->description = isset($params['description']) ? $params['description'] : '';
        //$product->icon = isset($params['image']) ? $params['image'] : null;
       
        $product->status = isset($params['status']) ? $params['status'] : 'inactive';

        if ($product->save()) {
            //$this->onStoreCourse($product, (isset($params['courses']) ? $params['courses'] : null));
            return true;
        }

        return false;
    }

    /**
     * Private function onStoreCourse. Attach courses to category
     *
     * @param {Alloy\Models\Categories} $category, {Array} $coursesId
     *
     **/
    private function onStoreCourse($product = null, $coursesId = array())
    {
        if (!empty($product)) {
            if (empty($coursesId)) {
                if ($product->courses() && count($category->courses) > 0) {
                    $product->courses()->detach();
                }
            }

            if (!empty($coursesId)) {
                $courses = Courses::whereIn('id', $coursesId)->get();

                $sync = [];
                foreach ($courses as $course) {
                    $sync[$course->id] = ['caption' => ''];
                }
                $product->courses() ? $category->courses()->sync($sync) : $category->courses()->attach($sync);
                return true;
            }
        }
        return false;
    }


}
