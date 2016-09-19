<?php

namespace vhx;

use vhx\Http\Requests\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use spec\Prophecy\Promise\RequiredArgumentException;

use vhx\Role;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('vhx\Role', 'user_role', 'user_id', 'role_id');
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach ($roles as $role)
            {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        }
        else
        {
            if ($this->hasRole($roles))
            {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first())
        {
            return true;
        }
        return false;
    }
}
