<?php echo $__env->make('post.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="temp-container">
 
    </div>
  <div class="box-first">
   
     <!-- -------------------------------------->

     
      
  
    <?php
    $dataMoreValue = $tintuc->take(4);
    $dataMoreFirst = $tintuc->take(1);
  ?>
   <div class="left-box-first">
   
   <?php $__currentLoopData = $dataMoreFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <a href="<?php echo e($value->TieuDeKhongDau); ?>"> <img src="<?php echo e($value->Hinh); ?>" height="330" width="520"></a>
  <a href="<?php echo e($value->TieuDeKhongDau); ?>"><b class="title"> <?php echo e($value->TieuDe); ?></b> <br/></a>
    <a href="<?php echo e($value->TieuDeKhongDau); ?>"><span class="title-2"><?php echo e($value->TomTat); ?></span></a>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <ul class="content-firs-list">
    <?php $__currentLoopData = $dataMoreValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <a href="<?php echo e($key->TieuDeKhongDau); ?>"><b> <li> <?php echo e($key->TieuDe); ?></li></b></a>
   
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </ul>
   
  </div>
  <style>
    .more-new {
      
      height : 250px;
    }
    .more-newst {
   
      height : 270px;
    }
  </style>
    <div class="right-box-first">
      <div class="title-box-right">  <h6 > TIN TỨC SỰ KIỆN</h6></div>
      <ul class="content-box-right">
   
        <?php $__currentLoopData = $tintuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e($value->TieuDeKhongDau); ?>"><?php echo e($value->TieuDe); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    <div style="clear:both"></div>
    <!------------------------------->
    <?php
  $resultNews = $theloai->where('id', 1);
 
?>
    <div class="contact-more">
      <?php $__currentLoopData = $resultNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php $__currentLoopData = $value->loaitinFunction->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $key->tintuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="more-new">
    <a href="<?php echo e($name->TieuDeKhongDau); ?>"> <img src="<?php echo e($name->Hinh); ?>" width="250" height="170"></a>
     <h4><a href="<?php echo e($name->TieuDeKhongDau); ?>"><?php echo e($name->TieuDe); ?></a> </h4>
      </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<!--------------------------------------------->

      
<div style="clear:both"></div>
 <?php
 
 $tempSum = 0;
  $tempSum1 = 0;?>
  </div>
  <div style="width : 100%;
    border-top: 4px solid #d4d2d2;
    margin : 30px 0px 30px 0px">
    </div>
    <div class="left-box-secenter">
    
        <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($value->loaitinFunction) > 0): ?>
     
        <?php 
         
        $data =  $value->tintucFunction->where('NoiBat', 1)->sortByDesc('created_at')->take(5);
        $tin1 = $data->shift();// return for you with type array
       ?>
        <div class="content-news">
           <a href="<?php echo e($tin1['TieuDeKhongDau']); ?>"> <b> <?php echo e($tin1['TieuDe']); ?></b></a>
           <div style="clear: both;"></div>
                <a href="<?php echo e($tin1['TieuDeKhongDau']); ?>">  <img 
                  <?php 
               if( $tempSum == 3){
                     echo 'class="active-image"';
                     $tempSum = 0;
               }else {
                $tempSum ++;
               }
               ?>  
                  style="float:left" src="<?php echo e($tin1['Hinh']); ?>" height="120" width="180"> </a>
                  <div class="text   <?php 
                  if( $tempSum1 == 3){
                        echo 'text-active';
                        $tempSum1 = 0;
                  }else {
                   $tempSum1 ++;
                  }
                  ?>">
                    <span> <a href="<?php echo e($tin1['TieuDeKhongDau']); ?>">(Dân trí) - <?php echo e($tin1['TomTat']); ?>

                    </a></span> <br/>
                    <a href="theloai/<?php echo e($value->TenKhongDau); ?>"><b class="belite"><?php echo e($value->Ten); ?> </b></a> <span> -  <?php echo e($tin1['created_at']); ?></span>
             </div>
             </div>
             <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <div style="clear: both;"></div>
                  <div class="tnews">
                    <h5> TIN TIÊU ĐIỂM</h5>
                    <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($value->loaitinFunction) > 0): ?>
                        <?php 
                           $data =  $value->tintucFunction->where('NoiBat', 2)->sortByDesc('created_at')->take(5);
                          // return for you with type array
                        ?>
                        <?php $__currentLoopData = $data->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tintuc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="more-newst">
                      <a href="<?php echo e($tintuc['TieuDeKhongDau']); ?>"> <img src="<?php echo e($tintuc['Hinh']); ?>" width="230" height="150"></a>
                       <h4><a href="<?php echo e($tintuc['TieuDeKhongDau']); ?>"> <?php echo e($tintuc['TieuDe']); ?></a> </h4>
                       <a href="theloai/<?php echo e($value->TenKhongDau); ?> "> <b class="belite"> <?php echo e($value->Ten); ?> </b></a>
                        </div>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                  </div>
              
                  <div style="clear: both;"></div>
                  <div class="border"></div>
             
                                
                                  <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($value->loaitinFunction) > 0): ?>
        <?php 
        $data =  $value->tintucFunction->where('NoiBat', 1)->sortBy('created_at')->take(1);
        $tin1 = $data->shift();// return for you with type array
       ?>
        <div class="content-news">
           <a href=" <?php echo e($tin1['TieuDeKhongDau']); ?>"> <b> <?php echo e($tin1['TieuDe']); ?></b></a>
           <div style="clear: both;"></div>
                <a href="<?php echo e($tin1['TieuDeKhongDau']); ?>"> <img style="float:left" src="<?php echo e(asset($tin1['Hinh'])); ?>" height="120" width="180"></a>
                  <div class="text">
                    <span> <a href="<?php echo e($tin1['TieuDeKhongDau']); ?>">(Dân trí) - <?php echo e($tin1['TomTat']); ?>

                    </a></span> <br/>
                    <a href="theloai/<?php echo e($value->TenKhongDau); ?>"><b class="belite"><?php echo e($value->Ten); ?> </b></a> <span> -  <?php echo e($tin1['created_at']); ?></span>
             </div>
             </div>
             <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <div class="tnews">
              <h5> ĐỪNG BỎ LỠ</h5>
              <?php $__currentLoopData = $theloai->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php 
                $data =  $value->tintucFunction->where('NoiBat', 1)->sortBy('created_at')->take(1);
              ?>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="more-newst">
                <a href="<?php echo e($key->TieuDeKhongDau); ?>"> <img src="<?php echo e(asset($key->Hinh)); ?>" width="230" height="150"></a>
                 <h4><a href="<?php echo e($key->TieuDeKhongDau); ?>"><?php echo e($key->TieuDe); ?> </a> </h4>
                 <a href="theloai/<?php echo e($value->TenKhongDau); ?>"><b class="belite"><?php echo e($value->Ten); ?> </b></a>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>    
            <div class="tnews">
              <h5> ĐƯỢC QUAN TÂM</h5>
              <?php $__currentLoopData = $theloai->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php 
                $data =  $value->tintucFunction->where('NoiBat', 2)->sortBy('created_at')->take(1);
              ?>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="more-newst">
                <a href="<?php echo e($key->TieuDeKhongDau); ?>"> <img src="<?php echo e(asset($key->Hinh)); ?>" width="230" height="150"></a>
                 <h4><a href="<?php echo e($key->TieuDeKhongDau); ?>"><?php echo e($key->TieuDe); ?> </a> </h4>
                 <a href="theloai/<?php echo e($value->TenKhongDau); ?>"><b class="belite"><?php echo e($value->Ten); ?> </b></a>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>    
        </div>
     
    <div class="right-box-secenter">
      <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if(count($value->loaitinFunction) > 0): ?>
      <div class="table-title">
        <a href="theloai/<?php echo e($value->TenKhongDau); ?>"> <h5> <?php echo e($value->Ten); ?></h5></a>
            <ul class="list-table">
              <?php $ListCategory = $value->loaitinFunction->take(3);?>
              <?php $__currentLoopData = $ListCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li> <a href="loaitin/<?php echo e($key->TenKhongDau); ?>"><?php echo e($key->Ten); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php 
              $data =  $value->tintucFunction->sortByDesc('created_at')->take(4);
              $tin1 = $data->shift();// return for you with type array
             ?>
            </ul>
            <a href="<?php echo e($tin1['TieuDeKhongDau']); ?>"> <img src="<?php echo e($tin1['Hinh']); ?>" width="250" height="170"> </a>
            <a href="<?php echo e($tin1['TieuDeKhongDau']); ?>"> <b> <?php echo e($tin1['TieuDe']); ?></b></a> <br/>
          <a href="<?php echo e($tin1['TieuDeKhongDau']); ?>">  <span>(Dân trí) - <?php echo e($tin1['TomTat']); ?></span> </a>
          <ul class="more-link-news"> 
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li> <a href="<?php echo e($news['TieuDeKhongDau']); ?>"> <?php echo e($news['TieuDe']); ?></a></li>
           
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
      <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/post/index.blade.php ENDPATH**/ ?>