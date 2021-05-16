 <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->yieldContent('NoiDung'); ?>
    </div>
    </div>
     <script type = "text/javascript">
      function updateThumbnail(){
             $('#change_image').attr('src' , $('#thumbnail').val()) ;
       } 
    CKEDITOR.replace('content');
    </script>
    <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script> 
$(document).ready(function() {
 // $('option').on('click', function(){
    
  // alert("okokok");
 // });
$('#link').on('click', function(){
 
  $('#link').css('background','#e40707');
  $('#systemp').css('background','blue');
  $('.input-file').css('display','block');
  $('.all-file').css('display','none');
  $('.none').css('display','block');
});
$('#systemp').on('click', function(){
 
  $('#systemp').css('background','#e40707');
  $('#link').css('background','blue');
  $('.input-file').css('display','none');
  $('.all-file').css('display','block');
});

});
</script>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel5.8\resources\views/admin/layout/index.blade.php ENDPATH**/ ?>