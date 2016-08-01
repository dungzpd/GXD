<?php

namespace Alloy\Models;
use DB;
use Alloy\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keys extends Base {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tblkeys';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'license_serial', 'license_key', 'license_is_registered',
        'license_created_date', 'hardware_id', 'license_no_instance', 'license_no_computers', '	product_type', 'email_cus', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the teacher.
     * belong to
     */
    public static function listkey()
    {
        //$key = DB::table('tblkeys')->get();
        $key = Keys::select()->get();
        return $key;
    }

}
