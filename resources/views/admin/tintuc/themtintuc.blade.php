@extends('admin.layout.index')
@section('NoiDung')
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
    <h1> Thêm Tin Tức</h1>
    @if(count($errors)  > 0)
    @foreach($errors->all() as $err)
    <div class="container alert-error">
      <span> 
           
            {{$err}} 
         
      </span>
    
 </div><br/>
     @endforeach
 @endif
 @if(session('loi'))
 <div style="background : pink" class="alert-error">
              <span> 
                    {{session('loi')}}
              </span>
         </div>
 @endif
 @if(session('thongbao'))
 <div style="background : greenyellow" class="alert-error">
              <span> 
                    {{session('thongbao')}}
              </span>
         </div>
 @endif
    <div class="container">
     <div class="col">
     <form action="{{route('addtintuc')}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
     <div class="form-group">
  <label  for="usr">Tiêu đề tin tức:</label>
  <br/><span>  </span>
  <input value="" name="name" type="text" class="form-control" id="usr">
</div>
<div class="form-group">
  <label for="usr">Thể Loại:</label>
  <br/><span>  </span>
  
        <select id="ajax"  class="form-control" id="sel1" name="id_loaitin">
         
          @foreach($theloai as $value)
          <option  data-id="{{$value->id}}" value="{{$value->id}}"> {{$value->Ten}}</option><br/>
          @endforeach
        </select>
        </div>
      <div class="form-group">
<label for="usr">Loại Tin:</label>
<br/><span>  </span>

      <select id="result-ajax" class="form-control" id="sel1" name="id_loaitin">
       
        @foreach($TenLoaiTin as $value)
        <option value="{{$value->id}}"> {{$value->Ten}}</option><br/>
        @endforeach
      </select>
      </div>
<div class="container p-3 my-3 border">
  <h6> Ảnh Đại Diện Tin: </a> </br>

     <img style="margin-top : 20px" id="change_image" src="" width="150" height="150"> <br/> <br/>
  
     <div id="link" class="btn btn-primary">Link Ảnh</div>
     <div id="systemp" class="btn btn-primary">Chọn Từ Thiết Bị</div>
     <div class="form-group input-file">
  <input onchange = "updateThumbnail()" value="" placeholder="Link hình ảnh" name="image" type="text" class="form-control" id="thumbnail">
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
  <input value="" name="textra" type="text" class="form-control" id="usr">
</div>
<div class="form-group">
<label for="usr">Nổi bật:</label>
<br/><span>  </span>

      <select class="form-control" id="sel1" name="status">
        <option value="1"> Đáng chú ý</option>
        <option value="2"> Tin hót</option>
      </select>
      </div>
<div class="form-group">
  <label for="usr">Nội Dung:</label>
  <br/><span> </span>
  <textarea type = "text" class="form-control" rows="5" id="content" name="content"> </textarea>
</div>
 <button style="margin : 15px" type="submit" class="btn btn-danger">Xác Nhận</button>
  </form>
     </div> 
    </div>
  @endsection
 