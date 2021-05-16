
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
.title {
    color : rgb(190, 42, 42);
}
    </style>

<div class = "wp-content">
<div class="container">
   <div class="container" id="wrapper">

    </div>
   <center> <h1 class="logo">Dân trí</h1></center>
  <form action="<?php echo e(url('confirm')); ?>" method="POST" name="myForm"  onsubmit="return validateForm()">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <div id = "username" class="form-group">
        <?php if(isset($email)): ?>
        <b class="title"> Mã OTP đã được gửi đến <?php echo e($email); ?></b>
        <?php endif; ?>
      <input value = "" autocomplete = "off" type="number" class="form-control"  placeholder="Enter OTP" name="codeOtp">
    </div>
    <?php if(isset($error)): ?>
    <span style="color : red"> <?php echo e($error); ?></span>
    <?php endif; ?>

    <button type="submit" class="btn btn-warning">Xác thực mã OTP</button>
  </form>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/submit/forgot.blade.php ENDPATH**/ ?>