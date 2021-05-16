<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comment";
    public function tintucFunction(){
        return $this->belongsTo('App\TinTuc', 'idTinTuc', 'id');
    }
    public function userFunction(){
        return $this->belongsTo('App\userDemo', 'idUser', 'id');
    }
}
