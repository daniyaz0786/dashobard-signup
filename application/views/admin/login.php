
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
</head>

<body>
  <div class="navbar navbar-light bg-dark">
    <div class="container ">
      <a  style="color:white" href="#" class="navbar-barand">Signup</a>
    </div>
</div>


  
<div class="container mt-5">
    
    <div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6 ">
            <div class="box">
           
                 <img class="img-fluid boximg" src="<?php echo base_url()?>asset1/images/img.webp" style="border-top-left-radius: 0.3rem !important; border-top-right-radius: 0.3rem !important;">
                 
                 
                <form action="<?php echo base_url()?>admin/login/loginme" method="post">

                


                <?php
              $this->load->helper('form');
              $error = $this->session->flashdata('error');
              if($error)
              {
            ?>
            <div class="alert alert-danger alert-dismissable" id="error">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?php echo $this->session->flashdata('error'); ?>                    
            </div>
            <?php } ?>
            <?php  
              $success = $this->session->flashdata('success');
              if($success)
              {
            ?>
            <div class="alert alert-success alert-dismissable" id="success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
                <?php } ?>
               
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" name="email" required class="form-control" id="email" value="<?php echo set_value('email') ?>" placeholder="Email">
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" required name="password" class="form-control " id="password"  value="<?php echo set_value('password') ?>" placeholder="Password">
                        <span>
                            <i  class=" fas fa-eye field_icon toggle-password" style="cursor: pointer"></i>
                        </span>
                        <?php echo form_error('password'); ?>
                    </div>
                    
                   <div class="d-flex justify-content-center">
                        <button type="submit"
                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="submit" id="submit">Login</button>
                   </div>
                   <p class="text-center text-muted mt-2 mb-0">Have not account? <a href="<?php echo base_url().'admin/signup'?>"
                    class="fw-bold text-body"><u>Sign Up here</u></a></p>
                    
                   
                </form>
                
                
            </div>
           
    </div>
    <div class="col-md-3"></div>
</div>


<script>
    $("body").on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#password");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

            });
            
</script>
        
 <script src="<?php echo base_url()?>asset1/main1/js1/jQuery1.js"></script>
  <script src="<?php echo base_url()?>asset1/main1/js1/bootstrap.min1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




   <!-- <script src="https://use.fontawesome.com/1744f3f671.js"></script>  -->
  <!-- <script src="js/app.js" type="text/javascript" charset="utf-8" async defer></script> -->
</body>


</html> 



    

