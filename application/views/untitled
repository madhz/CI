<!DOCTYPE html>
<html>
  <head>

    <link href="<?php echo base_url().'/scripts/jquery-ui-1.8.16.custom.css';?>" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url().'/scripts/jtable/themes/lightcolor/blue/jtable.css';?>" rel="stylesheet" type="text/css" />
 
 <script src="<?php echo base_url().'/scripts/jquery-1.6.4.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'/scripts/jquery-ui-1.8.16.custom.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'/scripts/jtable/jquery.jtable.js';?>" type="text/javascript"></script> 
  </head>
  <body>
 <div id="PeopleTableContainer" style="width: 600px;"></div>
 <pre style="background-color: #f5f5f5; border: 1px solid #ccc;"> 
<!-- <?= print_r($jtablescript) ?>  -->
 </pre>
 <script type="text/javascript">
  $(document).ready(function () {
      //Prepare jTable
   $('#PeopleTableContainer').jtable(<?php echo json_encode($jtablescript); ?>);

   //Load person list from server
   $('#PeopleTableContainer').jtable('load');
  });
 </script>
  </body>
</html>