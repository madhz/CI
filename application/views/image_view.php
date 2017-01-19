

<html>
<head>
<title>CodeIgniter Create New Helper</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">
<div id="content">
<h3 id="form_head">CodeIgniter Create New Helper</h3>
<div id="form_input">
<?php

//create form open tag
echo form_open(base_url('index.php/image_controller/image_to_data'));

//create label
echo form_label('Enter image URL');

//create data input field
$data = array(
'name' => 'img_name',
'class' => 'input_box',
'placeholder' => "Please Enter Image URL",
'required' => 'required'
);
echo form_input($data);
?>
</div>
<div id="form_button">
<?php echo form_submit('submit', 'Submit', "class='submit'"); ?>
</div>
<?php
//Form close.
echo form_close(); ?>
</div>

<!-- Result div display -->
<?php if(isset($data_image)) { ?>
<div class="encode_img">
<div class="result_head"><h3>Image</h3></div>
<div class="data">
<img src="<?php echo $data_image; ?>">

</div>
</div>
<div class="real_image">
<div class="result_head"><h3>Image URL in base 64 encode form</h3></div>
<div class="data">
<?php echo $data_image; ?>
</div>
</div>
<?php } ?>
</div>
</body>
</html>

