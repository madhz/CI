<!DOCTYPE html>
<html>

<?php require_once('header.php');
require_once('sidebar.php');?>
<div class="content-wrapper">
  <div id="PeopleTableContainer" style="width: auto"></div>

</div>

  <?php require_once('footer.php'); ?>
<script src="<?php echo base_url().'/scripts/jquery-1.6.4.min.js';?>" type="text/javascript"></script>
<script src="<?php echo base_url().'/scripts/jquery-ui-1.8.16.custom.min.js';?>" type="text/javascript"></script>
<script src="<?php echo base_url().'/scripts/jtable/jquery.jtable.js';?>" type="text/javascript"></script>

 <script type="text/javascript">

 // jQuery.noConflict();
  $(document).ready(function () {

  $('#PeopleTableContainer').jtable(<?php echo json_encode($jtablescript); ?>);

   //Load person list from server
   $('#PeopleTableContainer').jtable('load',{
    'Name':'Bottle',
   });
  });
 </script>
  </body>
</html>