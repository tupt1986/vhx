<?php

namespace vhx;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use vhx\User;

class buucuc extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['donvi_id','mabuucuc','tenbuucuc'];

    public function Users(){
        return $this->hasMany('App\User');
    }

    public function donvis()
    {
        return $this->belongsTo('vhx\donvi','donvi_id');
    }
}
