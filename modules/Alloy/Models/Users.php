<?php

namespace Alloy\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Users extends Model implements AuthenticatableContract, CanResetPasswordContract, AuthorizableContract {

    use Authenticatable,
        CanResetPassword,
        Authorizable,
        SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id', 'username', 'password', 'email', 'card', 'telephone', 'name', 'address',
        'gender', 'status', 'lat_long', 'remember_token', 'provider', 'confirmed', 'confirmation_code', 'avatar', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the role record associated with the user.
     */
    public function role() {
        return $this->hasOne('Alloy\Models\Roles', 'id', 'role_id');
    }

    /**
     * TienLM
     * Get all users
     */
    public function scopeNotId($query, $userId = null) {
        $query->select('id', 'name', 'status');

        if (!empty($userId)) {
            $query->where('id', '!=', $userId);
        }

        return $query;
    }

    /**
     * Get all users by roles and exclude id
     *
     * @param {Array} $roles, {Array} $exclude
     * @return $query
     **/
    public function scopeGetByRole($query, $roles = array(), $exclude = array())
    {
        $query->select('id', 'name', 'status');

        if (!empty($exclude)) {
            $query->whereNotIn('id', $exclude);
        }

        if(!empty($roles)) {
            $query->whereHas('role', function($q) use ($roles) {
                $q->whereIn('name', $roles);
            });
        }

        return $query;
    }

    /**
     * Get the sections
     * one to many
     **/
    public function courses()
    {
        return $this->hasMany('Alloy\Models\Courses', 'course_id', 'id');
    }

}
