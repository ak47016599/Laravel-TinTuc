

@extends('admin.layout.index')
@section('NoiDung')
<style>
  .alert-error {
    background: pink;
    width: 100%;
    height : 40px;
    text-align: center;
    padding-top: 8px;
    color : red;
  }
</style>
<h1> Sửa Loại Tin</h1>

@if(count($errors) > 0)
     <div class="alert-error">
                  <span> 
                        @foreach($errors->all() as $err)
                        {{$err}} <br/>
                        @endforeach
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
     <form action="post/{{$loaitin->id}}" method="POST">
     <input type="hidden" value="{{csrf_token()}}" name="_token">
     <div class="form-group">
  <label for="usr">Tên Loại Tin:</label>
  <br/><span> </span>
  <input value="{{$loaitin->Ten}}" name="name" type="text" class="form-control" id="usr">
</div>

<div class="form-group">
<label for="usr">Thể Loại:</label>
      <select class="form-control" id="sel1" name="name_theloai">
      <?php /*
      $idTheloai = $loaitin->idTheLoai;
           foreach ($theloai as $value){
        ?>
<option <?php
   if($value->id == $idTheloai){
     echo ' selected ';
   }
?> value="<?=$value->id?>"> <?=$value->Ten?> </option><br/> <br/>
        <?php
           } */
        ?>
        @foreach($theloai as $value)
            <option 
            @if($value->id == $loaitin->idTheLoai)
                 selected
             @endif

             value="{{$value->id}}"> {{$value->Ten}}</option>
        @endforeach
      </select>
      </div>
<button style="margin-bottom : 12px" type="submit" class="btn btn-danger">Lưa Lại</button>
  </form>
     </div> 
    </div>
  
@endsection