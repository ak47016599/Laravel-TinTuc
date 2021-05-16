<?php echo $__env->make('post.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
  function ChangeColor($str, $string){
     return (str_replace($string, "<span style='color : red'> $string</span>", $str));
  }
?>

 <?php if(count($resultNews) != 0): ?>
 <center> <h3 style="margin : 15px"> Kết quả tìm kiếm :"<?php echo e($key); ?>"</h3></center>

 <?php endif; ?>
 <?php if(count($resultNews) == 0): ?>
 <center> <h3 style="margin : 15px"> Không tìm thấy :"<?php echo e($key); ?>"</h3></center>
 <?php endif; ?>
 <div class="left-box-secenter">
 <?php $__currentLoopData = $resultNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="content-news">
       <a href="<?php echo e(asset("tintuc/". $value->TieuDeKhongDau)); ?>"> <b> <?php echo ChangeColor($value->TieuDe, $key); ?></b></a>
       <div style="clear: both;"></div>
            <a href="<?php echo e(asset("tintuc/". $value->TieuDeKhongDau)); ?>">  <img
              style="float:left" src="<?php echo e($value->Hinh); ?>" height="120" width="180"> </a>
              <div class="text ">
                <span> <a href="<?php echo e(asset("tintuc/". $value->TieuDeKhongDau)); ?>">(Dân trí) - <?php echo ChangeColor($value->TomTat, $key); ?>

                </a></span> <br/>
                <a href="<?php echo e(asset("tintuc/theloai/". $value->loaitinFunction->theloaiFunction->TenKhongDau)); ?>"> <b class="belite"><?php echo ChangeColor($value->loaitinFunction->theloaiFunction->Ten, $key); ?> </b></a> - <span> <?php echo e($value->created_at); ?></span>
         </div>
         </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div style="clear: both;"></div>
              </div>
              <div style="clear: both;margin-top : 13px"></div>
              <?php echo e($resultNews->links()); ?>


<?php echo $__env->make('post.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/post/seache.blade.php ENDPATH**/ ?>