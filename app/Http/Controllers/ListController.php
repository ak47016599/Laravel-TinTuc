<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TinTuc;
use App\Theloai;
use App\LoaiTin;
use App\Comment;
class ListController extends Controller
{
    //
    public function postInformation($Information){

        $theloaiAll = Theloai::all();


       $ResultInformation = TinTuc::where('TieuDekhongDau',$Information)->get()->toArray();

       $ResultInformation1 = TinTuc::where('TieuDekhongDau',$Information)->get();
     $id = $ResultInformation1[0]->id;

      $name =  $ResultInformation1[0]->loaitinFunction->Ten;

      $nameTheloai =  $ResultInformation1[0]->loaitinFunction->theloaiFunction->Ten;

      $status =   Theloai::where('Ten', $nameTheloai)->get();

      $loaitin = LoaiTin::where('Ten', $name)->get();
      $comment = Comment::orderBy('created_at', 'desc')->where('idTinTuc', $id)->paginate(5);
     // var_dump($comment); die();
     //     echo $cm->userFunction->name ;
     // }
       //die();

     // var_dump($loaitin);
    //  die();
       //loaitinFunction
       $tintuc = TinTuc::all();
      return (view('post.content', ['data' => $ResultInformation,
      'tintuc' => $tintuc,
      'theloaiAll' => $theloaiAll,
      'loaitin' => $loaitin,
      'status' => $status,
      'comment' => $comment]));
     //  var_dump($ResultInformation);

    }
}
