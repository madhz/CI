<!DOCTYPE html>

<html>
<head>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
 <div style="text-align: center;">
    <form method="post">
    <p>Product Name : </p>
     <div style="color:red;" id="pnm"></div>
     <input type="text" name="productname" id="productname" value="<?php echo $res[0]->p_name; ?>">
<p>ISBN :</p>
     <div style="color:red;" id="pisbn"></div>
      <input type="text" name="isbn" id="isbn"  value="<?php echo $res[0]->ISBN; ?>">
    <p>Price : </p>
     <div style="color:red;" id="pprice"></div>
     <input type="text" name="price" id="price"  value="<?php echo $res[0]->price; ?>">
    <p>Quantity :</p> 
     <div style="color:red;" id="qty"></div>
     <input type="text" name="quantity" id="quantity"  value="<?php echo $res[0]->quantity; ?>">
    <P>Brand Name :</p>
     <div style="color:red;" id="brande"></div>
      <input type="text" name="brand" id="brand"  value="<?php echo $res[0]->brand_name; ?>">
      <p>
        <input type="button" name="update" id="updatep" value="Updat Product">
        <input type="submit" value="Cancel">
      </p> 
      </form>
 
  </div>

</body>
</html>
<script>
$(document).ready(function(){
$("#updatep").click(function(){

 var data=$('form').serialize();

$.ajax({
type:"post",
url:"<?php echo base_url().'index.php/admin/home/updateproductres';?>",
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

  </script>

