<?php

namespace vhx;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class dichvu extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['madichvu','tendichvu','dvt','tileDTTL','dongia','masanluongtienthu','masanluongtienchi','madoanhthu','tengiaodichtien'];
}
