<div class="container">
  <div class="row">
    <div class="col-md-3">
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
      <div class="userpic mt-3">
        <img src="<?php echo base_url();?>asset1/main2/img/default.jpg" class="img-thumbnail"  width="300px" height="300px" alt="Flowers in Chania ">
      </div>
        <a  href="#" class="btn btn-success btn-block mt-2" data-toggle="modal" data-target="#exampleModal" > Upload Image</a>
     
          <form method="post"  name="createuser" action=" <?php echo  base_url();?>admin/profile/upload" enctype="multipart/form-data">
          

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    

                    <label for="myfile">Select files:</label>
                    <input type="file" id="myfile" name="image" value="<?php echo set_value('image'); ?>">
                    <?php echo $error; ?>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit"  name="submit" id="submit"class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
                                                          
          </form>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-7">
      <div class="userprofile mt-4">
        <table class="table table-bordered">
          <tr>
            <td><strong> Full Nmae</strong></td>
          </tr>
          <tr>
            <td><strong> Bio</strong></td>
          </tr>
          <tr>
            <td><strong> Mobile Number</strong></td>
          </tr>
          <tr>
            <td><strong>Address </strong></td>
          </tr>
          <tr>
            <td><strong>Created At</strong></td>
          </tr>
        </table>
        <div class="form-group">
        
         <a href="<?php echo base_url().'admin/user/index'?>" class="btn btn-danger">Edit Profile</a>
                              
        </div>
      </div>
    </div>
  </div>
</div>

    
                   
                        
                       
                        
                          
                    
                
              
                 
                

                <script type="">
                  setTimeout(function(){ $('#error').hide();},3000);
                  setTimeout(function(){ $('#success').hide();},3000);
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="<?php echo base_url()?>asset1/main2/vendor/jquery/jquery.min.js"></script>
                    <script src="<?php echo base_url()?>asset1/main2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="<?php echo base_url()?>asset1/main2/vendor/jquery-easing/jquery.easing.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="<?php echo base_url()?>asset1/main2/js/sb-admin-2.min.js"></script>

                    <!-- Page level plugins -->
                    <script src="<?php echo base_url()?>asset1/main2/vendor/chart.js/Chart.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="<?php echo base_url()?>asset1/main2/js/demo/chart-area-demo.js"></script>
                    <script src="<?php echo base_url()?>asset1/main2/js/demo/chart-pie-demo.js"></script>

</body>

</html>