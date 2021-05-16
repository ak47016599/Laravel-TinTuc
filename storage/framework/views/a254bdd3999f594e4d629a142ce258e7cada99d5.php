<?php $__env->startSection('NoiDung'); ?>
<style>
  .alert-error {
    background: pink;
    width: 100%;
    height : 40px;
    text-align: center;
    padding-top: 8px;
    color : red;
  }
</style>
<h1> Thêm Thể Loại</h1>
    
    <div class="container">
     <div class="col">
     <form action="<?php echo e(route('addtheloai')); ?>" method="POST">
     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
     <div class="form-group">
       
  <label for="usr">Tên thể loại:</label>
  <?php
       /*  if(isset($error)){
            if(count($error) != 0){
                  echo '  <div class="alert-error">
                  <span> '.$error[0].'</span>
             </div>';
            } else {
              echo '  <div style="background : greenyellow" class="alert-error">
              <span>  Thêm thành công</span>
         </div>';
            }
         }
       
       */
       ?>
     <?php if(count($errors) > 0): ?>
     <div class="alert-error">
                  <span> 
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($err); ?> <br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
  <br/><span> </span>
  <input value="" name="name" type="text" class="form-control" id="usr">
</div>

<button style="margin-bottom : 12px" type="submit" class="btn btn-danger">Xác Nhận</button>
 <a href="them"> <button style="margin-bottom : 12px" type="button" class="btn btn-warning">Làm Mới</button> </a>
  </form>
     </div> 
    </div>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/admin/theloai/themtheloai.blade.php ENDPATH**/ ?>