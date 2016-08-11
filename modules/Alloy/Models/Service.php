<?php

namespace Alloy\Models;
use DB;
use Alloy\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Base {

    //use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name','price','note', 'created_at', 'updated_at','deleted_at'];

    /**
     * Get course
     */
    public static function allService(){
    $service = Service::where(['status'=>'active'])->get();
    return $service;
    }
    
    public static function insert_services($id_order,$serviceId){
     DB::table('service_order')->insert([
        'id_order' => $id_order,
        'id_service' => $serviceId,
    ]);
    }
}
