<?php

namespace Alloy\Models;

use Alloy\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exams extends Base {

   // use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'code', 'user_id', 'teacher_id', 'course_id', 'lession_id', 'factor', 'score', 'status', 'updated_at', 'deleted_at'];

    /**
     * Get the user for the exams.
     * one to one
     **/
    public function user()
    {
        return $this->belongsTo('Alloy\Models\Users', 'user_id');
    }

    /**
     * Get the teacher for the exams.
     * one to one
     **/
    public function teacher()
    {
        return $this->belongsTo('Alloy\Models\Teachers', 'user_id');
    }

    /**
     * Get the course for the exams.
     * one to one
     **/
    public function course()
    {
         return $this->belongsTo('Alloy\Models\Courses', 'course_id');
    }

    /**
     * Get the lesson for the exams.
     * one to one
     **/
    public function lesson()
    {
        return $this->belongsTo('Alloy\Models\Lessons', 'lession_id');
    }

}
