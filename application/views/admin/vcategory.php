<!DOCTYPE html>
<html>
<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
       Insert Category Information
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Insert Category</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Category Information</h3>
            </div>
            <div class="box-body">

                <div class="form-group">
                  <form method="post" action="<?php echo base_url().'index.php/admin/home/addCategory'; ?>" enctype="multipart/form-data">
          <div style="color:green;"><?php  echo $success; ?></div>
          <div style="color:red;"> <?php  echo $error; ?> </div>
    <label>Category Name : </label>
        <div style="color:red;"><?php echo form_error('categoryname'); ?></div>
        <input type="text" class="form-control"   name="categoryname" id="categoryname">

    <label>Discription :</label>
     <div style="color:red;"><?php echo form_error('desc'); ?></div>
      <input type="text" class="form-control"  name="desc" id="desc">
       <label>Image :</label>
     <div style="color:red;"><?php echo form_error('img'); ?></div>

   <div class="fileUpload btn btn-primary">
    <span>Upload</span>
<input type="file" class="upload" name="img" id="img" />

</div>
<label for="file"></label><br />

         <img name="imgd" id="imgd">
      <br>
      <p>
        <input type="submit" class="btn btn-default" value="Add Category">
        <input type="button" class="btn btn-default" value="Cancel" value="Cancel" onClick="window.location='<?php echo base_url().'index.php/admin/home/callInsertCategory'; ?>'" >
      </p>
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
<script type="text/javascript">

    $(document).ready(function(){

        $('input[type="file"]').change(function(e){
  $("[for=file]").html(this.files[0].name);
  $("#imgd").attr("src", URL.createObjectURL(this.files[0]));
  $("#imgd").css({"width":"50%","height":"50%"});
            // var fileName = e.target.files[0].name;
            // var path=$('#img').val(); 
            // $("#imgnm").val(fileName);
            // alert("<?php echo base_url().'userimg/'; ?>"+fileName);
            //  alert(URL.createObjectURL(e.target.files[0]));
            // $("#imgd").attr("src",e.target.result);
        });

    });

</script>
