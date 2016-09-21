<?php

namespace vhx;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use vhx\User;

class donvi extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['madonvi','tendonvi'];

    public function Users(){
        return $this->hasMany('vhx\User');
    }

    public function buucucs(){
        return $this->hasMany('vhx\buucuc');
    }

}
