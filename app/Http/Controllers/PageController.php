<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Theloai;
use App\TinTuc;
use App\LoaiTin;
class PageController extends Controller
{
    //
    public function trangchu(){
      $theloaiAll = Theloai::all();
          $theloai = Theloai::all();
          $tintuc = TinTuc::all()->sortByDesc('created_at')->take(5);
          // lấy data thông qua id : find(Number Id)
          // Lấy qua điều kiện : where('tên cột', 'biểu thức so sánh', 'giá trị so sánh')

             return view('post.index', ['theloai' => $theloai,
             'tintuc' => $tintuc,
             'theloaiAll' => $theloaiAll]);
    }
    public function theloai($name){
      $theloaiAll = Theloai::all();
       $theloai = TheLoai::where('TenKhongDau', $name)->get();
       return (view('post.theloai',[ 'theloai' => $theloai,
       'theloaiAll' => $theloaiAll]));
    }
    public function loaitin($name){
       $loaitin = LoaiTin::where('TenKhongDau', $name)->get();
       $theloaiAll = Theloai::all();
       $nameTheLoai = $loaitin[0]->theloaiFunction->Ten;
       $theloai = TheLoai::where('Ten', $nameTheLoai)->get();
       return (view('post.loaitin',
       ['loaitin' => $loaitin,
       'theloai' => $theloai,
       'theloaiAll' => $theloaiAll
       ]));

    }
    public function getUserLogin(){
       return (view('admin.loginUser'));
    }
    public function postUserLogin(Request $request){
    $email = $request->email;
    $password = $request->password;
  if(Auth::attempt(['email' => $email, 'password' => $password])){
    // echo 'Login thanh cong';
   // return(redirect('tintuc/post'));
    $user = Auth::user();
    if(session()->has('login_user')){
        session()->forget('login_user');
        Auth::logout();
    }
    session()->put('login_user' ,$user);
    session()->save();
    return(redirect('tintuc/post'));
 } else {
     return(redirect('dangnhap')->with('thongbao', true));
 }
   }
}
