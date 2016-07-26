<?php

namespace Alloy\Models;

use Alloy\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Base {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'author_id', 'certificate_id', 'name',
        'alias', 'price', 'sell_price', 'feature', 'image', 'video', 'video_link', 'video_type', 'duration', 'detail', 'description', 'version', 'rate', 'learned',
        'order', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the teacher.
     * belong to
     */
    public function teacher() {
        return $this->belongsTo('Alloy\Models\Users', 'author_id');
    }

    /**
     * Get the teacher.
     * belong to
     */
    public function certificate() {
        return $this->belongsTo('Alloy\Models\Certificate', 'certificate_id');
    }

    /**
     * Get the categories.
     * many to many
     */
    public function categories() {
        return $this->belongsToMany('Alloy\Models\Categories', 'categories_coures', 'course_id', 'category_id');
    }

    /**
     * Get the sections
     * one to many
     **/
    public function sections()
    {
        return $this->hasMany('Alloy\Models\Section', 'course_id', 'id');
    }

    /**
     * Get the lessions.
     * many to many
     */
    public function lessons() {
        return $this->belongsToMany('Alloy\Models\Lessons', 'courses_lessons', 'course_id', 'lesson_id')->withPivot('course_id', 'lesson_id', 'order', 'be_shared');
    }

}
