<?php

namespace Alloy\Models;

use Alloy\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Base {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'description', 'image', 'alias', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get all of the course for the category.
     * many to many
     **/
    public function courses()
    {
         return $this->belongsToMany(
            'Alloy\Models\Courses', 'categories_coures',
            'category_id', 'course_id'
            )->withPivot('course_id', 'caption', 'status');
    }

    public static function allCategory(){
        $categories = Categories::where(['status'=>'active'])->get();
        return $categories;
    }

}
