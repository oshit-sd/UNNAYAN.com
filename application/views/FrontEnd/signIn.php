  <!-- CONTAIN START -->
  <div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" >
        
            <div class="row" style="margin-top: 10px;">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2"  style="border: 1px solid #e8e8e8; ">

                  <?php if($alert = $this->session->flashdata('message')): ?>
                       <script type="text/javascript">
                          swal({
                                text: "Successfully!!",
                                icon: "success",
                                buttons: false,
                                timer: 2500,
                              }); 

                          setTimeout( function() {
                                  window.location.href = "User-Dashboard";
                               },2520);
                        </script>
                  <?php endif; ?>

                    <?php if($alert = $this->session->flashdata('message2')): ?>
                        <script type="text/javascript">
                            swal({
                                  text: "Sorry!! Invalid Email or Password",
                                  icon: "error",
                                  buttons: false,
                                  timer: 1400,
                                });
                        </script>
                    <?php endif; ?>

                    <?php if($alert = $this->session->flashdata('check')): ?>
                        <script type="text/javascript">
                            swal({
                                  text: "Please, Login First...",
                                  icon: "warning",
                                  buttons: false,
                                  timer: 1500,
                                });
                        </script>
                    <?php endif; ?>




                    <form id="SignInForm" name="SignInForm" method="post" class="main-form full">
                      <div class="row">
                        <div class="col-xs-12 mb-20">
                          <div class="heading-part heading-bg">
                            <h2 class="heading">Buyer / Seller Login</h2>
                          </div>
                        </div>
                        <div class="col-xs-12" style="margin-top: -20px;">
                          <div class="input-box">
                            <input id="login-email" name="member_id" type="text" required placeholder="Enter Member ID">
                            <span id="error"></span>
                          </div>
                        </div>
                        <div class="col-xs-12">
                          <div class="input-box" style="margin-top: 8px;">
                            <input id="login-pass" name="password" type="password" required placeholder="Enter Your Password">
                            <span id="error"></span>
                          </div>
                        </div>

                        <div class="col-xs-4" style="margin-top: -15px;  color: #000;">
                           <div class="radio left-side"> 
                              <span>
                                  <input type="radio" style="width: 15px; margin-left: 3px;" name="u_type" checked value="s" id="radio" class="radio">
                              </span>
                            <label for="radio" style="margin-top: 12px;">&nbsp; Seller</label>
                          </div>
                        </div>
                        <div class="col-xs-3" style="margin-top: -15px;  color: #000;">
                           <div class="radio left-side"> 
                              <span>
                                  <input type="radio" style="width: 15px; margin-left: 3px;" name="u_type"  value="b" id="radio" class="radio">
                              </span>
                            <label for="radio"  style="margin-top: 12px;">&nbsp; Buyer</label>
                          </div>
                        </div>



                        <div class="col-xs-12">
                          <button name="button" type="button" onclick="SignIn()" class="btn-color right-side">Log In</button>
                        </div>
                        <!-- <div class="col-xs-12"> <a title="Forgot Password" class="forgot-password mtb-20" href="#">Forgot your password?</a>
                          <hr>
                        </div> -->
                        <div class="col-xs-12" style="margin-bottom: 20px;">
                          <div class="new-account align-center mt-20"> <span>New to UNNAYAN?</span> <a style="color: #089;" class="link" title="Register with MarketShop" href="<?php echo base_url(); ?>signUp">Create your account</a> </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <?php $this->load->view('FrontEnd/partials/ajax_signUp_SignIn'); ?>

      </div>
    </div>
  </div>
</div>
  <!-- CONTAINER END --> 