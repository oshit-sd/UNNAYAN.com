<!-- CONTAIN START -->
<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" >

            <div class="row" style="margin-top: 10px; margin-bottom: 30px;">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2" style="border: 1px solid #e8e8e8; ">

                    <?php $this->load->view('validationAndMessage'); ?>

                    <style type="text/css">
                      .Txtdiv{
                        margin-top: 7px;
                      }
                    </style>

                      <form name="Registerform" action="<?php echo base_url(); ?>registerUser" onsubmit="return validateForm()" method="post" class="main-form full" enctype="multipart/form-data">

                      <div class="row">
                        <div class="col-xs-12 mb-20">
                          <div class="heading-part heading-bg">
                            <h2 class="heading">Create your account</h2>
                          </div>
                        </div>
                        <div class="col-xs-12 Txtdiv" style="margin-top: -20px;">
                            <input type="text" name="f_name" required id="f-name" placeholder="Full Name *" value="<?php echo set_value('f_name'); ?>">
                            <span style="font-size: 12px; color: red;"><?php echo form_error('f_name'); ?></span>
                            <span id="error"></span>
                        </div>
                        <div class="col-xs-12 Txtdiv">

                              <select name="Ccode" required style="width: 25%;">
                                  <option value="">Code</option>
                                  <?php foreach($fatchPhoneCode as $code): ?>
                                      <option value="<?php echo $code->id; ?>"><?php echo $code->phone_code; ?></option>
                                  <?php endforeach; ?>
                              </select>


                            <input type="text" value="<?php echo set_value('phone'); ?>" name="phone" required style="width: 73%;" id="Phone"  placeholder="Phone Number *">
                            <span style="font-size: 12px; color: red;"><?php echo form_error('Ccode'); ?></span>
                            <span style="font-size: 12px; color: red;"><?php echo form_error('phone'); ?></span>
                            <span id="error"></span>
                        </div>
                        <div class="col-xs-12 Txtdiv">
                            <input id="email" value="<?php echo set_value('email'); ?>" name="email" type="email" placeholder="Email Address">
                        </div>

                        <div class="col-xs-12 Txtdiv">
                            <input id="NIDpassNumber" name="NIDpassNumber" required type="text" value="<?php echo set_value('NIDpassNumber'); ?>" placeholder="NID / PASSPORT Number *">
                             <span style="font-size: 12px; color: red;"><?php echo form_error('NIDpassNumber'); ?></span>
                        </div>

                        <div class="col-xs-12 Txtdiv">
                          <div style="width: 53%; float: left;">
                              <input id="RegFile" id="RegFile" name="RegFile" type="file" style="width: 100%;">
                              <span id="error"></span>
                          </div>
                           <span style="font-size: 10px; color: red; margin: 10px; float: left; font-weight: bold;"> NID / PASSPORT Copy </span>
                        </div>

                        <div class="col-xs-12 Txtdiv">
                            <span style="font-weight: bold; font-size: 15px; color: #444;">Choose your category</span>
                        </div>

                        <div class="col-xs-12 Txtdiv">

                          <?php foreach($fatchCategory as $category): ?>
                             <div class="check-box left-side mb-20"> <span>
                              <input type="checkbox" style="margin-top: -8px; width: 14px;" value="<?php echo $category->cat_id; ?>" name="category[]" id="category" class="checkbox">
                              </span>
                              <label for="category" style="color: #000;"><?php echo $category->cat_name; ?></label> &nbsp; &nbsp;
                            </div>
                          <?php endforeach; ?>

                        </div>

                        <div class="col-xs-12">
                          <div class="check-box left-side mb-20"> <span>
                            <input type="checkbox" name="agree" value="1" style="margin-top: -8px; width: 14px;" id="agree" class="checkbox">
                            </span>
                            <label for="agree">I agree to Unnayan's <a style="color: #089;" href="<?php echo base_url(); ?>TermsCondition">terms & conditions</a> </label>
                            <span id="error"></span>
                          </div>
                          <button type="submit" class="btn-color right-side">Submit</button>
                        </div>
                        <div class="col-xs-12" style="margin-bottom: 20px;">
                          <hr>
                          <div class="new-account align-center mt-20"> 
                            <a style="color: #089;" class="link" title="Register with MarketShop" href="<?php echo base_url(); ?>ContactUs">Contact Us</a> <span >Directly</span>  <br>

                            <span>Already have an account with us</span> <a style="color: #089;" class="link" title="Register with MarketShop" href="<?php echo base_url(); ?>signIn">Login Here</a> 
                          </div>
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


