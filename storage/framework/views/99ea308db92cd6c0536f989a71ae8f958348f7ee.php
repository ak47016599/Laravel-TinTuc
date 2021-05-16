

<?php echo $__env->make('post.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="temp-container">
         <a href=""> <h3> <?php echo e($loaitin[0]->theloaiFunction->Ten); ?></h3></a>
          <ul class="temp-container-list">
             
          
             <?php $__currentLoopData = $theloai[0]->loaitinFunction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <a href="<?php echo e($lt->TenKhongDau); ?>"> <li <?php if($lt->id == $loaitin[0]->id): ?> class="active-href" <?php endif; ?>  ><?php echo e($lt->Ten); ?> </li></a>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
    </div>
  <div class="box-first">
    <div class="left-box-first1">
      <?php
          $resultFirst = $loaitin[0]->tintuc->where('NoiBat', 1)->take(1);
        ?>
        <?php $__currentLoopData = $resultFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <a href="..\<?php echo e($lt->TieuDeKhongDau); ?>"><img src="<?php echo e(asset($lt->Hinh)); ?>" height="330" width="520"></a> 
    <a href="..\<?php echo e($lt->TieuDeKhongDau); ?>"> <b><?php echo e($lt->TieuDe); ?></b> </a> 
     <a href="..\<?php echo e($lt->TieuDeKhongDau); ?>"> <p>(Dân trí) - <?php echo e($lt->TomTat); ?></p> </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
 
    <div style="clear:both"></div>
    <div class="contact-more">
      <?php
          $resultFirst = $loaitin[0]->tintuc->take(3);
        ?>
        <?php $__currentLoopData = $resultFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="more-new">
    <a href="..\<?php echo e($lt->TieuDeKhongDau); ?>"> <img src="<?php echo e(asset($lt->Hinh)); ?>" width="250" height="170"></a>
     <h4><a href="..\<?php echo e($lt->TieuDeKhongDau); ?>"><?php echo e($lt->TieuDe); ?> </a></h4>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div style="clear:both"></div>
 
  </div>
  <div style="width : 100%;
    border-top: 4px solid #d4d2d2;
    margin : 30px 0px 30px 0px">
    </div>
    <div class="border-content-navbar">
    <div class="left-box-secenter">
      <!------ class="active-image" -->
      <?php
       $resultFirst = $loaitin[0]->tintuc;
       $tempSum = 0;
       $tempSum1 = 0;
      ?>
         <?php $__currentLoopData = $resultFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="content-news">
           <a href="..\<?php echo e($lt->TieuDeKhongDau); ?>"> <b> <?php echo e($lt->TieuDe); ?></b></a>
           <div style="clear: both;"></div>
               <a href="..\<?php echo e($lt->TieuDeKhongDau); ?>">   <img  <?php 
               if( $tempSum == 3){
                     echo 'class="active-image"';
                     $tempSum = 0;
               }else {
                $tempSum ++;
               }
               ?>       style="float:left" src="<?php echo e(asset($lt->Hinh)); ?>" height="120" width="180"></a>
                  <div class="text   <?php 
                  if( $tempSum1 == 3){
                        echo 'text-active';
                        $tempSum1 = 0;
                  }else {
                   $tempSum1 ++;
                  }
                  ?> ">
                    <span > <a  href="..\<?php echo e($lt->TieuDeKhongDau); ?>"><?php echo e($lt->TomTat); ?>

                    </a></span> <br/>
                    <span> <?php echo e($lt->created_at); ?></span>
             </div>
             </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        
        </div>
        <div class="right-box-secenter">
          <?php
          $resultFirst = $loaitin[0]->tintuc->sortBy('created_at')->take(1);
          $resultFirst2 = $loaitin[0]->tintuc->take(3);
        ?>
          <div class="table-title">
            <h5 style="color : black"> TIÊU ĐIỂM</h5>
          <?php $__currentLoopData = $resultFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="..\<?php echo e($tt->TieuDeKhongDau); ?>"> <img src="<?php echo e(asset($tt->Hinh)); ?>" width="250" height="170"></a>
            <a href="..\<?php echo e($tt->TieuDeKhongDau); ?>"> <b><?php echo e($tt->TieuDe); ?></b></a> <br/>
          <a href="..\<?php echo e($tt->TieuDeKhongDau); ?>">  <span>(Dân trí) - <?php echo e($tt->TomTat); ?></span> </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <ul class="more-link-news"> 
            <?php $__currentLoopData = $resultFirst2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li> <a href="..\<?php echo e($tt->TieuDeKhongDau); ?>"> <?php echo e($tt->TieuDe); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
            
 <div style="clear: both;"></div>
        </div>
        <div style="clear: both;"></div>
      </div>
        <!-------->
   <b class="title-betral"> Đọc nhiều nhất chuyên mục</b>
   <div class="contact-more">
    <?php
    $resultFirst = $loaitin[0]->tintuc->sortByDesc('SoLuotXem')->take(5);
   ?>
     <?php $__currentLoopData = $resultFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
     <div class="more-new">
   <a href="..\<?php echo e($lt->TieuDeKhongDau); ?>"> <img src="<?php echo e(asset($lt->Hinh)); ?>" width="250" height="170"></a>
   <a href="..\<?php echo e($lt->TieuDeKhongDau); ?>"> <h4><?php echo e($lt->TieuDe); ?></h4> </a>
     </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
</div>
    </div>
 
    <div style="clear:both"></div>
    <div style="background:#e8fcf4 ">
    <div class="container">
    <?php echo $__env->make('post.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</div>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/post/loaitin.blade.php ENDPATH**/ ?>