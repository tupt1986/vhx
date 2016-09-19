<?php

namespace vhx;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function Users()
    {
        return $this->belongsToMany('App/User', 'user_role', 'role_id', 'user_id');
    }
}
