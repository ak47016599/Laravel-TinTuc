<?php $__env->startSection('NoiDung'); ?>
<?php
$valueSeacher = '';
 if(isset($seacher)){
   $valueSeacher = $seacher;
 }

?>
<style>
        .pagination a {
            text-decoration: none;
            text-transform: none; 
            font-size : 18px;
            color : black;
            position: relative;
            top : 5px;
        }
        .pagination li{
            float : left;
            text-decoration: none;
            text-transform: none; 
            background: white ;
            list-style: none; 
            border : 1px solid silver;
            width : 40px;
            height : 40px;
            text-align: center;
        }
        .active{
            background: blue !important;
            color : white;
        }
        .pagination {
          z-index : 999 !important;
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

<h1> Danh Sách Người Dùng </h1>
    <a href="them"> <button type="button" class="btn btn-success">Thêm Người Dùng</button> </a>
    <div class="search-product">
       <form method="POST" action="<?php echo e(route('seachTheLoai')); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
           <center><h5> Tìm Kiếm Người Dùng</h5></center>
         
           <input value="<?php echo e($valueSeacher); ?>" name="search_name" type="text" class="form-control" placeholder="Enter Your Key Search Name Category" id="name_searche">
            <div style="clear : both"></div>
            <span style="margin-left : 12px"></span><br/>
           <button type="submit" class="btn btn-dark">Tìm Kiếm</button>
           </form>
    </div>
          <?php if(isset($seacher)): ?>
              <h5 style="margin-left : 12px"> Kết quả tìm Kiếm '<?php echo e($seacher); ?>'</h5>
           
           <?php endif; ?>
           <h6 style="float: right;
           margin-right : 12px "> Có tất cả <i><?php echo e(count($users)); ?></i> Người Dùng trên <i><?php echo e(ceil(count($users)/4)); ?></i> trang</h6>
              <?php if(session('thongbao')): ?>
     <div style="background : greenyellow" class="alert-error">
                  <span> 
                        <?php echo e(session('thongbao')); ?>

                  </span>
             </div>
     <?php endif; ?>
  <table class="table table-bordered">
    <thead>
      <tr style="text-align : center">
      <th>ID</th>
        <th>Tên Người Dùng</th>
        <th>Email</th>
        <th>Lever</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
 <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr>
 <td> <?php echo e($value->id); ?></td>
 <td><?php echo e($value->name); ?></td>
 <td><?php echo e($value->email); ?></td>
 <td><?php if($value->lever == 1): ?> Admin <?php endif; ?> <?php if($value->lever == 0): ?> Người Dùng <?php endif; ?></td>
        <td> <center><a href="sua/<?php echo e($value->id); ?>"><button type="button" class="btn btn-warning">Sửa</button> </a> </center></td>
        <td> <center> <a href="xoa/<?php echo e($value->id); ?>"><button type="button" class="btn btn-danger">Xóa</button> </a> </center></td>
        </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <?php echo $users->links(); ?> 
    </tbody>

  </table>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/admin/user/users.blade.php ENDPATH**/ ?>