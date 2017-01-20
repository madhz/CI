<!DOCTYPE html>
<html>

<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
       Delete Product Information
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Update Product</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info" style="float:">

            <div class="box-body">

                <div class="form-group">
        <form method="post">
          <div style="color:green;"><?php  echo $success; ?></div>
          <div style="color:red;"> <?php  echo $error; ?> </div>
          <h4>Delete Product</h4>
          <label>ISBN:</label>
          <input type="text"   class="form-control"   name="isbnd"><br>
          <input type="button" class="btn btn-default" name="deleteP" value="Delete" id="deleteP">
        </form>
          
                </div>
        </div>
          <div class="box box-warning">

     </div>
        </div>

      </div>

    </section>
  </div>
  <?php require_once('footer.php'); ?>
</body>
</html>
<script>
$(document).ready(function(){

  $("#deleteP").click(function(e){

    var answer=confirm('Do you want to delete?');
    if(answer){
     var data=$("form").serialize();

 e.preventDefault();
$.ajax({
type:"post",
url:"<?php echo base_url().'index.php/home/deleteres';?>",
data:data,
dataType: 'json',
success:function(data)
{

  if(data.res==1)
  {
    
   alert('Product deleted Successfully..!!');
  }
  else
  {
    alert('Product of this ISBN not present in database....!!!');
  }
}
});

    }
    else
    {
        alert('Not Deleted');      
    }
  });
});
</script>

