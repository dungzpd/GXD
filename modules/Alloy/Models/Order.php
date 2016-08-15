<?php

namespace Alloy\Models;
use DB;
use Alloy\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Base {

    //use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'id_customer','note','id_user','created_at', 'updated_at','deleted_at'];

    /**
     * Get course
     */
   public $timestamps = true;
   
   public static function allOrder($id){
    $order = Order::where(['id_user'=>$id])->get();
    return $order;
    }
    public static function Customer_Info($id,$field,$sort,$perPage){
//    $Customer_Info = Order::where(['id_customer'=>$id])
//            ->join('tblcustomers', 'tblcustomers.id', '=', 'order.id_customer')
//            ->select('order.*', 'tblcustomers.*')
//            ->get();
    $Customer_Info = DB::table('order')
            ->where(['id_user'=>$id])
            ->join('tblcustomers', 'tblcustomers.id', '=', 'order.id_customer')
            ->select('order.note', 'tblcustomers.id', 'tblcustomers.name', 'tblcustomers.phone', 'tblcustomers.email', 'tblcustomers.address')
            ;
    if(empty($field) && empty($sort)) {
            $Customer_Info = $Customer_Info->orderBy('id', 'asc')->paginate($perPage);
        } else {
          ($field == 'role') ? $col = 'role_id' : $col = $field;
           $Customer_Info = $Customer_Info->orderBy($col, $sort)->paginate($perPage);
        }
    return $Customer_Info;
    }
}
