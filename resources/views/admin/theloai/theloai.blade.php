

@extends('admin.layout.index')
@section('NoiDung')
<?php
$valueSeacher = '';
 if(isset($seacher)){
   $valueSeacher = $seacher;
 }

?>
<style>
        .pagination a {
            text-decoration: none;
            text-transform: none; 
            font-size : 18px;
            color : black;
            position: relative;
            top : 5px;
        }
        .pagination li{
            float : left;
            text-decoration: none;
            text-transform: none; 
            background: white ;
            list-style: none; 
            border : 1px solid silver;
            width : 40px;
            height : 40px;
            text-align: center;
        }
        .active{
            background: blue !important;
            color : white;
        }
        .pagination {
          z-index : 999 !important;
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

<h1> Danh Sách Thể Loại </h1>
    <a href="them"> <button type="button" class="btn btn-success">Thêm Thể Loại</button> </a>
    <div class="search-product">
       <form method="POST" action="{{route('seachTheLoai')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
           <center><h5> Tìm Kiếm Thể Loại</h5></center>
         
           <input value="{{$valueSeacher}}" name="search_name" type="text" class="form-control" placeholder="Enter Your Key Search Name Category" id="name_searche">
            <div style="clear : both"></div>
            <span style="margin-left : 12px"></span><br/>
           <button type="submit" class="btn btn-dark">Tìm Kiếm</button>
           </form>
    </div>
          @if(isset($seacher))
              <h5 style="margin-left : 12px"> Kết quả tìm Kiếm '{{$seacher}}'</h5>
           
           @endif
           <h6 style="float: right;
           margin-right : 12px "> Có tất cả <i>{{count($theloai)}}</i> Sản Phẩm trên <i>{{ceil(count($theloai)/4)}}</i> trang</h6>
              @if(session('thongbao'))
     <div style="background : greenyellow" class="alert-error">
                  <span> 
                        {{session('thongbao')}}
                  </span>
             </div>
     @endif
  <table class="table table-bordered">
    <thead>
      <tr style="text-align : center">
      <th>ID</th>
        <th>Tên Thể Loại</th>
        <th>Tên Không Dấu</th>
        <th>Copy</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
 @foreach($theloai as $value)
 <tr>
 <td> {{$value->id}}</td>
 <td>{{$value->Ten}}</td>
 <td>{{$value->TenKhongDau}}</td>
    <td><center><a href="category_edit.php?id=&takes=copy"><button type="button" class="btn btn-primary">Copy</button> </a></center></td>
        <td> <center><a href="sua/{{$value->id}}"><button type="button" class="btn btn-warning">Sửa</button> </a> </center></td>
        <td> <center> <a href="xoa/{{$value->id}}"><button type="button" class="btn btn-danger">Xóa</button> </a> </center></td>
        </tr>
 @endforeach

 {!! $theloai->links()!!} 
    </tbody>

  </table>
 
@endsection