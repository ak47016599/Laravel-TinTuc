<?php $__env->startSection('NoiDung'); ?>
<style>
 #link {
   background: red;
   margin-bottom: 12px;
 }
 #systemp {
  margin-bottom: 12px;
 }
 .all-file {

   display : none;
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
    <h1> Thêm Người Dùng</h1>
    <?php if(count($errors)  > 0): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container alert-error">
      <span> 
           
            <?php echo e($err); ?> 
         
      </span>
    
 </div><br/>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
 <?php if(session('loi')): ?>
 <div style="background : pink" class="alert-error">
              <span> 
                    <?php echo e(session('loi')); ?>

              </span>
         </div>
 <?php endif; ?>
 <?php if(session('thongbao')): ?>
 <div style="background : greenyellow" class="alert-error">
              <span> 
                    <?php echo e(session('thongbao')); ?>

              </span>
         </div>
 <?php endif; ?>
    <div class="container">
     <div class="col">
        <form name="myForm" onsubmit="return validateForm()" action="<?php echo e(route('addUser')); ?>" method="POST" enctype="multipart/form-data"> 
       
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
     <div class="form-group">
  <label  for="usr">Tên Người Dùng:</label>
  <br/><span>  </span>
  <input value="" name="username" type="text" class="form-control" >
</div>
<div style="clear : both"> </div>
<div class="container p-3 my-3 border">
<div class="form-group">
  <label for="usr">Email:</label>
  <br/><span>  </span>
  <input value="" name="email" type="email" class="form-control" >
</div>
<div class="form-group">
<label for="usr">Chức vụ:</label>
<br/><span>  </span>

      <select class="form-control" id="sel1" name="lever">
        <option value="1"> Admin</option>
        <option value="0"> Người Dùng</option>
      </select>
      </div>
      <div class="form-group">
        <label  for="usr">Mật Khẩu:</label>
        <br/><span>  </span>
        <input value="" name="password" type="password" class="form-control" >
      </div>
      <div class="form-group">
        <label  for="usr">Nhập Lại Mật Khẩu:</label>
        <br/><span style="margin : 12px; color : red" id="error1">  </span>
        <input value="" name="password_repeat" type="password" class="form-control" >
      </div>
 <button style="margin : 15px" type="submit" class="btn btn-danger">Xác Nhận</button>
  </form>
     </div> 
    </div>
    <script>
      function validateForm() {
        var password = $("input[name*='password']").val();
       var password_repeat = $("input[name*='password_repeat']").val();
   if(password != password_repeat){
     
     $("#error1").html("* password nhập lại không khớp");
     return false;
   } else {
    $("#error1").html("");
   }
   
  }

    </script>
  <?php $__env->stopSection(); ?>

 
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/admin/user/themuser.blade.php ENDPATH**/ ?>