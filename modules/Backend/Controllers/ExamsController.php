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
use Alloy\Models\Exams;
use Alloy\Models\Lessons;
use Alloy\Validations\CategoriesValidate;
use Alloy\Facades\Run;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Backend\Controllers\BaseController as BaseController;

class ExamsController extends BaseController
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
    }

    /**
     * Save score when the user complete the exams.
     *
     * @method POST
     * @param Request $request
     * return view
     */
    public function complete(Request $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->all();
            $errors = [];
            $user = !empty($this->currentUser) ? $this->currentUser : Users::first();
            if (!isset($user) || empty($user)) {
                $errors['user'] = 'The user not exist.';
            }

            if (!isset($params['teacher_id']) || empty($params['teacher_id'])) {
                $errors['teacher'] = 'The teacher not exist.';
            }

            if (!isset($params['course_id']) || empty($params['course_id'])) {
                $errors['course'] = 'The course not exist.';
            }

            if (!isset($params['lesson_id']) || empty($params['lesson_id'])) {
                $errors['lesson'] = 'The lesson not exist.';
            }

            if (!isset($params['question']) || empty($params['question'])) {
                $errors['question'] = 'Questions not exist.';
            }

            if (!empty($params['question'])) {
                $lesson = Lessons::find($params['lesson_id']);
                if (empty($lesson)) {
                    $errors['lesson'] = 'The lesson not exist.';
                }
            }

            if (count($errors) > 0) {
                if ($request->ajax()) {
                    return response()->json(['messages' => $errors, 'success' => false], 200);
                }
                return compact('errors');
            }

            $exams = new Exams();
            $exams->code = Run::makeName();
            $exams->user_id = isset($user->id) ? $user->id : null;
            $exams->teacher_id = $params['teacher_id'];
            $exams->course_id = $params['course_id'];
            $exams->lession_id = $params['lesson_id'];
            $exams->status = 'active';
            $exams->score = $this->calculateScore($params['question'], $lesson->question_limit);
            if ($exams->save()) {
                if ($request->ajax()) {
                    return response()->json(['messages' => 'Save score success.', 'success' => true],200);
                }
            }

            if ($request->ajax()) {
                return response()->json(['messages' => 'Save score failure.', 'success' => true],200);
            }
        }
    }

    private function calculateScore($questions = array(), $countQuestion = 0)
    {
        $correctQuestion = [];
        foreach ($questions as $question) {
            if ('array' == gettype($question)) {
                if (collect($question)->sum() == 100) {
                    $correctQuestion[] = 1;
                }
            } else if ($question == 100) {
                $correctQuestion[] = 1;
            }
        }
        $sumCorrect = collect($correctQuestion)->sum();
        return ($sumCorrect/$countQuestion)*100;
    }


    /**
     * Delete the exams
     *
     * @method POST|DELETE
     * @param integer $id
     * return view
     */
    public function delete($id)
    {
    }

}
