<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <h1> Hiện thông tin người dùng ở đây</h1>
   <?php
   if (session()->has('login_user')) {
 echo '<h1> Tên người dùng :'.session('login_user')->name.'</h1>';
 echo '<h1> Email người dùng :'.session('login_user')->email.'</h1>';
 echo '<h1> Kiểu đang nhập mạng xã hội :'.session('login_user')->provider.'</h1>';
 echo '<h1> id Người dùng :'.session('login_user')->provider_id.'</h1>';


}else {
    echo 'Bạn chưa đăng nhập';
}

   ?>
   <?php
  if (session()->has('login_user')) {
     echo ' <br/> <a href="logout"> Đăng Xuất</a>';
   } else {
       echo '<a href="Login">Đăng Nhập</a>' ;
   }
   ?>
<br/><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FLaravel5.8%2Fpublic%2Ftintuc%2Fxuan-truong-va-cau-thu-ha-gia-lai-mung-sinh-nhat-cuc-lay-loi&title=123456&quote=day+la+tieu+de+xhia+se&description=Apparently%2C+the+accepted+answer+is+not+correct.">Chia sẻ lên facebook  </a>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/result/show.blade.php ENDPATH**/ ?>