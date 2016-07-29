<?php

namespace Alloy\Models;

use Alloy\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Base {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';
    //public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'price', 'icon',
        'description', 'id_email', 'status',  'product_type', 'created_at', 'updated_at', 'deleted_at'];

    

    /**
     * Get the teacher.
     * belong to
     */
    public function certificate() {
        return $this->belongsTo('Alloy\Models\Certificate', 'certificate_id');
    }

    public static function allProduct(){
        $products = Products::where(['status'=>'active'])->get();
        return $products;
    }

    

}
