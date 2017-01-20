<!DOCTYPE html>
<html>
<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
       Insert Product Information
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Insert Product</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Product Information</h3>
            </div>
            <div class="box-body">

                <div class="form-group">
                  <form method="post" action="<?php echo base_url().'index.php/home/addPrdouct'; ?>">
          <div style="color:green;"><?php  echo $success; ?></div>
          <div style="color:red;"> <?php  echo $error; ?> </div>
    <label>Product Name : </label>
        <div style="color:red;"><?php echo form_error('productname'); ?></div>
        <input type="text" class="form-control"   name="productname" id="productname">

    <label>ISBN :</label>
     <div style="color:red;"><?php echo form_error('ISBN'); ?></div>
      <input type="text" class="form-control"  name="ISBN" id="ISBN">
    <label>Price : </label>
     <div style="color:red;"><?php echo form_error('price'); ?></div>
     <input type="text" class="form-control"  name="price" id="price">
    <label>Quantity :</label> 
     <div style="color:red;"><?php echo form_error('quantity'); ?></div>
     <input type="text" class="form-control"  name="quantity" id="quantity">
    <label>Brand Name :</label>
     <div style="color:red;"><?php echo form_error('brand'); ?></div>
      <input type="text" class="form-control"  name="brand" id="brand">
      <br>
      <p>
        <input type="submit" class="btn btn-default" value="Add Product">
        <input type="submit" class="btn btn-default" value="Cancel">
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
