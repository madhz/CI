
<!DOCTYPE html>
<html>
 <link rel="stylesheet" href="<?php echo base_url().'public/selectlist/css/bootstrap/bootstrap.min.css';?>">
        <script src="<?php echo base_url().'public/selectlist/js/vendor/modernizr-2.8.3.min.js';?>"></script>
<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
       Insert Product Information
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Insert Product</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Product Information</h3>
            </div>
            <div class="box-body">

          <div class="form-group">
          <form method="post" action="<?php echo base_url().'index.php/admin/home/addPrdouct'; ?>">
          <div style="color:green;"><?php  echo $success; ?></div>
          <div style="color:red;"> <?php  echo $error; ?> </div>
           <label>Category Name : </label>
          <!-- <div class="col-sm-4"> -->
                                <div id="select2" class="selectpicker" data-clear="true" data-autoclose="false" data-live="true" data-filter="select3" data-fmethod="recursive">
                                    <a href="#" class="clear"><span class="fa fa-times"></span><span class="sr-only">Cancel the selection</span></a>
                                    <button data-id="prov" type="button" class="btn btn-lg btn-block btn-default dropdown-toggle">
                                        <span class="placeholder">Choose an option</span>
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="live-filtering" data-clear="true" data-autocomplete="true" data-keys="true">
                                            <label class="sr-only" for="input-bts-ex-5">Search in the list</label>
                                            <div class="search-box">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="search-icon7">
                                                        <span class="fa fa-search"></span>
                                                        <a href="#" class="fa fa-times hide filter-clear"><span class="sr-only">Clear filter</span></a>
                                                    </span>
                                                    <input type="text" placeholder="Search in the list" id="input-select2" class="form-control live-search" aria-describedby="search-icon7" tabindex="1" />
                                                </div>
                                            </div>
                                            <div class="list-to-filter">
                                                <ul class="list-unstyled">
                                                    <li class="optgroup">
                                                        <span class="optgroup-header">List Group <span class="subtext"></span></span>
                                                        <ul class="list-unstyled">
                                                        <?php foreach ($category_table->result_array() as $entry)
                                                        {?>
                                                        <?php ?>
                                                            <li class="filter-item items" data-filter="<?php echo $entry['cat_name']; ?>" data-select1="<?php echo $entry['cat_id']; ?>" data-value="<?php echo $entry['cat_id']; ?>"><?php echo $entry['cat_name']; ?></li>
                                                        <?php }?>
                                                           

                                                        </ul>
                                                    </li>
                                                </ul>
                                                <div class="no-search-results">
                                                    <div class="alert alert-warning" role="alert"><i class="fa fa-warning margin-right-sm"></i>No entry for <strong>'<span></span>'</strong> was found.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" name="catlist" id="catlist" value="">
                                </div>
                            <!-- </div> -->
    <label>Product Name : </label>
        <div style="color:red;"><?php echo form_error('productname'); ?></div>
        <input type="text" class="form-control"   name="productname" id="productname">

    <label>ISBN :</label>
     <div style="color:red;"><?php echo form_error('ISBN'); ?></div>
      <input type="text" class="form-control"  name="ISBN" id="ISBN">
    <label>Price : </label>
     <div style="color:red;"><?php echo form_error('price'); ?></div>
     <input type="text" class="form-control"  name="price" id="price">
    <label>Quantity :</label> 
     <div style="color:red;"><?php echo form_error('quantity'); ?></div>
     <input type="text" class="form-control"  name="quantity" id="quantity">
    <label>Brand Name :</label>
     <div style="color:red;"><?php echo form_error('brand'); ?></div>
      <input type="text" class="form-control"  name="brand" id="brand">
      <br>
      <p>
        <input type="submit" id="sub" class="btn btn-default" value="Add Product">
        <input type="submit" class="btn btn-default" value="Cancel">
      </p>
      </form>
                </div>
        </div>
          <div class="box box-warning">

     </div>
        </div>

      </div>

    </section>
  </div>
  <?php require_once('footer.php'); ?>
     <script src="<?php echo base_url().'public/selectlist/js/vendor/jquery-2.1.4.min.js';?>"></script>
        <script src="<?php echo base_url().'public/selectlist/js/vendor/bootstrap.min.js';?>"></script>
        <script src="<?php echo base_url().'public/selectlist/js/vendor/tabcomplete.min.js';?>"></script>
        <script src="<?php echo base_url().'public/selectlist/js/vendor/livefilter.min.js';?>"></script>
        <script src="<?php echo base_url().'public/selectlist/js/vendor/src/bootstrap-select.js';?>"></script>
        <script src="<?php echo base_url().'public/selectlist/js/vendor/filterlist.min.js';?>"></script>
        <script src="<?php echo base_url().'public/selectlist/js/plugins.js';?>"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <script>
        $(document).ready(function(){
        $(".list-unstyled li").click(function() {
          $("#catlist").val($("ul").find(".selected").data("value"));
            // alert("The selected Value is " + $("ul").find(".selected").data("value"));
          })
         // $("#sub").click(function() {
         //  alert($('form').serialize());
         // });
        })
        </script>
</body>
</html>
