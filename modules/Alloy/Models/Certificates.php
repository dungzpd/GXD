<?php

namespace Alloy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificates extends Model {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'certificates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the Courses.
     * has many
     */
    public function courses() {
        return $this->hasMany('App\Courses', 'certificate_id');
    }

}
