<?php echo $__env->make('post.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   
    <div class="temp-container">
         <a href=""> <h3 style="color : blue"> <?php echo e($theloai[0]->Ten); ?></h3></a>
          <ul class="temp-container-list">
            <?php $__currentLoopData = $theloai[0]->loaitinFunction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="..\loaitin/<?php echo e($key->TenKhongDau); ?>"> <li> <?php echo e($key->Ten); ?> </li></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
    </div>
  <div class="box-first">
    
  <?php
  $loaitin = $theloai[0]->loaitinFunction;
     foreach ($loaitin as $key){
         //var_dump($key);
         $tin1 = $key->tintuc->take(1);
     }
    
?>
    <div class="left-box-first1">
       <?php $__currentLoopData = $tin1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="..\<?php echo e($key->TieuDeKhongDau); ?>">  <img src="<?php echo e(asset($key->Hinh)); ?>" height="330" width="520"></a>
    <a href="..\<?php echo e($key->TieuDeKhongDau); ?>"> <b><?php echo e($key->TieuDe); ?></b> </a> 
    <a href="..\<?php echo e($key->TieuDeKhongDau); ?>" ><p><?php echo e($key->TomTat); ?></p></a>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
 
    <div style="clear:both"></div>
    <?php
  $loaitin = $theloai[0]->loaitinFunction->take(3);
?>

    <div class="contact-more">
      <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $tin2 = $key->tintuc->take(2);
          ?>
      <?php $__currentLoopData = $tin2->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="more-new">
    <a href="..\<?php echo e($value['TieuDeKhongDau']); ?>"> <img src="<?php echo e(asset($value['Hinh'])); ?>" width="250" height="170"></a>
     <h4><a href="..\<?php echo e($value['TieuDeKhongDau']); ?>"><?php echo e($value['TieuDe']); ?></a> </h4>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div style="clear:both"></div>
 
  </div>
  <?php
 
  $tempSum = 0;
   $tempSum1 = 0;?>
  <div style="width : 100%;
    border-top: 4px solid #d4d2d2;
    margin : 30px 0px 30px 0px">
    </div>
    <div class="border-content-navbar">
    <div class="left-box-secenter">
      <?php  
         $loaitin = $theloai[0]->loaitinFunction;
        ?>
        <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php  $Infor = $key->tintuc;  ?>
        <?php $__currentLoopData = $Infor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="content-news">
           <a href="..\<?php echo e($news->TieuDeKhongDau); ?>"> <b> <?php echo e($news->TieuDe); ?></b></a>
           <div style="clear: both;"></div>
                <a href="..\<?php echo e($news->TieuDeKhongDau); ?>">   <img 
                  <?php 
                  if( $tempSum == 3){
                        echo 'class="active-image"';
                        $tempSum = 0;
                  }else {
                   $tempSum ++;
                  }
                  ?>  
                  style="float:left" src="<?php echo e(asset($news->Hinh)); ?>" height="120" width="180"></a>
                  <div class="text    <?php 
                  if( $tempSum1 == 3){
                        echo 'text-active';
                        $tempSum1 = 0;
                  }else {
                   $tempSum1 ++;
                  }
                  ?>">
                    <span> <a href="..\<?php echo e($news->TieuDeKhongDau); ?>">(Dân trí) - <?php echo e($news->TomTat); ?>

                    </a></span> <br/>
                     <span>  <?php echo e($news->created_at); ?></span>
             </div>
             </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
        
        </div>
        <div class="right-box-secenter">
          <div class="table-title">
            <h5 style="color : black"> TIÊU ĐIỂM</h5>
          <?php
           $loaitin = $theloai[0]->loaitinFunction->take(1);
          ?>
           <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $Infor = $key->tintuc->take(1); ?>
            <?php $__currentLoopData = $Infor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="..\<?php echo e($tt->TieuDeKhongDau); ?>">  <img src="<?php echo e(asset($tt->Hinh)); ?>" width="250" height="170"></a>
            <a href="..\<?php echo e($tt->TieuDeKhongDau); ?>"> <b> <?php echo e($tt->TieuDe); ?></b></a> <br/>
          <a href="..\<?php echo e($tt->TieuDeKhongDau); ?>">  <span>(Dân trí) - <?php echo e($tt->TomTat); ?></span> </a>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <ul class="more-link-news"> 
            <?php
           $loaitin = $theloai[0]->loaitinFunction->take(3);
          ?>
           <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php $Infor = $key->tintuc->take(1); ?>
           <?php $__currentLoopData = $Infor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li> <a href="..\<?php echo e($tt->TieuDeKhongDau); ?>"><?php echo e($tt->TieuDe); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <div style="clear: both"></div>
      </div>
      <!----------------------------->
      <?php
       $loaitin = $theloai[0]->loaitinFunction;
      
      ?>
       <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php
          $tin = $value->tintuc->take(3);
          $titleNews = $value->tintuc->take(1)->toArray(); 
       ?>
       
      <div class="table-title">
        <h5> <?php echo e($value->Ten); ?></h5>
      <?php $__currentLoopData = $titleNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <a href="..\<?php echo e($key['TieuDeKhongDau']); ?>"> <img src="<?php echo e(asset($key['Hinh'])); ?>" width="250" height="170"></a>
        <a href="..\<?php echo e($key['TieuDeKhongDau']); ?>"> <b> <?php echo e($key['TieuDe']); ?></b></a> <br/>
      <a href="..\<?php echo e($key['TieuDeKhongDau']); ?>">  <span>(Dân trí) - <?php echo e($key['TomTat']); ?></span> </a>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <ul class="more-link-news"> 
        <?php $__currentLoopData = $tin->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li> <a href="..\<?php echo e($key['TieuDeKhongDau']); ?>"> <?php echo e($key['TieuDe']); ?></a></li>
         
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <div style="clear: both;"></div>
  </div>
     
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            
 <div style="clear: both;"></div>
        </div>
        <div style="clear: both;"></div>
      </div>
        <!-------->
   <b class="title-betral"> Đọc nhiều nhất chuyên mục</b>
   <!--  căn cứ vào số lượng người xem-->
  
   <div class="contact-more">
    <?php
    $loaitin = $theloai[0]->loaitinFunction;
    ?>

      <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $lt->tintuc->sortByDesc('SoLuotXem')->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="more-new">
  <a href="..\<?php echo e($tt->TieuDeKhongDau); ?>"> <img src="<?php echo e(asset($tt->Hinh)); ?>" width="250" height="170"></a>
  <a href="..\<?php echo e($tt->TieuDeKhongDau); ?>"> <h4><?php echo e($tt->TieuDe); ?> </h4> </a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/post/theloai.blade.php ENDPATH**/ ?>