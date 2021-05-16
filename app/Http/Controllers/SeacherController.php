<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\TinTuc;
class SeacherController extends Controller
{
    //
    public function seacher(Request $request){
       // echo $request->keySeacher;
   $keySeacher = $request->keySeacher;
         $resultSeacher = TinTuc::where('TieuDe', 'like', "%$keySeacher%")->orwhere('TomTat', 'like', "%$keySeacher%")->orwhere('NoiDung', 'like', "%$keySeacher%")->take(25)->paginate(3);
       $theloaiAll = Theloai::all();
       $theloai = Theloai::all();
          return view('post.seache', ['theloai' => $theloai,
          'theloaiAll' => $theloaiAll,
          'key' => $keySeacher,
          'resultNews' =>  $resultSeacher]);
    }
}
