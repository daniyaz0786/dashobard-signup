
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
  <script src="validate.js"></script>
  
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
                <form  action="<?php echo base_url()?>admin/signup/insertinto" method="post">
               
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo set_value('email') ?>" placeholder="Email">
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control " id="password"  value="<?php echo set_value('password') ?>" placeholder="Password">
                        <span>
                            <i  class=" fas fa-eye field_icon toggle-password" style="cursor: pointer"></i>
                        </span>
                        <?php echo form_error('password'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Conferm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="reepassword"  value="<?php echo set_value('reepassword') ?>" placeholder="Conferm Password">
                        <?php echo form_error('reepassword');?>
                    </div>
                    
                    <div class="form-check d-flex justify-content-center mb-5">
                        <input class="form-check-inputs me-2" type="checkbox" value="" id="form2Example3cg" />
                        <label class="form-check-label" for="form2Example3g">
                            I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                        </label>
                    </div>
                   <div class="d-flex justify-content-center">
                        <button type="submit"
                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="submit" id="submit"  type="submit">Sign Up</button>
                   </div>
                   <p class="text-center text-muted mt-2 mb-0">Have already an account? <a href="<?php echo base_url().'admin/login'?>"
                    class="fw-bold text-body"><u>Login here</u></a></p>
                   
                   
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
            <script>
                            (function() {
                            // Before using it we must add the parse and format functions
                            // Here is a sample implementation using moment.js
                            validate.extend(validate.validators.datetime, {
                                // The value is guaranteed not to be null or undefined but otherwise it
                                // could be anything.
                                parse: function(value, options) {
                                return +moment.utc(value);
                                },
                                // Input is a unix timestamp
                                format: function(value, options) {
                                var format = options.dateOnly ? "YYYY-MM-DD" : "YYYY-MM-DD hh:mm:ss";
                                return moment.utc(value).format(format);
                                }
                            });

                            // These are the constraints used to validate the form
                            var constraints = {
                                email: {
                                // Email is required
                                presence: true,
                                // and must be an email (duh)
                                email: true
                                },
                                password: {
                                // Password is also required
                                presence: true,
                                // And must be at least 5 characters long
                                length: {
                                    minimum: 5
                                }
                                },
                                "cpassword": {
                                // You need to confirm your password
                                presence: true,
                                // and it needs to be equal to the other password
                                equality: {
                                    attribute: "password",
                                    message: "^The passwords does not match"
                                }
                                },
                                username: {
                                // You need to pick a username too
                                presence: true,
                                // And it must be between 3 and 20 characters long
                                length: {
                                    minimum: 3,
                                    maximum: 20
                                },
                                format: {
                                    // We don't allow anything that a-z and 0-9
                                    pattern: "[a-z0-9]+",
                                    // but we don't care if the username is uppercase or lowercase
                                    flags: "i",
                                    message: "can only contain a-z and 0-9"
                                }
                                },
                                birthdate: {
                                // The user needs to give a birthday
                                presence: true,
                                // and must be born at least 18 years ago
                                date: {
                                    latest: moment().subtract(18, "years"),
                                    message: "^You must be at least 18 years old to use this service"
                                }
                                },
                                country: {
                                // You also need to input where you live
                                presence: true,
                                // And we restrict the countries supported to Sweden
                                inclusion: {
                                    within: ["SE"],
                                    // The ^ prevents the field name from being prepended to the error
                                    message: "^Sorry, this service is for Sweden only"
                                }
                                },
                                zip: {
                                // Zip is optional but if specified it must be a 5 digit long number
                                format: {
                                    pattern: "\\d{5}"
                                }
                                },
                                "number-of-children": {
                                presence: true,
                                // Number of children has to be an integer >= 0
                                numericality: {
                                    onlyInteger: true,
                                    greaterThanOrEqualTo: 0
                                }
                                }
                            };

                            // Hook up the form so we can prevent it from being posted
                            var form = document.querySelector("form#main");
                            form.addEventListener("submit", function(ev) {
                                ev.preventDefault();
                                handleFormSubmit(form);
                            });

                            // Hook up the inputs to validate on the fly
                            var inputs = document.querySelectorAll("input, textarea, select")
                            for (var i = 0; i < inputs.length; ++i) {
                                inputs.item(i).addEventListener("change", function(ev) {
                                var errors = validate(form, constraints) || {};
                                showErrorsForInput(this, errors[this.name])
                                });
                            }

                            function handleFormSubmit(form, input) {
                                // validate the form against the constraints
                                var errors = validate(form, constraints);
                                // then we update the form to reflect the results
                                showErrors(form, errors || {});
                                if (!errors) {
                                showSuccess();
                                }
                            }

                            // Updates the inputs with the validation errors
                            function showErrors(form, errors) {
                                // We loop through all the inputs and show the errors for that input
                                _.each(form.querySelectorAll("input[name], select[name]"), function(input) {
                                // Since the errors can be null if no errors were found we need to handle
                                // that
                                showErrorsForInput(input, errors && errors[input.name]);
                                });
                            }

                            // Shows the errors for a specific input
                            function showErrorsForInput(input, errors) {
                                // This is the root of the input
                                var formGroup = closestParent(input.parentNode, "form-group")
                                // Find where the error messages will be insert into
                                , messages = formGroup.querySelector(".messages");
                                // First we remove any old messages and resets the classes
                                resetFormGroup(formGroup);
                                // If we have errors
                                if (errors) {
                                // we first mark the group has having errors
                                formGroup.classList.add("has-error");
                                // then we append all the errors
                                _.each(errors, function(error) {
                                    addError(messages, error);
                                });
                                } else {
                                // otherwise we simply mark it as success
                                formGroup.classList.add("has-success");
                                }
                            }

                            // Recusively finds the closest parent that has the specified class
                            function closestParent(child, className) {
                                if (!child || child == document) {
                                return null;
                                }
                                if (child.classList.contains(className)) {
                                return child;
                                } else {
                                return closestParent(child.parentNode, className);
                                }
                            }

                            function resetFormGroup(formGroup) {
                                // Remove the success and error classes
                                formGroup.classList.remove("has-error");
                                formGroup.classList.remove("has-success");
                                // and remove any old messages
                                _.each(formGroup.querySelectorAll(".help-block.error"), function(el) {
                                el.parentNode.removeChild(el);
                                });
                            }

                            // Adds the specified error with the following markup
                            // <p class="help-block error">[message]</p>
                            function addError(messages, error) {
                                var block = document.createElement("p");
                                block.classList.add("help-block");
                                block.classList.add("error");
                                block.innerText = error;
                                messages.appendChild(block);
                            }

                            function showSuccess() {
                                // We made it \:D/
                                alert("Success!");
                            }
                            })();
            </script>
           

 <script src="<?php echo base_url()?>asset1/main1/js1/jQuery1.js"></script>
  <script src="<?php echo base_url()?>asset1/main1/js1/bootstrap.min1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




   <!-- <script src="https://use.fontawesome.com/1744f3f671.js"></script>  -->
  <!-- <script src="js/app.js" type="text/javascript" charset="utf-8" async defer></script> -->
</body>


</html> 



    

