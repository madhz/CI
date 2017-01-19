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
          <h4>Delete Product</h4>
          <p>ISBN:</p>
          <input type="text" name="isbnd">
          <input type="button" name="deleteP" value="Delete" id="deleteP">
        </form>
  </div>

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

