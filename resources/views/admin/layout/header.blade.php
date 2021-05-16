
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin || Quản lý sản phẩm</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <script src="{{asset('Ckeditor/resources/ckeditor/ckeditor.js')}}"> </script>
  <script>
    $(document).ready(function() {
      $('#ajax').change(function(){


        var value = $(this).val();
       // alert(value);
       $.get("ajax/loaitin/" + value,function(data){

                       $("#result-ajax").html(data);

                     });
      });
    }) ;
    </script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    @if (\Auth::check())
  <a class="navbar-brand" href="Change.php">Xin Chào <span style="color : orange">{{ \Auth::user()->name }}</span></a>
  @endif


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
    <li class="nav-item">
        <img class="image-nav" src="https://cdn4.iconfinder.com/data/icons/seo-and-digital-marketing-6-2/128/285-512.png" width="40" height="40">
        <a class="nav-link" href="Change.php">Thay Đổi Thông Tin</a>
      </li>
      <li class="nav-item">
        <img class="image-nav" src="https://noithattinnghia.com/wp-content/uploads/2019/03/cropped-icon-home-cam.png" width="40" height="40">
        <a class="nav-link" href="danhsach">Trang Chủ</a>
      </li>
      <li class="nav-item">
      <img class="image-nav" src="https://image.flaticon.com/icons/png/512/277/277210.png" width="37" height="37">
        <a class="nav-link" href="../../admin/logout">Đăng Xuất</a>
      </li>
    </ul>

    <div class="nav-mobile">
    <ul class="navbar-nav">
    <li class="nav-item">
        <img class="image-nav" src="https://upload.wikimedia.org/wikipedia/commons/6/6d/Windows_Settings_app_icon.png" width="40" height="40">
        <a class="nav-link" href="http://localhost/TinTucLaravel/public/admin/theloai/danhsach">Thể loại</a>
      </li>
      <li class="nav-item">
        <img class="image-nav" src="https://png.pngtree.com/png-vector/20191129/ourlarge/pngtree-office-checklist-icon-business-checklist-survey-test-icon-png-image_2047566.jpg" width="40" height="40">
        <a class="nav-link" href="http://localhost/Laravel5.8/public/admin/loaitin/danhsach">Loại tin</a>
      </li>
      <li class="nav-item">
      <img class="image-nav" src="https://png.pngtree.com/png-vector/20190725/ourlarge/pngtree-vector-newspaper-icon-png-image_1577280.jpg" width="40" height="40">
        <a class="nav-link" href="http://localhost/Laravel5.8/public/admin/tintuc/danhsach">Tin Tức</a>
      </li>
      <li class="nav-item">
      <img class="image-nav" src="https://ipos.vn/wp-content/uploads/2020/01/icon-12.png" width="40" height="40">
        <a class="nav-link" href="#">Bình luận</a>
      </li>
      <li class="nav-item">
      <img class="image-nav" src="https://vanchuyentrungquoc247.com/wp-content/uploads/2015/04/icon-3.png" width="45" height="45">
        <a class="nav-link" href="http://localhost/Laravel5.8/public/admin/users/danhsach">Người dùng</a>
      </li>
    </ul>
    </div>
  </div>
</nav>

    <div style="border : 1px solid #000000" class="wp-content">
    <div class="nav-detok">

    <ul class="navbar-nav">
    <li style=" background : black;
    color : white;
    padding : 15px;
    margin:0px;
    text-align : center;
    font-size : 20px ;"   > Admin Menu</li>
      <li class="nav-item">
        <img class="image-nav" src="https://upload.wikimedia.org/wikipedia/commons/6/6d/Windows_Settings_app_icon.png" width="40" height="40">
        <a class="nav-link" href="http://localhost/Laravel5.8/public/admin/theloai/danhsach">Thể loại</a>
      </li>
      <li class="nav-item">
        <img class="image-nav" src="https://png.pngtree.com/png-vector/20191129/ourlarge/pngtree-office-checklist-icon-business-checklist-survey-test-icon-png-image_2047566.jpg" width="40" height="40">
        <a class="nav-link" href="http://localhost/Laravel5.8/public/admin/loaitin/danhsach">Loại tin</a>
      </li>
      <li class="nav-item">
      <img class="image-nav" src="https://png.pngtree.com/png-vector/20190725/ourlarge/pngtree-vector-newspaper-icon-png-image_1577280.jpg" width="40" height="40">
        <a class="nav-link" href="http://localhost/Laravel5.8/public/admin/tintuc/danhsach">Tin Tức</a>
      </li>
      <li class="nav-item">
      <img class="image-nav" src="https://ipos.vn/wp-content/uploads/2020/01/icon-12.png" width="40" height="40">
        <a class="nav-link" href="#">Bình luận</a>
      </li>
      <li class="nav-item">
      <img class="image-nav" src="https://vanchuyentrungquoc247.com/wp-content/uploads/2015/04/icon-3.png" width="45" height="45">
        <a class="nav-link" href="http://localhost/Laravel5.8/public/admin/users/danhsach">Người dùng</a>
      </li>
    </ul>
    </div>
    <div class="body-content">
    <div  style = "display : none;
    position : fixed;
margin-top : 50px;
z-index : 1000 ;" class="alert alert-success">
    <strong>Thành công!</strong> <span id = "alert-text"></span>
  </div>
