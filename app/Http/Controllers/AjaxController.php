<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Theloai;
use App\LoaiTin;
class AjaxController extends Controller
{
    //
    public function ajax($idtheloai){
         $loaitin = LoaiTin::where('idTheLoai',$idtheloai)->get();
         foreach($loaitin as $value){
               echo '   <option value="'.$value->id.'"> '.$value->Ten.'</option><br/>';
         }
    }
}
