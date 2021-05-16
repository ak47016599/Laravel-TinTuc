<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LoaiTin;
use App\Theloai;
class LoaiTinController extends Controller
{
    //
    public  function getDanhSach(){
        $loaitin = LoaiTin::paginate(5);
    //  $loaitin = LoaiTin::all();
        return (view('admin.loaitin.loaitin', ['loaitin' => $loaitin]));
    }
    public function getThem(){
        $theloai = Theloai::all();
       return (view('admin.loaitin.themloaitin', ['TenTheLoai' => $theloai]));
    }
    public function postThem(Request $request){
       $this->validate($request,[
          'name' => 'required|unique:LoaiTin,Ten|min:4|max:100',
          'name_theloai' => 'required'
       ],[
           'name.required' => 'Bạn chưa nhập tên loại tin',
           'name.min' => 'Tên loại tin phải từ 4 đến 100 ký tự',
           'name.max' => 'Tên loại tin phải từ 4 đến 100 ký tự',
           'name.unique' => 'Tên loại tin đã tồn tại',
           'name_theloai.required' => 'Bạn chưa chọn thể loại'
       ]);
       $loaitin = new LoaiTin;
       $loaitin->Ten = $request->name;
       $loaitin->idTheLoai = $request->name_theloai;
       $loaitin->TenKhongDau = changeTitle($request->name);
       $loaitin->save();
       return redirect('admin/loaitin/them')->with('thongbao','thêm loại tin thành công');
    }
    public function getSua($id){
        $loaitin = LoaiTin::find($id);
        $theloai = Theloai::all();
        return (view('admin.loaitin.sualoaitin', ['loaitin' => $loaitin,
        'theloai' =>  $theloai
        ]));
    }
    public function getXoa($id){
        $loaitin = LoaiTin::find($id)->delete();
       // $theloai->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
    public function postSua(Request $request, $id){
         $loaitin = LoaiTin::find($id);
         $this->validate($request, [
             'name' => 'required|unique:LoaiTin,Ten|min:4|max:100'
         ],[
             'name.required' => 'Tên loại tin không được để trống',
             'name.unique' => 'Tên loại tin đã tồn tại',
             'name.max' => 'Tên loại tin phải từ 4 đến 100 ký tự',
             'name.min' => 'Tên loại tin phải từ 4 đến 100 ký tự'
         ]);
         $loaitin->Ten = $request->name;
         $loaitin->idTheLoai = $request->name_theloai;
         $loaitin->TenKhongDau = changeTitle($request->name);
         $loaitin->save();
      return redirect('admin/loaitin/sua/'.$id)->with('thongbao', 'Sửa loại tin thành công');
    }
}
