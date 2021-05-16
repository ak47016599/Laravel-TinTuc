
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <base href="<?php echo e(asset('')); ?>">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
.label-title {
    color : white;
}
    </style>

<div class = "wp-content">
<div class="container">
   <div class="container" id="wrapper">

    </div>
   <center> <h1 class="logo">Dân trí</h1></center>
  <form action="<?php echo e(url('postFormForgot')); ?>" method="POST">
    <input  type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <div class="form-group">
        <label class="label-title"> Tên người dùng :</label>
      <input readonly="false" value = "<?php echo e($data->name); ?>"  type="text" class="form-control" >
    </div>
    <div class="form-group">
        <label class="label-title"> Email :</label>
      <input readonly="false" value = "<?php echo e($data->email); ?>"  type="text" class="form-control" >
    </div>
    <div id = "password" class="form-group">
        <label class="label-title"> Mật khẩu :</label>
          <input value = "" type="password" class="form-control"  placeholder="Enter password" name="password">
        </div>
        <div style = "clear : both"> </div>
        <span id = "erro2">* Bắt buộc nhập </span>
        <div id = "password" class="form-group">
            <label class="label-title"> Nhập lại mật khẩu :</label>
              <input value = "" type="password" class="form-control"  placeholder="Enter password again" name="passwordAgain">
            </div>
            <div style = "clear : both"> </div>
            <span id = "erro2">* Bắt buộc nhập </span>


    <button type="submit" class="btn btn-warning">Cập nhật</button>
  </form>

   <p style="color : white;
   font-size : 20px ;
   text-align : center;
   margin-top : 150px">© 2021 Form Login.All rights reserved | Design by Vu Minh Hung </p>
</div>
</div>

<script src="<?php echo e(asset('javascript/login.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/submit/changePassword.blade.php ENDPATH**/ ?>