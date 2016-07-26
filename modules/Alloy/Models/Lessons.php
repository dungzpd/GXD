<?php

namespace Alloy\Models;

use Alloy\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lessons extends Base {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'alias', 'video', 'video_link', 'video_type', 'posts', 'attach', 'exams', 'question_limit', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the lessons.
     * many to many
     */
    public function courses() {
        return $this->belongsToMany('Alloy\Models\Courses', 'courses_lessons', 'lesson_id', 'course_id')->withPivot('course_id', 'caption', 'status');
    }
    
    /**
     * Get sections
     * 
     **/
    public function sections()
    {
        return $this->belongsToMany('Alloy\Models\Section', 'courses_lessons', 'lesson_id', 'section_id')->withPivot('section_id', 'name');
    }

    /**
     * Get the lessons.
     * many to many
     */
    public function users() {
        return $this->belongsToMany('Alloy\Models\Users', 'users_lessons', 'lesson_id', 'child_id')->withPivot('user_id', 'child_id', 'allow_share', 'note', 'status');
    }

    /**
     * Get the lessons.
     * many to many
     */
    public function author() {
        return $this->belongsTo('Alloy\Models\Users', 'author_id', 'id');
    }

    /**
     * TienLM
     * Get the lessons be shared for users and not in courses
     * many to many
     */
    public function scopeBeShared($query, $userId = null, $ignoreCourseId = null) {
        $query->select('lessons.id as id', 'users_lessons.user_id as user_id', 'users_lessons.child_id as child_id', 'lessons.name as name');

        $query->join('users_lessons', function($join) {
            $join->on('users_lessons.lesson_id', '=', 'lessons.id');
        });

        $query->join('users', function($join) {
            $join->on('users_lessons.child_id', '=', 'users.id');
        });

        if (!empty($userId)) {
            $query->where('users.id', '=', $userId);
        }

        if (!empty($ignoreCourseId)) {
            $query->whereNotIn('lessons.id', function($query) use($ignoreCourseId) {
                $query->select('courses_lessons.lesson_id as id');
                $query->from('lessons');
                $query->join('courses_lessons', function($join) {
                    $join->on('courses_lessons.lesson_id', '=', 'lessons.id');
                });

                $query->join('courses', function($join) {
                    $join->on('courses_lessons.course_id', '=', 'courses.id');
                });

                $query->where('courses.id', '=', $ignoreCourseId);
            });
        }


        return $query;
    }

    /**
     * TienLM
     * Get the lessons created by users and not in courses
     * many to many
     */
    public function scopeByUser($query, $userId = null, $ignoreCourseId = null) {

        if (!empty($userId)) {
            $query->where('author_id', '=', $userId);
        }

        if (!empty($ignoreCourseId)) {
            $query->whereNotIn('lessons.id', function($query) use($ignoreCourseId) {
                $query->select('courses_lessons.lesson_id as id');

                $query->from('lessons');

                $query->join('courses_lessons', function($join) {
                    $join->on('courses_lessons.lesson_id', '=', 'lessons.id');
                });

                $query->join('courses', function($join) {
                    $join->on('courses_lessons.course_id', '=', 'courses.id');
                });

                $query->where('courses.id', '=', $ignoreCourseId);
            });
        }

        return $query;
    }

}
