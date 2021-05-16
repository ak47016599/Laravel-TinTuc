

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
<h1> Thêm Thể Loại</h1>
    
    <div class="container">
     <div class="col">
     <form action="{{route('addtheloai')}}" method="POST">
     <input type="hidden" name="_token" value="{{csrf_token()}}">
     <div class="form-group">
       
  <label for="usr">Tên thể loại:</label>
  <?php
       /*  if(isset($error)){
            if(count($error) != 0){
                  echo '  <div class="alert-error">
                  <span> '.$error[0].'</span>
             </div>';
            } else {
              echo '  <div style="background : greenyellow" class="alert-error">
              <span>  Thêm thành công</span>
         </div>';
            }
         }
       
       */
       ?>
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
  <input value="" name="name" type="text" class="form-control" id="usr">
</div>

<button style="margin-bottom : 12px" type="submit" class="btn btn-danger">Xác Nhận</button>
 <a href="them"> <button style="margin-bottom : 12px" type="button" class="btn btn-warning">Làm Mới</button> </a>
  </form>
     </div> 
    </div>
  
@endsection