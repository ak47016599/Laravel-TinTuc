<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
    //
    protected $table = "theloai";
    public $timestamps = false;
    public function loaitinFunction(){
        return $this->hasMany('App\LoaiTin', 'idTheLoai', 'id');
    }
    public function tintucFunction(){
        return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id');
    }
   
}
