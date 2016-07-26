<?php

namespace Alloy\Models;

use Alloy\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Base {

    //use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];

    /**
     * Get course
     */
    public function course()
    {
        return $this->belongsTo('Alloy\Models\Courses', 'course_id', 'id');
    }

    /**
     * Get lessons
     *
     **/
    public function lessons()
    {
        return $this->belongsToMany('Alloy\Models\Lessons', 'courses_lessons', 'section_id', 'lesson_id')->withPivot('course_id', 'be_shared', 'order');
    }



}
