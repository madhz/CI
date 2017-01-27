<?php echo 'cat---->'.$cat_name; ?>
<!DOCTYPE html>
<html>
<style>
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); 

?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
       Insert User Information
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Insert User</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">User Information</h3>
            </div>
            <div class="box-body">

                <div class="form-group">
                  <form method="post" action="<?php echo base_url().'index.php/admin/home/add_user'; ?>" enctype="multipart/form-data">
          <div style="color:green;"><?php  echo $success; ?></div>
          <div style="color:red;"> <?php  echo $error; ?> </div>
    <label>First Name : </label>
        <div style="color:red;"><?php echo form_error('fname'); ?></div>
        <input type="text" class="form-control"   name="fname" id="fname">

    <label>Last Name :</label>
     <div style="color:red;"><?php echo form_error('lname'); ?></div>
      <input type="text" class="form-control"  name="lname" id="lname">
    <label>Email : </label>
     <div style="color:red;"><?php echo form_error('email'); ?></div>
     <input type="text" class="form-control"  name="email" id="email">
    <label>Password :</label> 
     <div style="color:red;"><?php echo form_error('pass'); ?></div>
     <input type="text" class="form-control"  name="pass" id="pass">
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
        <input type="submit" class="btn btn-default" value="Add User">
        <input type="button" class="btn btn-default" value="Cancel" onClick="window.location='<?php echo base_url().'index.php/admin/home/adduser'; ?>'" >
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
