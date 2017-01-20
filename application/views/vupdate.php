<!DOCTYPE html>
<html>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
       Update Product Information
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

          <label>ISBN:</label>
          <input type="text" name="ISBN">
          <input type="button" name="searchp" class="btn btn-primary" value="search" id="searchP">
        </form>
          <div id="updateres" style="display:none;">
                        <div class="box-header with-border">
              <h3 class="box-title">Product Information</h3>
            </div>
             <form method="post">
    <label>Product Name : </label>
        <div style="color:red;" id="pnm"></div>
        <input type="text" class="form-control"  name="productname" id="productname">
<label>ISBN :</label>
     <div style="color:red;" id="pisbn"></div>
      <input type="text" class="form-control"  name="isbn" id="isbn">
    <label>Price : </label>
     <div style="color:red;" id="pprice"></div>
     <input type="text" class="form-control"  name="price" id="price">
    <label>Quantity :</label> 
     <div style="color:red;"  id="qty"></div>
     <input type="text" class="form-control"  name="quantity" id="quantity">
    <label>Brand Name :</label>
     <div style="color:red;" id="brande"></div>
      <input type="text" class="form-control"  name="brand" id="brand">
      <div class="box-footer">
        <input type="button"  class="btn btn-default" name="update" id="updatep" value="Updat Product">
        <input type="submit" class="btn btn-default" value="Cancel">
      </div> 
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

$("#updateres").css("display","none");
$("#searchP").click(function(){
 
 var data=$('form').serialize();
$.ajax({
type:"post",
url:"<?php echo base_url().'index.php/home/updateproduct';?>",
data:data,
dataType: 'json',
success:function(data){

$("#productname").val(data[0].p_name);
$("#isbn").val(data[0].ISBN);
$("#price").val(data[0].price);
$("#quantity").val(data[0].quantity);
$("#brand").val(data[0].brand_name);
$("#updateres").css("display","block");

}
});
});

$("#updatep").click(function(){

 var data=$('form').serialize();

$.ajax({
type:"post",
url:"<?php echo base_url().'index.php/home/updateproductres';?>",
data:data,
dataType: 'json',
success:function(data){
$("#pnm").html('');
 $("#brande").html('');
 $("#pisbn").html('');
 $("#pprice").html('');
  $("#qty").html('');
if(data.BrandName!='')
{
   $("#brande").html(data.BrandName);
}
if(data.ProductName!='')
{
  $("#pnm").html(data.ProductName);
}
if(data.price!='')
{

  $("#pprice").html(data.price);
}
if(data.qty!='')
{

  $("#qty").html(data.qty);
}
if(data.isbn!='')
{
  $("#pisbn").html(data.isbn);
}
if(data.res==true)
{
  alert('Product Updated Successfully..!!');
}
}
});

});
});
</script>

