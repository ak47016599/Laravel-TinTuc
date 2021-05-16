<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\TinTuc;
use App\LoaiTin;
use App\Theloai;
class TinTucController extends Controller
{
    //
  /* public  function getDanhSach(){
        $tintuc = TinTuc::all();
        return (view('admin.tintuc.tintuc',['tintuc' => $tintuc]));
    }
    public function getThem(){
       return (view('admin.tintuc.themtintuc'));
    }
    public function getSua(){
        return (view('admin.tintuc.suatintuc'));
    } */
    public  function getDanhSach(){
        $tintuc = TinTuc::paginate(10);
    //  $loaitin = LoaiTin::all();
        return (view('admin.tintuc.tintuc', ['tintuc' => $tintuc]));
    }
    public function getThem(){
        $LoaiTin = LoaiTin::all();
        $theloai = Theloai::all();
       return (view('admin.tintuc.themtintuc', ['TenLoaiTin' => $LoaiTin,
       'theloai' => $theloai]));
    }
    public function CheckFile($file){
        $Errors = array();
        $nameFile = $file->getClientOriginalName('file_image');
        $nameType = $file->getClientOriginalExtension('file_image');
        $FileBites = $file->getClientSize('file_image');
        $valueTypes = array('jpg', 'png', 'jpeg', 'bmp');
        if(!in_array($nameType,$valueTypes)){
             $Errors[] = "* file '.$nameFile .' không đúng với định dạng hình ảnh";
        }
        if($FileBites > (8 * 1024 * 1024)){
            $Errors[] = "* file '.$nameFile.' vượt quá dung lượng cho phép";
        }
       return ($Errors);
    }
    public function postThem(Request $request){
        $tintuc = new TinTuc;
        $errors = array();
        if($request->hasFile('file_image') == true && $request->image == ''){
            $file = $request->file_image;
           $result = $this->CheckFile($file);
           $nameFile = $file->getClientOriginalName('file_image');

           if (count($result) > 0){
               //Can not upload file
               $errors = $result;
           }


        } else if( $request->image != '' && $request->hasFile('file_image') == false){
            $tintuc->Hinh = $request->image;
        }
        if( $request->image == '' && $request->hasFile('file_image') == false){

            $errors[] = '* Bạn chưa chọn file ảnh nào';
        }  else if( $request->image != '' && $request->hasFile('file_image') == true){

            $errors[] = '* Bạn chỉ lựa chọn 1 cách upload file';
        }
    //   var_dump($errors); die();
      /* echo "Tiêu đề : $request->name <br/>";
       echo "id loại tin : $request->id_loaitin <br/>";
       echo "ảnh đại diện : $request->image <br/>";
       echo "Tên không dấu : $request->name_hidden <br/>";
       echo "Tóm tắt : $request->textra <br/>";
       echo "Nổi bật : $request->status <br/>";
       echo "Nội dung : $request->content"; unique:TinTuc,TieuDe|*/
       $this->validate($request, [
            'name' => 'required|unique:tintuc,TieuDe|min:10',
             'textra' => 'required|min:10',
             'content' => 'required|min:10'
       ],[
            'name.required' => 'Tiêu đề không được để trống',
            'name.unique' => 'Tiêu đề đã tồn tại',
            'name.min' => 'Tiêu đề phải tối đa trên 10 ký tự',

            'textra.required' => 'Tóm tắt không được để trống',
            'textra.min' => 'Tóm tắt phải tối đa trên 10 ký tự',
            'content.required' => 'Nội dung không được để trống',
            'content.min' => 'Nội dung phải tối đa trên 10 ký tự'
       ]);
       $tintuc->TieuDe = $request->name;
       $tintuc->TieuDeKhongDau = changeTitle($request->name);
       $tintuc->TomTat = $request->textra;
       $tintuc->NoiDung = $request->content;
      // $tintuc->Hinh = $request->image;
       $tintuc->NoiBat = $request->status;
       $tintuc->SoLuotXem = 0;
       $tintuc->idLoaiTin = $request->id_loaitin;
      if(count($errors) != 0){
          $text = '';
             foreach($errors as $value){
                  $text = $value;
             }
            return redirect('admin/tintuc/them')->with('loi', $text);
      } else {
          if ($request->image == ''){
              $Hinh = str_random(4)."_".$nameFile;
              while(file_exists("upload/tintuc/".$Hinh)){
                $Hinh = str_random(4)."_".$nameFile;
              }

            $file->move('upload/tintuc', ''.$Hinh.'');
            $tintuc->Hinh = "upload/tintuc/".$Hinh ;
          }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao', 'Thêm tin tức thành công');
      }


    }
    public function getSua($id){
        $comment = Comment::where('idTinTuc',$id)->paginate(4);
      /*  foreach ($comment as $value){
            echo $value->userFunction->name;
        }

        die(); */
        $loaitin = LoaiTin::all();
        $theloai = Theloai::all();
        $tintuc = TinTuc::find($id);
        return (view('admin.tintuc.suatintuc', [
        'loaitin' => $loaitin,
        'tintuc' => $tintuc,
        'theloai' => $theloai,
        'comment' => $comment
        ]));
    }
    public function getXoa($id){
        $tintuc = TinTuc::find($id);
      unlink( $tintuc->Hinh) ;
        $tintuc = TinTuc::find($id)->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
    public function postSua(Request $request, $id){

        $tintuc = TinTuc::find($id);
        $charCheck = $tintuc->Hinh;
        $errors = array();
        if($request->hasFile('file_image') == true && $request->image == ''){
            $file = $request->file_image;
           $result = $this->CheckFile($file);
           $nameFile = $file->getClientOriginalName('file_image');

           if (count($result) > 0){
               //Can not upload file
               $errors = $result;
           }


        } else if( $request->image != '' && $request->hasFile('file_image') == false){
            if ($charCheck[0] == 'u'){
                unlink($charCheck);
            }
            $tintuc->Hinh = $request->image;

        }
        if( $request->image == '' && $request->hasFile('file_image') == false){

            $errors[] = '* Bạn chưa chọn file ảnh nào';
        }  else if( $request->image != '' && $request->hasFile('file_image') == true){

            $errors[] = '* Bạn chỉ lựa chọn 1 cách upload file';
        }
        $this->validate($request, [
            'name' => 'required|min:10',
             'textra' => 'required|min:10',
             'content' => 'required|min:10'
       ],[
            'name.required' => 'Tiêu đề không được để trống',
            //'name.unique' => 'Tiêu đề đã tồn tại',
            'name.min' => 'Tiêu đề phải tối đa trên 10 ký tự',
            'image.required' => 'Ảnh tin tức không được để trống',
            'textra.required' => 'Tóm tắt không được để trống',
            'textra.min' => 'Tóm tắt phải tối đa trên 10 ký tự',
            'content.required' => 'Nội dung không được để trống',
            'content.min' => 'Nội dung phải tối đa trên 10 ký tự'
       ]);

       $tintuc->TieuDe = $request->name;
       $tintuc->TieuDeKhongDau = changeTitle($request->name);
       $tintuc->TomTat = $request->textra;
       $tintuc->NoiDung = $request->content;
       //$tintuc->Hinh = $request->image;
       $tintuc->NoiBat = $request->status;
       $tintuc->idLoaiTin = $request->id_loaitin;
       if(count($errors) != 0){
        $text = '';
           foreach($errors as $value){
                $text = $value;
           }
          return redirect('admin/tintuc/sua/'.$id)->with('loi', $text);
    } else {
        if ($request->image == ''){
            $Hinh = str_random(4)."_".$nameFile;
            while(file_exists("upload/tintuc/".$Hinh)){
              $Hinh = str_random(4)."_".$nameFile;
            }
          $file->move('upload/tintuc', ''.$Hinh.'');
          if ($charCheck[0] == 'u'){
            unlink($charCheck);
        }
          $tintuc->Hinh = "upload/tintuc/".$Hinh ;
        }
      $tintuc->save();
      return redirect('admin/tintuc/sua/'.$id)->with('thongbao', 'Sửa tin tức thành công');
    }

    }
    public function getxoaComment($id, $idTinTuc){

         $comment = Comment::find($id)->delete();
         return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Xóa bình luận thành công');
    }
}
