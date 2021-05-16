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
<h1> Sửa Loại Tin</h1>

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
    <div class="container">
     <div class="col">
     <form action="post/<?php echo e($loaitin->id); ?>" method="POST">
     <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
     <div class="form-group">
  <label for="usr">Tên Loại Tin:</label>
  <br/><span> </span>
  <input value="<?php echo e($loaitin->Ten); ?>" name="name" type="text" class="form-control" id="usr">
</div>

<div class="form-group">
<label for="usr">Thể Loại:</label>
      <select class="form-control" id="sel1" name="name_theloai">
      <?php /*
      $idTheloai = $loaitin->idTheLoai;
           foreach ($theloai as $value){
        ?>
<option <?php
   if($value->id == $idTheloai){
     echo ' selected ';
   }
?> value="<?=$value->id?>"> <?=$value->Ten?> </option><br/> <br/>
        <?php
           } */
        ?>
        <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option 
            <?php if($value->id == $loaitin->idTheLoai): ?>
                 selected
             <?php endif; ?>

             value="<?php echo e($value->id); ?>"> <?php echo e($value->Ten); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      </div>
<button style="margin-bottom : 12px" type="submit" class="btn btn-danger">Lưa Lại</button>
  </form>
     </div> 
    </div>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/admin/loaitin/sualoaitin.blade.php ENDPATH**/ ?>