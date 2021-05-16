@extends('admin.layout.index')
@section('NoiDung')
<?php
 // echo $tintuc->loaitinFunction->theloaiFunction->id; die();
?>
<style>
  #link {
    background: red;
    margin-bottom: 12px;
  }
  #systemp {
   margin-bottom: 12px;
  }
  .all-file {
 
    display : none;
  }
  .alert-error {
     background: pink;
     width: 100%;
     height : 40px;
     text-align: center;
     padding-top: 8px;
     color : red;
   }
 </style>
    <h1> Sửa Tin Tức '{{$tintuc->TieuDe}}'</h1>
    @if(count($errors) > 0)
    @foreach($errors->all() as $err)
    <div class="alert-error">
                 <span> 
                      
                       {{$err}} 
                    
                 </span>
            </div><br/>
            @endforeach
    @endif 
    @if(session('thongbao'))
    <div style="background : greenyellow" class="alert-error">
                 <span> 
                       {{session('thongbao')}}
                 </span>
            </div>
    @endif
    @if(session('loi'))
    <div style="background : pink" class="alert-error">
                 <span> 
                       {{session('loi')}}
                 </span>
            </div>
    @endif
    <div class="container">
      <div class="col">
      <form action="post/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
       <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
   <label for="usr">Tiêu đề tin tức:</label>
   <br/><span>  </span>
   <input value="{{$tintuc->TieuDe}}" name="name" type="text" class="form-control" id="usr">
 </div>
 <div class="form-group">
  <label for="usr">Thể loại:</label>
  <br/><span>  </span>
  
        <select id="ajax" class="form-control" id="sel1">
         @foreach($theloai as $value)
         <option  @if($value->id == $tintuc->loaitinFunction->theloaiFunction->id) selected @endif data-id="{{$value->id}}" value="{{$value->id}}"> {{$value->Ten}}</option>
     @endforeach
         
        </select>
        </div>
       <div class="form-group">
 <label for="usr">Loại Tin:</label>
 <br/><span>  </span>
 
       <select id="result-ajax" class="form-control" id="sel1" name="id_loaitin">
        @foreach($loaitin as $value)
        <option @if($value->id == $tintuc->idLoaiTin) selected @endif value="{{$value->id}}"> {{$value->Ten}}</option>
    @endforeach
        
       </select>
       </div>
 <div class="container p-3 my-3 border">
   <h6> Ảnh Đại Diện Tin: </a> </br>
 
      <img style="margin-top : 20px" id="change_image" src="{{ asset($tintuc->Hinh) }}" width="150" height="150"> <br/> <br/>
   
      <div id="link" class="btn btn-primary">Link Ảnh</div>
      <div id="systemp" class="btn btn-primary">Chọn Từ Thiết Bị</div>
      <div class="form-group input-file">
   <input onchange = "updateThumbnail()" value="{{$tintuc->Hinh}}" placeholder="Link hình ảnh" name="image" type="text" class="form-control" id="thumbnail">
 </div>
 <div class="custom-file mb-3 all-file">
     <input  type="file" class="custom-file-input" id="customFile" name="file_image">
       <label class="custom-file-label" for="customFile">Từ thiết bị này</label>
     </div> 
     
 </div>
 <div style="clear : both"> </div>
 <div class="container p-3 my-3 border">
 
 
 
 <div class="form-group">
   <label for="usr">Tóm tắt:</label>
   <br/><span>  </span>
   <input value="{{$tintuc->TomTat}}" name="textra" type="text" class="form-control" id="usr">
 </div>
 <div class="form-group">
 <label for="usr">Nổi bật:</label>
 <br/><span>  </span>
 
       <select class="form-control" id="sel1" name="status">
         <option @if($tintuc->NoiBat == 1) 
            selected
         @endif
         value="1"> Đáng chú ý</option>
         <option @if($tintuc->NoiBat == 2) 
          selected
       @endif value="2"> Tin hót</option>
       </select>
       </div>
 <div class="form-group">
   <label for="usr">Nội Dung:</label>
   <br/><span> </span>
   <textarea type = "text" class="form-control" rows="5" id="content" name="content"> {{$tintuc->NoiDung}}</textarea>
 </div>
  <button style="margin : 15px" type="submit" class="btn btn-danger">Xác Nhận</button>
   </form>
      </div> 
      @if(count($comment) != 0)
    <center> <h4> Quản lý bình luận tin tức</h4></center> 
      <table class="table table-bordered">
        <thead>
          <tr style="text-align : center">
             <th> Id</th>
            <th>Tên</th>
            <th>Nội Dung</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
         
        <!--   <tr>
         <td> 1</td>
            
            <td></td>
          
            <td>sản phẩm tốt</td>
        
            <td> <center><a href="sua"><button type="button" class="btn btn-warning">Sửa</button> </a> </center></td>
            <td> <center> <button onclick="deleteStudent()" type="button" class="btn btn-danger">Xóa</button></center></td>
          </tr> -->
        @foreach($comment as $value)
        <tr>
          <td>{{$value->id}}</td>
             
             <td>{{ $value->userFunction->name}}</td>
           
             <td>{{$value->NoiDung}}</td>
         
             <td> <center><a href="sua"><button type="button" class="btn btn-warning">Sửa</button> </a> </center></td>
             <td> <center> <a href="xoa/comment/{{$value->id}}/{{$tintuc->id}}"><button type="button" class="btn btn-danger">Xóa</button></a></center></td>
           </tr> 
         
        @endforeach 
        </tbody>
      </table>
      @endif
      @if(count($comment) == 0)
      <center> <h4> Tin tức này không có bình luận </h4></center> 
      @endif
     </div>

  @endsection