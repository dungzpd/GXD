<?php

namespace Alloy\Models;
use DB;
use Alloy\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Base {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tblcustomers';
    
    //public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'id_user', 'name', 'phone',
        'email', 'address', 'price',  'service', 'note','created_at', 'updated_at', 'deleted_at'];

    

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
    
    public static function insert_customerid($customerId,$serviceId){
         DB::table('customers_service')->insert([
            'id_customer' => $customerId,
            'id_service' => $serviceId,
    ]);
    }

}
