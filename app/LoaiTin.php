<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    //
    protected $table = "loaitin";
  //  public $timestamps = false;
  public $timestamps = false;
    public function theloaiFunction(){
        return $this->belongsTo('App\Theloai', 'idTheLoai', 'id');
    }
    public function tintuc(){
        return $this->hasMany('App\TinTuc', 'idLoaiTin', 'id');
    }
}
