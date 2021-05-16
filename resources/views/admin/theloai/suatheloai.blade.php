

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
<h1> Sửa Thể Loại '{{$theloai->Ten}}'</h1>
    
    <div class="container">
     <div class="col">
     <form action="post/{{$theloai->id}}" method="POST">
     <div class="form-group">
  <label for="usr">Tên Thể Loại:</label>
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
  <br/><span> </span>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input value="{{$theloai->Ten}}" name="name" type="text" class="form-control" id="usr">
</div>
<button style="margin-bottom : 12px" type="submit" class="btn btn-danger">Lưu Lại</button>
  </form>
     </div> 
    </div>
  
@endsection