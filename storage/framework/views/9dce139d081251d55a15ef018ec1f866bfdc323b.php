<?php echo $__env->make('post.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
.title-change-user {
    margin : 12px;
}
.container-content {
    background: #f1f1f1;
    width: 100%;
   padding-bottom: 30px !important;
    border-radius: 12px;
    border : 1px solid white;
    padding : 40px 100px 0px 100px;
}
.change-image {
    margin : 30px;
    width: 200px;
    height: 200px;
    border-radius: 100%;
    border : 1px solid pink;
}
.custom-file {
    margin-bottom: 12px;
}
.errors-change {
    color : red;
}
</style>
<center > <h2 class="title-change-user">Chỉnh sửa thông tin người dùng</h2></center>

<div class="container-content">
    <div class="container">
      <center>  <img class="change-image" src="<?php echo e(asset("imgUser/".session('login_user')->image)); ?>"/></center>
      <?php if(isset($errors) == true): ?>
      <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="errors-change"> <?php echo e($value); ?></span><br/>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <?php endif; ?>
      <?php endif; ?>
      <?php if(session('error')): ?>
          <span class="errors-change"><?php echo e(session('error')); ?> </span>
      <?php endif; ?>
    <form action="<?php echo e(route('changeUser')); ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <label>Thay đổi ảnh:</label>
        <div class="custom-file">
            <input name="myFile" type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
   <?php if(session('login_user')->provider == 'dantri'): ?>
        <div class="form-group">
          <label for="email">Tên người dùng:</label>
          <input name="username" value="<?php echo e(session('login_user')->name); ?>" type="text" class="form-control" placeholder="Enter username" >
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input name="email" value="<?php echo e(session('login_user')->email); ?>" type="email" class="form-control" placeholder="Enter email">
          </div>
        <div class="form-group">
          <label for="pwd">Mật khẩu xác nhận:</label>
          <input  name="password" type="password" class="form-control" placeholder="Enter password" id="pwd">
        </div>
        <div class="form-group">
            <label for="pwd">Mật khẩu mới:</label>
            <input name="newPassword" type="password" class="form-control" placeholder="Enter password new" id="pwd">
          </div>
        <div class="form-group">
            <label for="pwd">Nhập lại mật khẩu:</label>
            <input type="password" class="form-control" placeholder="Enter password again" id="pwd">
          </div>
    <?php endif; ?>
        <button type="submit" class="btn btn-primary">lưu lại</button>
      </form>

    </div>
</div>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
<?php echo $__env->make('post.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/post/change.blade.php ENDPATH**/ ?>