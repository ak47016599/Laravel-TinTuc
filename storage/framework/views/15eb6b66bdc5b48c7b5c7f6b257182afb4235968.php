
<?php //var_dump(session('login_user')); die();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('css/tintuc.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/theloai.css')); ?>">
  <style>
     .login h5 {
        background: #148f2e;
        width : 130px;
        height: 40px;
        color : white ;
        border-radius: 5px;
        text-align: center;
        padding-top : 7px;
        font-size: 19px;
     }
     .login {
       float : right;
       margin-top : 24px;
       margin-left : 12px;
     }
     .user-index span{

         background: none !important;
         color : black !important;
     }
     .user-index {
         padding-top :5px;
        float : right;
       margin-top : 12px;
       margin-left : 30px;
     }
     .image-user {
        width : 50px;
        height : 50px;
        border-radius: 100%;
        border : 1px solid #000000;
        margin-left : 8px;
     }
  </style>
</head>

<body>
  <div class="container">
  <h1 class="logo">Dân trí</h1>
  <div class="seacher">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <form action="<?php echo e(asset('timkiem')); ?>" class="form-inline" method="POST">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input name="keySeacher" class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm tin tức">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
    </nav>
  </div>
  <?php if(session()->has('login_user')): ?>

 <a href="../user/change">   <div class=" user-index">
        <span> <?php echo e(session('login_user')->name); ?> <img class="image-user" src=" <?php echo e(asset("imgUser/".session('login_user')->image)); ?>"/> </span>
        <!--<i class='fas fa-user-alt' style='font-size:24px'></i>-->
    </div></a>
    <a href="<?php echo e(asset("logout/user")); ?>"><div class="login">
        <h5> Đăng Xuất <i class='fas fa-sign-in-alt' style='font-size:24px'></i></h5>
    </div></a>
 <?php endif; ?>
 <?php if(!session()->has('login_user') ): ?>
 <a href="<?php echo e(asset("dangnhap")); ?>"><div class="login">
     <h5> Đăng Nhập</h5>
 </div></a>
 <?php endif; ?>
</div>

  </body>
  <div style="clear:both"></div>

<br>

<div class="container">

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <a class="navbar-brand" href="<?php echo e(asset("tintuc/post")); ?>"><i class='fas fa-home' style='font-size:28px;color:rgb(255, 255, 255)'></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <?php $__currentLoopData = $theloaiAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(asset("tintuc/theloai/".$key->TenKhongDau)); ?>"><?php echo e($key->Ten); ?>

            </a>
            <?php if(count($key->loaitinFunction) > 0): ?>
             <ul class="demo">
                <?php $__currentLoopData = $key->loaitinFunction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <a href="<?php echo e(asset("tintuc/loaitin/".$value->TenKhongDau)); ?>"> <li style="width : 200px"> <?php echo e($value->Ten); ?> </li></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Xêm thêm
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Việc làm</a>
              <a class="dropdown-item" href="#">Sức khỏe</a>
              <a class="dropdown-item" href="#">Văn hóa</a>
            </div>
          </li>


        </ul>
      </div>
    </nav>
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/post/layout/header.blade.php ENDPATH**/ ?>