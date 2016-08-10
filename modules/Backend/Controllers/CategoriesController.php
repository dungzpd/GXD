<?php

/**
 * The controller of Categories
 *
 * @namespace Backend\Controllers
 * @class CategoriesController
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

use Auth;
use Lang;
use DB;
use Alloy\Models\Categories;
use Alloy\Models\Courses;
use Alloy\Validations\CategoriesValidate;
use Alloy\Facades\Run;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Backend\Controllers\BaseController as BaseController;

class CategoriesController extends BaseController
{

    protected $atributes;
    protected $imgPath;
    protected $perPage;

    public function __construct()
    {
        $this->atributes = array(
            "name" => Lang::get('categories.name'),
            "description" => Lang::get('categories.description'),
        );
        $this->perPage = 10;
        $this->imgPath = 'images-categories';

        if (!Auth::check()) {
            return redirect()->action('\Backend\Controllers\AuthController@login');
        }
        // $this->middleware('admin:admin/sale_lead/teacher_internal/teacher_external/staff');
    }

    /**
     * show list all of Course's categories
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
            $validator = CategoriesValidate::validator($result['data'], null);
            $result['messages'] = $validator->errors();

            if (!$result['messages']->count()) {
                $image = $this->uploadFile('categories.image', $this->imgPath, str_slug($result['data']['categories']['name']), null);
                if (!$image) {
                    $result['data']['categories']['image'] = null;
                } else {
                    $result['data']['categories']['image'] = $image;
                }

                if ($this->onStore(new Categories, $result['data']['categories'])) {
                    if (isset($result['data']['saveAndCreate'])) {
                        return redirect()->action('\Backend\Controllers\CategoriesController@create');
                    }
                    return redirect()->action('\Backend\Controllers\CategoriesController@index');
                }
            }
        }

        $result['data']['courses'] = $this->allCourse();
        $result['url'] = \URL::action('\Backend\Controllers\CategoriesController@create');
        return view('Backend::categories.create', $result);
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
                        
                        return redirect()->action('\Backend\Controllers\CategoriesController@index');
                    }
                }
            }
        }
        $result['data']['courses'] = $this->allCourse();
        $result['url'] = \URL::action('\Backend\Controllers\CategoriesController@edit', $result['data']['categories']['id']);

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

        return redirect()->action('\Backend\Controllers\CategoriesController@index', ['page' => $currentPage]);
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
            return redirect()->action('\Backend\Controllers\CategoriesController@index', ['page' => $currentPage]);
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
            return redirect()->action('\Backend\Controllers\CategoriesController@index');
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
    protected function onStore($category, $params)
    {

        $category->name = isset($params['name']) ? $params['name'] : '';
        $category->alias = isset($params['name']) ? str_slug($params['name']) : '';
        // $category->alias = isset($params['alias']) ? $params['alias'] : '';
        $category->description = isset($params['description']) ? $params['description'] : '';
        $category->image = isset($params['image']) ? $params['image'] : null;
        $category->order = isset($params['order']) ? $params['order'] : 0;
        $category->status = isset($params['status']) ? $params['status'] : 'inactive';
        if ($category->save()) {
            $this->onStoreCourse($category, (isset($params['courses']) ? $params['courses'] : null));
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
    private function onStoreCourse($category = null, $coursesId = array())
    {
        print_r($coursesId);
        die();
        if (!empty($category)) {
            if (empty($coursesId)) {
                if ($category->courses() && count($category->courses) > 0) {
                    $category->courses()->detach();
                }
            }

            if (!empty($coursesId)) {
                $courses = Courses::whereIn('id', $coursesId)->get();
                //print_r($courses);
                //die();
                $sync = [];
                foreach ($courses as $course) {
                    $sync[$course->id] = ['caption' => ''];
                }
                $category->courses() ? $category->courses()->sync($sync) : $category->courses()->attach($sync);
                return true;
            }
        }
        return false;
    }

}
