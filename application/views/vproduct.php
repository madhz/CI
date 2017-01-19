<!DOCTYPE html>

<html>
<head>
 
</head>

<body>
  <h2 align="center">INSERT PRODUCT INFORMATTION</h2>
  <div style="text-align: center;">
     <a href="<?php echo base_url().'index.php/home/index'; ?>"><input type="button" value="Insert Product"></a> |
    <a href="<?php echo base_url().'index.php/home/updateP'; ?>"><input type="button" value="Update Product"></a> |
        <a href="<?php echo base_url().'index.php/home/deletP'; ?>"><input type="button" value="Delete Product"></a> |
        <a  href="<?php echo base_url().'index.php/home/showP'; ?>"><input type="button" value="Show Product"></a>
        <form method="post" action="<?php echo base_url().'index.php/home/addPrdouct'; ?>">
          <div style="color:green;"><?php  echo $success; ?></div>
          <div style="color:red;"> <?php  echo $error; ?> </div>
    <p>Product Name : </p>
        <div style="color:red;"><?php echo form_error('productname'); ?></div>
        <input type="text" name="productname" id="productname">

    <p>ISBN :</p>
     <div style="color:red;"><?php echo form_error('ISBN'); ?></div>
      <input type="text" name="ISBN" id="ISBN">
    <p>Price : </p>
     <div style="color:red;"><?php echo form_error('price'); ?></div>
     <input type="text" name="price" id="price">
    <p>Quantity :</p> 
     <div style="color:red;"><?php echo form_error('quantity'); ?></div><input type="text" name="quantity" id="quantity">
    <P>Brand Name :</p>
     <div style="color:red;"><?php echo form_error('brand'); ?></div>
      <input type="text" name="brand" id="brand">
      <p>
        <input type="submit" value="Add Product">
        <input type="submit" value="Cancel">
      </p>
      <form>
  </div>

</body>
</html>

