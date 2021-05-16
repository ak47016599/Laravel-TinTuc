
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <base href="{{asset('')}}">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
  <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
    <style>
          .logo {
    font-family: 'Sofia';font-size: 22px;
    color :#148f2e;
    font-size: 50px;
   padding : 50px;

}
#wrapper {
    width: 100%;
    height: 100%;
    background: none;
    margin: 0px auto;
    position: fixed;
    display: flex;
    top : 110px;
    z-index: 999;
    display: none;
}
.fa-close {
    font-size:30px;float : right;color : white;
  margin : 13px;
}
.center {
    width: 80%;
    height: 60%;
    background: #505050;
    margin: auto;
    border-radius: 6px;
}
.title-form-h2-resign{
    text-align: center;
color: aliceblue;
margin : 12px;
}
.forgot{
    float:right;
    color : white;
    position: relative;
    top : 0px;
}
    </style>

<div class = "wp-content">
<div class="container">
   <div class="container" id="wrapper">

    </div>
   <center> <h1 class="logo">Dân trí</h1></center>
  <form action="dangnhap" method="POST" name="myForm"  onsubmit="return validateForm()">
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
      <a href="javascript:;" > <span id="forgot" class="forgot" style="">Forgot Password ?</span></a>
    </div>
    @if(session('thongbao'))
<div  class = "login-error" id = "erro3">Tài khoản hoặc mật khẩu không chính xác </div>
    @endif

    <button type="submit" class="btn btn-danger">Đăng nhập</button>
  </form>
  <center>  <div class="or"> or</div> </center>
  <div class="login-for">
   <a href="{{ url('auth/redirect/facebook') }}">  <div class="facebook"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuK8RUd_XzvWaqk-gWMXWv1ycUEQnh2XNb4A&usqp=CAU" width="35" height="35"> <h1 id="text">Facebook </h1> <h1>Login width Facebook </h1></div> </a>
    <a href="{{ url('auth/google') }}"> <div class="email"><img src="https://www.barrownz.com/Content/Images/MegaMenuIcons/googleplusLogo.png" width="35" height="35"> <h1 id="text">Google+ </h1><h1>Login width Google+ </h1> </div></a>
  </div>
  <button id="resign" style="margin-top:45px" type="button" class="btn btn-primary">Đăng ký</button>
   <p style="color : white;
   font-size : 20px ;
   text-align : center;
   margin-top : 150px">© 2021 Form Login.All rights reserved | Design by Vu Minh Hung </p>
</div>
</div>
<script>
     $(document).ready(function(){
            $('#resign').click(function(){
                   $('#wrapper').css('display', 'block');
        $.get("dangnhap/ajax",function(data){
                $("#wrapper").html(data);
         });
            });
            $('#forgot').click(function(){
               // alert('haha');
                $('#wrapper').css('display', 'block');
                $.get("forgot/ajax",function(data){
                $("#wrapper").html(data);
         });
            });
     });
     $(document).ajaxComplete(function(){

                $('.fa-close').click(function(){
                   $('#wrapper').css('display', 'none');
            });
});
       function validateForm1(){
      Check = false;
      var username = $('#RgUser').val();
      var email = $('#RgEmail').val();
      // var password = $("input[name=password]").val();
      var password = $('#RgPassword').val();
    // console.log(password); userError passError
      var passwordAgain = $('#RgPasswordAgain').val();
      if(username.length == 0 || username == ''){
         $('#userError').html('* Tên hiện thị không được để trống');
         Check = true;
     } else {
        $('#userError').html('');
         Check = false;
     }
     if(username.length < 6 || username.length > 16){
         $('#userError').html('* Tên hiện thị phải từ 6 đến 16 ký tự');
         Check = true;
     } else {
        $('#userError').html('');
         Check = false;
     }
     if( email.length == 0 ||  email == ''){
         $('#emailError').html('* Email không được để trống');
         Check = true;
     } else {
        $('#emailError').html('');
         Check = false;
     }
     if(password.length == 0 || password == ''){
         $('#passError').html('* Mật khẩu không được để trống');
         Check = true;
     } else {
        $('#passError').html('');
         Check = false;
     }
     if(password.length < 6 || password.length > 16){
         $('#passError').html('* Mật khẩu phải từ 6 đến 16 ký tự');
         Check = true;
     }  else {
        $('#passError').html('');
         Check = false;
     }
     if (Check == true){
         return (false);
     }
      $.ajax({

      type:'GET',

      url:'ajaxRequest',

      data:{name:username, password:password, email:email},
      success:function(data){
    state = data.stater;
    if(state == 'error'){
        $('#emailError').html(data.email);
       return (false);
    } else if(state == 'success'){
        window.location = "http://localhost/Laravel5.8/public/tintuc/post";
    }
}

});
return(false);
       }
       function validateForm2(){
        var email = $('#RgEmail').val();
        if( email.length == 0 ||  email == ''){
         $('#emailError').html('* Email không được để trống');
         Check = true;
     } else {
        $('#emailError').html('');
         Check = false;
     }
     $.ajax({

type:'GET',

url:'ajaxRequestForgot',

data:{email:email},
success:function(data){

state = data.stater;

if(state == 'error'){
  $('#emailError').html(data.email);
 return (false);
}
else if(state == 'success'){
 //  $('#success-forgot').html(data.email);
    // $("#wrapper").html(data.email);
    window.location = "http://localhost/Laravel5.8/public/forgot/" + data.email;
}
}

});
     return false;
       }
</script>
<script src="{{asset('javascript/login.js')}}"></script>
</body>
</html>
