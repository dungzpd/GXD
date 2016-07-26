<?php

namespace Backend\Controllers;

use Auth,
    Lang,
    Uuid,
    URL;
use Alloy\Facades\Run;
use Alloy\Models\Categories;
use Alloy\Models\Courses;
use Alloy\Models\Section;
use Alloy\Models\Lessons;
use Alloy\Validations\CourseValidate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Backend\Controllers\BaseController as BaseController;

class CourseController extends BaseController
{
    protected $imgPath;

    public function __construct()
    {
        $this->imgPath = 'images-courses';

        if (!Auth::check()) {
            return redirect()->action('\Backend\Controllers\AuthController@login');
        }

        $this->currentUser = Auth::user();
    }

    public function index()
    {
        $field = Input::get('field');
        $sort = Input::get('sort');
        $keyword = Input::get('keyword');
        $category = Input::get('category');

        $list = Courses::getList(array('by' => $field, 'is' => $sort), array('fields' => ['name', 'price'], 'value' => $keyword))->where('author_id', '=', $this->currentUser->id);
        if (!empty($category)) {
            $list = $list->whereHas('categories', function ($query) use ($category) {
                $query->where('category_id', $category);
            });
        }

        $list = $list->paginate($this->perPage)->appends(Input::only('field', 'keyword', 'sort'));
        $categories = Categories::where('status', 'active')->orderBy('order', 'ASC')->get();
        return view('Backend::courses.index', compact('list', 'sort', 'keyword', 'field', 'category', 'categories'));
    }

    public function create(Request $request)
    {
        $courses = array();
        $categories = $this->allCategories();
        $sections = [
            'maxId' => null,
            'data' => [],
        ];

        $form = array(
            'isEdit' => false,
            'title' => Lang::get('courses.add'),
            'action' => URL::action('\Backend\Controllers\CourseController@create'),
            'videoPath' => null
        );

        $banks = Lessons::byUser($this->currentUser->id)->get();
        $shared = Lessons::beShared($this->currentUser->id)->get();

        if ($request->isMethod('post') && !empty($request->all())) {
            $params = $request->all();

            if (!empty($params['courses'])) {

                $result = $this->onStoreCourse($params);

                if (!empty($result['check'])) {

                    if (isset($params['saveAndCreate'])) {
                        return redirect()->action('\Backend\Controllers\CourseController@create');
                    }
                    return redirect()->action('\Backend\Controllers\CourseController@index');
                }

                if (!empty($result['data']) && !empty($result['messages'])) {
                    $courses = $result['data'];
                    $messages = $result['messages'];
                }
            }
        }

        $sections['maxId'] = Section::max('id');
        $sections['maxId'] = !empty($sections['maxId']) ? $sections['maxId'] + 1 : 1;

        return view('Backend::courses.form', compact('form', 'courses', 'categories', 'sections', 'banks', 'shared', 'messages'));
    }

    public function edit($id, Request $request)
    {
        if (!$id) {
            return redirect()->action('\Backend\Controllers\CourseController@index');
        }

        $identify = Courses::find($id);
        if (!$identify) {
            return redirect()->action('\Backend\Controllers\CourseController@index');
        }

        $form = array(
            'isEdit' => true,
            'title' => Lang::get('courses.update'),
            'action' => URL::action('\Backend\Controllers\CourseController@edit', array('id' => $identify->id))
        );

        $courses = array('courses' => $identify->toArray());
        $sections = array('maxId' => null);
        
        if ($request->isMethod('POST') && !empty($request->all())) {
            
            $paramsRe = $request->all();
            if (empty($paramsRe['courses']['video_type']) || (!empty($paramsRe['courses']['video_type']) && $paramsRe['courses']['video_type'] != 'link')) {
                $courses['courses']['video_type'] = 'upload';
            }

            $courses = array_replace_recursive($courses, $request->all());
            if (!empty($courses['courses'])) {
                $result = $this->onStoreCourse($courses, $identify, $id);
                $messages = $result['messages'];
                $success = !$result['messages']->count();
                
                if(!empty($result['data'])){
                    $courses = $result['data'];
                }
            }
        }

        $categoriesId = [];
        // convert
        foreach ($identify->categories as $category) {
            $categoriesId[] = $category->pivot->category_id;
        }
        
        $categories = $this->allCategories();
        $sections['maxId'] = Section::max('id') ?: 1;
        $sections['data'] = $identify->sections()->get();
        $lessons = $identify->lessons()->orderBy('courses_lessons.order')->get();
        $banks = Lessons::byUser($this->currentUser->id, $identify->id)->get();
        $shared = Lessons::beShared($this->currentUser->id, $identify->id)->get();

        $form['videoPath'] = empty($identify->video) ? null : URL::action('\Backend\Controllers\BaseController@streamFile', array('disk' => 'videos-courses', 'fileName' => $identify->video));
        $form['imagePath'] = empty($identify->image) ? null : URL::action('\Frontend\Controllers\BaseController@downloadFile', array('disk' => 'images-courses', 'fileName' => $identify->image));
        $form['tmpImage'] = empty($identify->image) ? null : $identify->image;

        return view('Backend::courses.form', compact('form', 'courses', 'categories', 'categoriesId', 'sections', 'banks', 'shared', 'lessons', 'messages', 'success'));
    }

