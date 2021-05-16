<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Theloai;
class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){

      //  $theloai = Theloai::all();
      $theloai = Theloai::paginate(4);

        return(view('admin.theloai.theloai', ['theloai' => $theloai]));

    }
    public function getThem(){
        return (view('admin.theloai.themtheloai'));
    }

    public function postThem(Request $request){
      $this->validate($request,
      [
         'name' => 'required|min:3|max:100'
      ],
      [
         'name.required' => 'Bạn chưa nhập thể loại',
         'name.unique' => 'Tên thể loại đã tồn tại',
         'name.min' => 'Tên thể loại phải từ 3 đến 100 ký tự',
         'name.max' => 'Tên thể loại phải từ 3 đến 100 ký tự'
      ]);
        $theloai = new Theloai;
        $theloai->Ten = $request->name;
        $theloai->TenKhongDau = changeTitle($request->name);
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao', 'Thêm thành công');
        /*
        Cách 1
        $error = array();
        if($theloai->Ten == ""){
          $error[] = 'Tên không được để trống';
        }
        if (strlen($theloai->Ten) < 4  && $theloai->Ten != "" || strlen($theloai->Ten) >= 40){
          $error[] = 'Tên thể loại không nhỏ hơn 4 kí tự hoặc lớn hơn 40 kí tự';
        }
        if (count($error) == 0 ){
          $theloai->save();
        }
         return (view('admin.theloai.themtheloai', ['error' => $error]));
         */
    }
    public function getSua($id){
      $theloai = Theloai::find($id);
      return (view('admin.theloai.suatheloai', ['theloai' => $theloai]));
  }
    public function postSua(Request $request, $id){
      $theloai = Theloai::find($id);
      $this->validate($request,
       [
          'name' => 'required|min:3|max:100'
       ],
       [
          'name.required' => 'Bạn chưa nhập tên thể loại',
          'name.unique' => 'Tên thể loại đã tồn tại',
          'name.min' => 'Tên thể loại phải từ 3 đến 100 ký tự',
          'name.max' => 'Tên thể loại phải từ 3 đến 100 ký tự'
       ]);
       $theloai->Ten = $request->name;
       $theloai->TenKhongDau = changeTitle($request->name);
       $theloai->save();
  return redirect('admin/theloai/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }
    public function getXoa($id){
     //echo $id;
      $theloai = Theloai::find($id);
      $theloai->delete();
      return redirect('admin/theloai/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
    public function SeachTheloai(Request $request){
      //$theloai = Theloai::paginate(4);
        //$theloai = Theloai::where('Ten',$request->search_name)->get();
        $theloai = Theloai::where('Ten', 'LIKE', "%$request->search_name%")->paginate(4);
       /* foreach($theloai as $value) {
          echo $value->Ten;
        } die();  */

        return(view('admin.theloai.theloai', ['theloai' => $theloai, 'seacher' => $request->search_name]));
    }
}
