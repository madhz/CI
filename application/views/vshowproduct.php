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
<a href="#"><input type="button" value="Show Product" action="<?php echo base_url().'index.php/home/showProduct'; ?>"></a>
<br><br>
 <input type="text" name="productsearch" id="productsearch" placeholder="Serach by product Name" style="float:right;">
 <br></br>
 <table border="1" align="center">

  <tr>
    <th>
      NO.
    </th>
    <th>
      Product Name
    </th>
    <th>
      ISBN
    </th>
    <th>
      Price
    </th>
    <th>
      Quantity
    </th>
    <th>
     Brand Name
    </th>
    <th>Action</th>
  </tr>
<?php
$i=1;
foreach ($result as $res) {
?>
<tr>

  <td><?php echo $i++; ?></td>
  <td><?php echo $res->p_name; ?></td>
  <td><?php echo $res->ISBN; ?></td>
  <td><?php echo $res->price; ?></td>
  <td><?php echo $res->quantity; ?></td>
  <td><?php echo $res->brand_name; ?></td>
  <td>
    <a href="<?php echo base_url().'index.php/home/updatePselect?id='.$res->id; ?>">
        <input type="button" value="Update">
    </a>
        <input type="button" value="Delete" class="del" id="<?php echo $res->id; ?>">
  </td>
<?php } ?>
</tr>

</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
  $('.del').click(function(e) {
   var pid = this.id; // button ID 
   var answer=confirm('Do you want to delete?');
    if(answer){

var data='id='+pid;
e.preventDefault();
$.ajax({
type:"post",
url:"<?php echo base_url().'index.php/home/deletePselect';?>",
data:data,
dataType: 'json',
success:function(data)
{

  if(data.res==1)
  {
    
   alert('Product deleted Successfully..!!');
   $('#'+pid).closest('tr').css('background-color','pink');
    $('#'+pid).closest('tr').fadeOut(2000);


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
  ("#productsearch").keyup(function(){
  
    alert('sdjfk');
  });
})
</script>
