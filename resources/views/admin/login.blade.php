
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <base href="{{asset('')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="{{asset('css/login.css')}}">
  <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<div class = "wp-content">
<div class="container">
  <h2 class = "form-h2">Đăng Nhập</h2>
  <form action="admin/dangnhap" method="POST" name="myForm"  onsubmit="return validateForm()">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div id = "username" class="form-group">
      <img class = "image-form" src = "https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-and-shapes-3/177800/129-512.png" width = "35" height = "35">
      <input value = "" autocomplete = "off" type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
    <span id ="erro1">* Bắt buộc nhập </span>
    <div style = "clear : both"> </div>
    <div id = "password" class="form-group">
    <img class = "image-form" src = "https://capitalise.com/public/lock_icon_for-blog.png" width = "35" height = "35">
      <input value = "" type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div style = "clear : both"> </div>
    <span id = "erro2">* Bắt buộc nhập </span>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" value = "1"> Remember me
      </label>
    </div>
    @if(session('thongbao'))
<div  class = "login-error" id = "erro3">Tài khoản hoặc mật khẩu không chính xác </div>
    @endif
    <button type="submit" class="btn btn-danger">Đăng nhập</button>

  </form>


   <p style="color : white;
   font-size : 20px ;
   text-align : center;
   margin-top : 200px">© 2021 Form Login.All rights reserved | Design by Vu Minh Hung </p>
</div>
</div>
<script src="{{asset('javascript/login.js')}}"></script>
</body>
</html>
