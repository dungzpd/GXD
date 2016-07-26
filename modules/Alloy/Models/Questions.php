<?php

namespace Alloy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'question', 'question_image', 'answes', 'type', 'type_lession', 'type_course', 'status', 'author_id', 'created_at', 'updated_at', 'deleted_at'];

    public function author()
    {
        return $this->belongsTo('Alloy\Models\Users', 'author_id', 'id');
    }
}
