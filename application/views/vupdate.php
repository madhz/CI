<!DOCTYPE html>

<html>
<head>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
  <h2 align="center">INSERT PRODUCT INFORMATTION</h2>
  <div style="text-align: center;">
     <a href="<?php echo base_url().'index.php/home/index'; ?>"><input type="button" value="Insert Product"></a> |
    <a href="<?php echo base_url().'index.php/home/updateP'; ?>"><input type="button" value="Update Product"></a> |
       <a href="<?php echo base_url().'index.php/home/deletP'; ?>"><input type="button" value="Delete Product"></a> |
        <a  href="<?php echo base_url().'index.php/home/showP'; ?>"><input type="button" value="Show Product"></a>
      <form method="post">
          <div style="color:green;"><?php  echo $success; ?></div>
          <div style="color:red;"> <?php  echo $error; ?> </div>

          <p>ISBN:</p>
          <input type="text" name="ISBN">
          <input type="button" name="searchp" value="search" id="searchP">
        </form>
          <div id="updateres" style="display:none;">
             <form method="post">
    <p>Product Name : </p>
        <div style="color:red;" id="pnm"></div>
        <input type="text" name="productname" id="productname">
<p>ISBN :</p>
     <div style="color:red;" id="pisbn"></div>
      <input type="text" name="isbn" id="isbn">
    <p>Price : </p>
     <div style="color:red;" id="pprice"></div>
     <input type="text" name="price" id="price">
    <p>Quantity :</p> 
     <div style="color:red;" id="qty"></div><input type="text" name="quantity" id="quantity">
    <P>Brand Name :</p>
     <div style="color:red;" id="brande"></div>
      <input type="text" name="brand" id="brand">
      <p>
        <input type="button" name="update" id="updatep" value="Updat Product">
        <input type="submit" value="Cancel">
      </p> 
      </form>
    </div>
  </div>

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

