<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Application Create User</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset1/main1/css1/style1.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
   <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></scr ipt>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
</head>

<body>
  <div class="navbar navbar-light bg-dark">
    <div class="container">
      <a  style="color:white" href="#" class="navbar-barand">CRUD APPLICATION</a>
    </div>
  </div>
  
  <div class="container" style="padding-top:10px">
    <h4> Create User<h3>
    <hr>
    <form method="post" name="createuser" action="<?php echo base_url();?>admin/user/update" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="craeteform">Name</label>
            <input type="text" name="name" value = "<?php echo set_value('name' , $stform['name'])?>"  class="form-control">
            <?php echo form_error('name'); ?>
           
          </div>
          <div class="form-group">
            <label class="craeteform">Email</label>
            <input type="text" name="email" value="<?php echo set_value('name' , $stform['email'])?>"   class="form-control">
            <?php echo form_error('email'); ?>
            
          </div>
          <div class="form-group">
            <label class="craeteform">Phone</label>
            <input type="number" name="phone" value="<?php echo set_value('name' , $stform['phone'])?>"  class="form-control">
            <?php echo form_error('phone'); ?>
            
          </div>
          <div class="form-group">
            <label class="craeteform">Address</label>
            <input type="text" name="address" value="<?php echo set_value('name' , $stform['address'])?>"   class="form-control">
            <?php echo form_error('address'); ?>
           
          </div>
          <div class="custom-file">
              <label for="myfile">Select files:</label>
              <input type="hidden"  id="myfile" name="old_image" value="<?php echo $stform['image']?>">
              <input type="file" id="myfile" name="image" multiple>
             
            
              <?php echo form_error('image'); ?>
          </div>
          
          <div class="form-group">
           <button class="btn btn-primary" name="submit"  id="submit" type="submit">Update</button>
           <a href="<?php echo base_url().'admin/user/index'?>" class="btn btn-danger">Cancel</a>
           <input type="text" name="st_id" value="<?php echo $stform['st_id'];?>"   class="form-control">
          </div>
        </div>
        <div class="col-md-6">
           <img src="<?php echo base_url('uploads/images/'. $stform['image']);?>"/>
        </div>
      </div>
      
    </form>

      
  </div>

 
  <script src="<?php echo base_url()?>asset1/main1/js1/jQuery1.js"></script>
  <script src="<?php echo base_url()?>asset1/main1/js1/bootstrap.min1.js"></script>
 
 
 </body>

</html> 