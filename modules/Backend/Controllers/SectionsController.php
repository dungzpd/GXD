<?php

/**
 * The controller of Sections
 *
 * @namespace Backend\Controllers
 * @class SectionsController
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
use Alloy\Models\Section;
use Alloy\Models\Courses;
use Alloy\Validations\SectionValidate;
use Alloy\Facades\Run;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Backend\Controllers\BaseController as BaseController;

class SectionsController extends BaseController
{

    protected $atributes;
    protected $imgPath;
    protected $perPage;

    public function __construct()
    {
        $this->perPage = 10;

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

        $sections = Section::getList(array('by' => $field, 'is' => $sort), array('fields' => ['name', 'description'], 'value' => $keyword))
            ->paginate($this->perPage)->appends(Input::only('field', 'keyword', 'sort'));

        return view('Backend::sections.index', compact('sections', 'keyword', 'field', 'sort'));
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
            $validator = SectionsValidate::validator($result['data'], null);
            $result['messages'] = $validator->errors();

            if (!$result['messages']->count()) {
                if ($this->onStore(new Section, $result['data']['sections'])) {

                    return redirect()->action('\Backend\Controllers\SectionsController@index');
                }
            }
        }

        $result['data']['courses'] = $this->allCourse();
        $result['url'] = \URL::action('\Backend\Controllers\SectionsController@create');
        return view('Backend::sections.create', $result);
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
        $result['data']['categories'] = $category = Section::find($id);
        $result['data']['coursesId'] = [];


        if (\Request::isMethod('post') && !empty(\Request::all())) {
            $result['data'] = \Request::all();

            $validator = SectionsValidate::validator($result['data'], $id);
            $result['messages'] = $validator->errors();
            if (!$result['messages']->count()) {

                $section = Section::find($id);

                if ($section) {
                    if ($this->onStore($section, $result['data']['sections'])) {

                        return redirect()->action('\Backend\Controllers\SectionsController@index');
                    }
                }
            }
        }
        $result['data']['courses'] = $this->allCourse();
        $result['url'] = \URL::action('\Backend\Controllers\CategoriesController@edit', $result['data']['categories']['id']);

        return view('Backend::categories.create', $result);
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
        $category = Section::find($id);

        if ($category && $category->forceDelete()) {
            return redirect()->action('\Backend\Controllers\SectionsController@index');
        }
    }

    /**
     * Public function onStore. save data to DB
     *
     * @param {Alloy\Models\Categories} $category, {Array} $params
     * @return boolean
     * */
    public function onStore($section, $params)
    {
        $section->course_id = isset($params['course_id']) ? $params['course_id'] : null;
        $section->name = isset($params['name']) ? $params['name'] : null;

        return $section->save();
    }

}
