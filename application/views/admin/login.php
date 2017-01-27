<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="<?php echo base_url().'public/css/style.css';?>">

  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
    <?php  	
    if($error!='')
	{
	?>
	
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab  active"><a href="#login">Log In</a></li>
    <?php
    }
    else
    {
	?>
    	<li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
    <?php
    }

// $csrf = array(
//         'name' => $this->security->get_csrf_token_name(),
//         'hash' => $this->security->get_csrf_hash()
// );
?>

<!-- <input type="text" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /> -->

      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <!-- <form action="<?php echo base_url().'index.php/admin/home/add_user';?>" method="post"> -->
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="fname" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"  name="lname"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="pass"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          <!-- </form> -->

        </div>
        
        <div id="login">   
        	<div style="color:red;"><?php echo $error; ?></div>
          <h1>Welcome Back!</h1>
          
          <form name="loginf"  method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email" id="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="pass"id="pass"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <input type="button" class="button button-block" id="login1" value="Log In">
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="<?php echo base_url().'public/js/index.js'; ?>"></script>

<script>
$(document).ready(function(){

$("#login1").click(function(){

  var data=$('form').serialize();
  $.ajax({
type:"post",
url:"<?php echo base_url().'index.php/admin/home/login';?>",
data:data, 
 dataType: "json",
success:function(data){

alert('fnm--->'+data);
}
  });
});
});
</script>
</body>
</html>

