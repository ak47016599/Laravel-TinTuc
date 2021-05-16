

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
<h1> Thêm Loại Tin</h1>
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
     <form action="{{route('addloaitin')}}" method="POST">
     <input type="hidden" name="_token" value="{{csrf_token()}}">
     <div class="form-group">
  <label for="usr">Tên Loại tin:</label>
  <br/><span> </span>
  <input value="" name="name" type="text" class="form-control" id="usr">
</div>
<div class="form-group">
<label for="usr">Thể loại:</label>
      <select class="form-control" id="sel1" name="name_theloai">
       @foreach($TenTheLoai as $value)
       <option value="{{$value->id}}"> {{$value->Ten}}</option><br/>
       @endforeach 
      </select>
      </div>
<button style="margin-bottom : 12px" type="submit" class="btn btn-danger">Xác Nhận</button>
  </form>
     </div> 
    </div>
  
@endsection
