<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta content="csrf-token" name="<?php echo e(csrf_token()); ?>">
</head>
<body>

     <form method="POST" action="<?php echo e(url('postForm')); ?>">
        
           <?php if(count($errors) > 0): ?>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $er): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <span style="color : red"> <?php echo e($er); ?></span><br/>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
           <?php if($message = Session::get('success')): ?>
               <span style="color : green"> <?php echo e($message); ?> </span> <br/>
           <?php endif; ?>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <label> Nhập tên của mày : </label>
          <input type="text" name="username"> <br/>
          <label> Nhập Email của mày :</label>
          <input type="email" name="email"><br/>
          <label> Nhập nội dung của mày :</label>
          <input type="text" name="content"><br/>
          <button type="submit"> Xác nhận</button>
     </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/send_email.blade.php ENDPATH**/ ?>