    public function delete($id)
    {
        $params = \Request::all();
        $currentPage = !empty($params['currentPage']) ? $params['currentPage'] : '';
        if ($id) {
            $identity = Courses::find($id);
            if ($identity) {
                if (Storage::disk(Run::disk('videos-courses'))->has($identity->video)) {
                    Storage::disk(Run::disk('videos-courses'))->delete($identity->video);
                }
                $this->deleteFile($this->imgPath, $identity->image);

                $identity->categories()->detach();
                $identity->lessons()->detach();
                $identity->delete();
            }
        }

        return redirect()->action('\Backend\Controllers\CourseController@index', ['page' => $currentPage]);
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
            $course = Courses::find($id);
            if($course) {
                $course->status == 'active' ? $course->status = 'deactivate' : $course->status = 'active';
                $course->save();
            }
        }

        return redirect()->action('\Backend\Controllers\CourseController@index', ['page' => $currentPage]);
    }

    private function update($data = array(), $identify = null, $id = null)
    {
        if (!empty($data['courses']['name'])) {
            $data['courses']['alias'] = str_slug($data['courses']['name'], '-');
        }
        // Test jenkins
        $validate = new CourseValidate();
        $validator = $validate->validator($data, $id);
        $messages = $validator->errors();
        if (!$messages->count()) {
            $data['courses']['author_id'] = $this->currentUser->id;
            $file = $data['courses']['video'];

            if (!empty($file)) {
                $data['courses']['video'] = $fileName = implode('.', array(run::makeName($data['courses']['alias']), $file->getClientOriginalExtension()));
            }

            if (empty($file) && !empty($identify)) {
                if (Storage::disk('videoCourses')->has($identify->video)) {
                    Storage::disk('videoCourses')->delete($identify->video);
                }

                $data['courses']['video'] = null;
            }

            if (!empty($file) && !$this->upload($file, $fileName)) {
                return compact('data', 'messages', 'check');
            }

            if (!empty($identify) && !empty($id)) {
                $check = $identify->update($data['courses']);
            }

            if (empty($identify) || empty($id)) {
                $check = $identify = Courses::create($data['courses']);
            }

            if ($check && !empty($identify)) {
                $this->storeLessons($identify, $data);
            }
        }

        return compact('data', 'messages', 'check');
    }

    private function upload($file = null, $name)
    {
        if (empty($file) && empty($name)) {
            return false;
        }

        try {
            ini_set('memory_limit', '-1');
            Storage::disk('videoCourses')->put($name, file_get_contents($file->getRealPath()));
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * onStoreCourse
     * @param {Array} $data, {Alloy\Models\Courses} $identify, {integer} $id
     * @return array
     **/
    private function onStoreCourse($data = array(), $identify = null, $id = null)
    {
        if (!empty($data['courses']['name'])) {
            $data['courses']['alias'] = str_slug($data['courses']['name'], '-');
        }

        $validate = new CourseValidate();
        $validator = $validate->validator($data, $id);
        $messages = $validator->errors();
        if (!$messages->count()) {
            $data['courses']['author_id'] = $this->currentUser->id;
            $file = $data['courses']['video'];

            if (!empty($file)) {
                $data['courses']['video'] = $fileName = implode('.', array(run::makeName($data['courses']['alias']), $file->getClientOriginalExtension()));
            }

            $video = $this->uploadFile('courses.video', 'videos-courses', str_slug($data['courses']['name']), (empty($identify->video) ? null : $identify->video));
            if (false != $video) {
                $data['courses']['video'] = $video;
            } else {
                $data['courses']['video'] = $data['courses']['tmpVideo'];
            }

            $image = $this->uploadFile('courses.image', $this->imgPath, str_slug($data['courses']['name']), (empty($identify->image) ? null : $identify->image));
            if (!$image) {
                $data['courses']['image'] = empty($data['courses']['tmpImage']) ? null : $data['courses']['tmpImage'];
            } else {
                $data['courses']['image'] = $image;
            }

            if (!empty($identify) && !empty($id)) {
                $check = $identify->update($data['courses']);
            }

            if (empty($identify) || empty($id)) {
                $check = $identify = Courses::create($data['courses']);
            }

            if ($check && !empty($identify)) {
                $this->onStoreCategories($identify, (isset($data['courses']['categories']) ? $data['courses']['categories'] : null));
                $this->onStoreSection($identify, $data);
            }
        }

        return compact('data', 'messages', 'check');
    }

    /**
     * onStoreSection
     * @param {Alloy\Models\Section} $section, {Array} $params
     *
     * $return $section|null
     **/
    private function onStoreSection($course, $data)
    {
        $course->lessons()->detach();
        $course->sections()->delete();
        $params = !empty($data['sections']) ? $data['sections'] : array();
        
        if (!empty($params)) {
            foreach ($params as $id => $param) {
                $section = new Section();
                $section->course_id = $course->id;
                $section->name = $param['name'];

                if ($section->save()) {
                    $this->storeLessons($section, $param);
                }
            }
        }
    }

    /**
     * Update Lesson
     * Save attach to pivot table courses_lessons
     * @param {Alloy\Models\Courses} $courses, {array} $lessonId
     *
     * */
    private function storeLessons($section, $data = array())
    {
        $lessons = !empty($data['lessons']) ? $data['lessons'] : array();
        if (!empty($lessons) && !empty($section)) {
            $order = 1;
            $sync = array();
            foreach ($lessons as $lessonId => $lesson) {
                $sync[$lessonId] = [
                    'course_id' => $section->course->id,
                    'lesson_id' => $lesson['lesson_id'],
                    'be_shared' => $lesson['be_shared'],
                    'order' => $order
                ];

                $order++;
            }

            $section->lessons() ? $section->lessons()->sync($sync) : $section->lessons()->attach($sync);
 
            return true;
        }

        if (empty($lessons) && !empty($section->lessons)) {
            $section->lessons()->detach();
        }
        if (empty($section) && !empty($section->lessons)) {
            $section->lessons()->detach();
        }
        return false;
    }

    /**
     * Private function onStoreCategories. Attach categories to course
     *
     * @param {Alloy\Models\Courses} $course, {Array} $categoriesId
     *
     **/
    private function onStoreCategories($course = null, $categoriesId = array())
    {
        if (!empty($course)) {
            if (empty($categoriesId)) {
                if ($course->categories() && count($course->categories) > 0) {
                    $course->categories()->detach();
                }
            }

            if (!empty($categoriesId)) {
                $categories = Categories::whereIn('id', $categoriesId)->get();

                $sync = [];
                foreach ($categories as $category) {
                    $sync[$category->id] = ['caption' => ''];
                }
                $course->categories() ? $course->categories()->sync($sync) : $course->categories()->attach($sync);
                return true;
            }
        }
        return false;
    }

    /**
     * Get list all categories
     *
     * @return list categories
     * */
    protected function allCategories()
    {
        return categories::select('id', 'name', 'status')
            ->where('status', 'active')
            ->get();
    }

}
