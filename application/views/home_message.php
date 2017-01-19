<?php

defined('BASEPATH') OR exit('No direct script access allowed');
echo 'firstname--->'.$fname;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<form method="post" action="<?php echo base_url("index.php/home/add_user"); ?>">
<?php echo anchor('/index.php/home/comments', 'Click Here');?>
 <?php //echo validation_errors(); ?> 
 <?php echo form_open('form'); ?>   
		<?php

	//	if($success!='')
	//	{
		?>
				<div><?php //echo $success ?></div>
		<?php//}else{?>
		<div><?php //echo $error ?></div>
<?php //} ?>
		<p>Enter First Name :</p>
		<?php echo form_error('fname'); ?>
		<p><input type="text" name="fname" id="fname" value="<?php echo set_value('fname'); ?>"></p>
				<p>Enter Last  Name :</p>
					<?php echo form_error('lname'); ?>
		<p><input type="text" name="lname" id="lname"></p>
						<p>Enter Email :</p>
							<?php echo form_error('email'); ?>
		<p><input type="text" name="email" id="email"></p>
				<p>Enter password :</p>
					<?php echo form_error('pass'); ?>
		<p><input type="password" name="pass" id="pass"></p>
		<p><input type="submit" name="submit" id="submit"></p>
	<?php	
	//$data = array(
	//         'name'          => 'username',
	//         'id'            => 'username',
	//         'value'         => 'johndoe',
	//         'maxlength'     => '100',
	//         'size'          => '50',
	//         'style'         => 'width:50%'
	// );

	// echo form_input($data);
?>
	</form>
</div>

</body>
</html>