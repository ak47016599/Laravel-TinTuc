

<?php echo $__env->make('post.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .no-box-shadow {
    box-shadow: none
}
.font-weight-bold {
    font-size: 18px !important;
}
.no-box-shadow:focus {
    box-shadow: none
}

.day {
    font-size: 14px
}

.heart {
    border: 1px soild green !important;
    border-color: green !important;
    border-radius: 22px
}

.heart-icon {
    color: green
}

.comment-text {
    font-size: 15px
}

.delete {
    font-size: 13px;
    cursor: pointer
}
</style>
<?php
  if(session()->has('login_user')){
      $id_user = session('login_user')->id;
  } else {
    $id_user = 0;
  }
?>
<script>
 $(document).ready(function() {

    $('#myForm').submit(function(){
       var comment = $("input[name='content']").val();
       // console.log(hh);
     if(comment == ''){
         $('#error-comment').text('* Nội dung không được để trống');
         return(false);
     } else {
        $('#error-comment').text('');
     }
       $.get("ajax/comment/<?php echo e($data[0]['id']); ?>/<?php echo e($id_user); ?>/" + comment,function(data){

$("#result").html(data);

});

    });

    $('button').click(function(){
        $('#myForm').submit();
    })
    }) ;
    </script>
    <div class="content-news">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Tin Tức</a></li>

        <li class="breadcrumb-item color-active active"><?php echo e($data[0]['TieuDe']); ?></li>
      </ul>

    </div>
    <div class="container change-width">
    <div class="today-date">
      <span> <?php  echo date("Y/m/d");?> - <?=date("h:i:sa")?></span>
   </div>
  <div style="clear:both"></div>
  <div style=" width : 120px;
  position: fixed;

  line-height: 40px;" class="content-contact">
    <i class="material-icons" style="font-size:48px;color:rgb(0, 150, 80)">forum</i> <br/>
    <i class="material-icons" style="font-size:48px;color:rgb(150, 148, 148)">print</i> <br/>
    <i class="fa fa-facebook-official" style="font-size:48px;color:blue"></i>
  </div>
  <b class="title-news-content"><?php echo e($data[0]["TieuDe"]); ?></b>
  <div style=" margin-bottom: 20px !important;" style="clear:both"></div>
  <p class="background-dantri">Dân trí</p><span class="confix-text"> <?php echo e($data[0]["TomTat"]); ?></span>
  <div class="more-content-flex">
     <!-- Chỗ này đổ nội dung tin ra đây nhé ahihi-->
    <?php

    echo $data[0]["NoiDung"];
    ?>

        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <?php if(session()->has('login_user')): ?>
                <form onsubmit="return false" id="myForm"  onsubmit="return validateForm()>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="d-flex flex-row align-items-center add-comment p-2 bg-white rounded"><img class="rounded-circle" src="<?php echo e(asset("imgUser/".session('login_user')->image)); ?>" height="40" width="40"><input type="text" name="content" class="form-control border-0 no-box-shadow ml-1" placeholder="Nhập bình luận của bạn ..."> <button id="submit" type="button" class="btn btn-danger">Gửi</button></div>
                <span id="error-comment" style="color:red"></span>
            </form>
                <?php endif; ?>
                <div id="result">
                <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $nameUser = $cm->userFunction->name;
                  $image = $cm->userFunction->image;
                ?>
                <div  class="p-3 bg-white mt-2 rounded">
                    <div  class="d-flex justify-content-between">
                        <div class="d-flex flex-row user"><img class="rounded-circle img-fluid img-responsive" src="<?php echo e(asset("imgUser/".$image)); ?>" width="55">
                            <div class="d-flex flex-column ml-2"><span class="font-weight-bold"><?php echo e($nameUser); ?></span><span class="day"><?php echo e($cm->created_at); ?></span></div>
                        </div>

                    </div>
                    <div class="comment-text text-justify mt-2">
                        <p><?php echo e($cm->NoiDung); ?></p>
                    </div>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php echo $comment->links(); ?>

                <?php if(!session()->has('login_user')): ?>
                <div class="p-3 bg-white mt-2 rounded text-center">
                 <a href="<?php echo e(asset("dangnhap")); ?>" > <h5>Đăng nhập ngay để bình luận</h5><button class="btn btn-success btn-sm px-3" type="button">Đăng nhập</button></a>
                </div>
                <?php endif; ?>
            </div>
        </div>

  </div>
  <b class="news-diffrent"> Tin liên quan</b>
  <ul class="list-more-diferent">

 <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <?php $__currentLoopData = $value->tintuc->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <a href="<?php echo e($tt->TieuDeKhongDau); ?>"> <li> <?php echo e($tt->TieuDe); ?></li></a>

   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  <div class="title-listen"> </div>
  <b style="color : blue;margin : 12px 0px 40px 0px"> ĐÁNG QUAN TÂM</b>
  <?php $__currentLoopData = $status[0]->loaitinFunction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $lt->tintuc->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="content-news">


        <a href="<?php echo e($tt->TieuDeKhongDau); ?>">  <img style="float:left" src="<?php echo e(asset($tt->Hinh)); ?>" height="150" width="220"></a>

        <div style="width : 280px" class="text">
         <a href="<?php echo e($tt->TieuDeKhongDau); ?>"> <b class="press-text"><?php echo e($tt->TieuDe); ?></b></a> <br/>
          <span > <a class="span-news" href="<?php echo e($tt->TieuDeKhongDau); ?>">(Dân trí) - <?php echo e($tt->TomTat); ?>

          </a></span> <br/>
           <span>  <?php echo e($tt->created_at); ?></span>
        </div>
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
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/post/content.blade.php ENDPATH**/ ?>