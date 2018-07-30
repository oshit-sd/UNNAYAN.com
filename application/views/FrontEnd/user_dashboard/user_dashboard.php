
  
  <!-- CONTAIN START -->
  <section class="checkout-section ptb-70" style="margin-top: -60px;">
    <div class="container"> 
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="account-sidebar account-tab mb-xs-30">
            <div class="dark-bg tab-title-bg">
              <div class="heading-part">
                <div class="sub-title"><span></span> My Account</div>
              </div>
            </div>

            <?php $this->load->view('validationAndMessage') ?>

            <div class="account-tab-inner">
              <ul class="account-tab-stap">
                <li id="step1" class="active"> <a href="javascript:void(0)">My Dashboard<i class="fa fa-angle-right"></i> </a> </li>
                <li id="step2"> <a href="javascript:void(0)">Sell Product<i class="fa fa-angle-right"></i> </a> </li>
                <li id="step3"> <a href="javascript:void(0)">Buy Product<i class="fa fa-angle-right"></i> </a> </li>
                <li id="step4"> <a href="javascript:void(0)">Change Password<i class="fa fa-angle-right"></i> </a> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-8">
          <div id="data-step1" class="account-content" data-temp="tabdata">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">Account Dashboard</h2>
                </div>
              </div>
            </div>

            <style type="text/css">
                .imgDiv{
                  width: 11%;  float: left; height: 100px;
                }
                .ChangeTxt{
                  font-size: 13px; color: #089;
                  font-weight: bold;
                }
                .TxtDiv{
                    width: 80%; float: left; padding-left: 10px;
                }
                @media only screen and (max-width: 600px) {
                  .imgDiv{
                    width: 30%; height: 70px;
                  }
                  .TxtDiv{
                    width: 70%; float: left; padding-left: 5px;
                  }
                }
            </style>
            <?php 
                $uid = $this->session->userdata('user_id');
                foreach($fatchUser as $data):
                  if($data->user_id == $uid ):
            ?>
            <div class="mb-30">
              <div class="row">
                <div class="col-xs-12">
                  <div class="heading-part" >
                    <div style="width: 100%;">

                        <div class="imgDiv">
                          <?php if($data->u_pic != 0): ?>
                                <img style="height: 100%; width: 100%;" src="<?php echo base_url(); ?>libs/upload_pic/user_pic/<?php echo $data->u_pic; ?>"> <br>
                            <?php else: ?>
                                <img style="height: 100%; width: 100%;" src="<?php echo base_url(); ?>libs/logo_image/user.png"><br> 
                            <?php endif; ?>

                           <a class="ChangeTxt linka fancybox fancybox.ajax btn" href="<?php echo base_url(); ?>changeProfile/<?php echo $data->user_id; ?>">Change Profile</a>
                        </div>

                        <div class="TxtDiv">
                            <h3 class="sub-heading">Hello, <?php echo $data->u_name; ?></h3>

                            <p>Welcome to unnayan</p>
                        </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="m-0">
              <div class="row">
                <div class="col-xs-12 mb-20">
                  <div class="heading-part" style="margin-top: 25px;">
                    <h3 class="sub-heading">Account Information</h3>
                  </div>
                  <hr>
                </div>
                
                <div class="col-sm-6">
                  <div class="cart-total-table address-box commun-table">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                              <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <style type="text/css">
                            .inner-heading{
                              font-size: 14px;
                            }
                          </style>
                          <tr>
                            <td style="color: #041852;"><ul>
                                <li class="inner-heading"> <strong>Name : <?php echo $data->u_name; ?></strong> </li>
                                <li class="inner-heading">
                                  <p><strong>Phone : <?php echo $data->u_phone_code.$data->u_phone; ?></strong></p>
                                </li>
                                <li class="inner-heading">
                                  <p><strong>Email : <?php echo $data->u_email; ?></strong></p>
                                </li>
                                <li class="inner-heading"><p><strong>Date of Birth : <?php echo $data->u_date_of_birth; ?></strong></p></li>
                              
                              </ul></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="cart-total-table address-box commun-table">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th><a href="<?php echo base_url() ?>e_userInfo/<?php echo $data->user_id; ?>" class="linka fancybox fancybox.ajax" style="color: #089; float: right;">Edit</a></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="color: #041852;"><ul>
                                <li class="inner-heading"> <strong>Country :  <?php echo $data->country_name; ?></strong> </li>
                                <li class="inner-heading"><p><strong>City : <?php echo $data->city_name; ?></strong></p></li>
                                <li class="inner-heading"> <strong>Address : <?php echo $data->u_address; ?></strong> </li>
                              </ul></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        <?php endif; endforeach; ?>

          
      


          <div id="data-step2" class="account-content" data-temp="tabdata" style="display:none">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">My Sell Product</h2>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 mb-xs-30">
                <div class="cart-item-table commun-table" style="margin-top: -30px;">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                         <?php 
                         foreach ($fatchLoggedUser as $userlog) :
                            foreach ($fatchUserPost as $data) :
                              if ($userlog->user_id == $data->p_add_by) :
                                  if($data->p_user_type == 's'  && $data->p_status == 'p' || $data->p_status == 'a'):
                         ?>
                          <tr>
                            <td>
                              <a href="<?php echo base_url(); ?>viewSinglePost/<?php echo $data->post_id; ?>" class="linka fancybox fancybox.ajax">
                              <div style="width: 80px; float: left;">
                                  <?php if($data->p_pic1 != 0): ?>
                                      <img style="height:70px; border: 1px solid #ddd; border-radius: 2px; width:80px;" src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic1; ?>"> 
                                  <?php else: ?>
                                      <img height="40" width="60" src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
                                  <?php endif; ?>
                              </div>
                              </a>
                            </td>

                            <td>
                              <div class="product-title" style="color: #041852;"> <a href="<?php echo base_url(); ?>viewSinglePost/<?php echo $data->post_id; ?>" class="linka fancybox fancybox.ajax"><?php echo $data->p_title; ?></a> 
                              </div>
                            </td>

                            <td>
                              <div class="base-price price-box"> <span class="price"><?php echo number_format($data->p_price); ?></span> </div>
                            </td>

                            <td>
                              
                              <a style="padding: 4px; font-size: 10px; border-radius: 3px;" href="<?php echo base_url(); ?>viewSinglePost/<?php echo $data->post_id; ?>" class="linka fancybox fancybox.ajax btn btn-primary" >View</a> 

                              <a style="padding: 4px; font-size: 10px; border-radius: 3px;" href="<?php echo base_url(); ?>e_Product/<?php echo $data->post_id; ?>" class="linka fancybox fancybox.ajax btn btn-success" >Edit</a> 

                              <a style="padding: 4px; font-size: 10px; border-radius: 3px;"  class="btn btn-danger" onclick="deletePost(<?php echo $data->post_id; ?>)"  title="Delete This"> Delete</a>
                            </td>
                          </tr>
                        <?php endif; endif; endforeach; endforeach;  ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div id="data-step3" class="account-content" data-temp="tabdata" style="display:none">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">My Buy Product</h2>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 mb-xs-30">
                <div class="cart-item-table commun-table"  style="margin-top: -30px;">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                         <?php 
                         foreach ($fatchLoggedUser as $userlog) :
                            foreach ($fatchUserPost as $data) :
                              if ($userlog->user_id == $data->p_add_by) :
                                  if($data->p_user_type == 'b'  && $data->p_status == 'p' || $data->p_status == 'a'):
                         ?>
                          <tr>
                            <td>
                              <a href="<?php echo base_url(); ?>viewSinglePost/<?php echo $data->post_id; ?>" class="linka fancybox fancybox.ajax">
                              <div style="width: 80px; float: left;">
                                  <?php if($data->p_pic1 != 0): ?>
                                      <img style="height:70px; border: 1px solid #ddd; border-radius: 2px; width:80px;" src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic1; ?>"> 
                                  <?php else: ?>
                                      <img height="40" width="60" src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
                                  <?php endif; ?>
                              </div>
                              </a>
                            </td>

                            <td>
                              <div class="product-title"  style="color: #041852;"> <a href="<?php echo base_url(); ?>viewSinglePost/<?php echo $data->post_id; ?>" class="linka fancybox fancybox.ajax"><?php echo $data->p_title; ?></a> 
                              </div>
                            </td>

                            <td>
                              <div class="base-price price-box"> <span class="price"><?php echo number_format($data->p_price); ?></span> </div>
                            </td>

                            <td>
                             

                              <a style="padding: 4px; font-size: 10px; border-radius: 3px;" href="<?php echo base_url(); ?>viewSinglePost/<?php echo $data->post_id; ?>" class="linka fancybox fancybox.ajax btn btn-primary" >View</a> 

                              <a style="padding: 4px; font-size: 10px; border-radius: 3px;" href="<?php echo base_url(); ?>e_Product/<?php echo $data->post_id; ?>" class="linka fancybox fancybox.ajax btn btn-success" >Edit</a> 

                              <a style="padding: 4px; font-size: 10px; border-radius: 3px;"  class="btn btn-danger" onclick="deletePost(<?php echo $data->post_id; ?>)"  title="Delete This"> Delete</a>
                            </td>
                          </tr>
                        <?php endif; endif; endforeach; endforeach;  ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>





          <div id="data-step4" class="account-content" data-temp="tabdata" style="display:none">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">Change Password</h2>
                </div>
              </div>
            </div>
            <form name="ChangePassForm" id="ChangePassForm" class="main-form full">
              <div class="row">
                <div class="col-xs-12">
                  <div class="input-box">
                    <label for="old-pass">Old Password</label>
                    <input type="password" name="old_pass" placeholder="Old Password" required id="old-pass">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-box">
                    <label for="login-pass">New Password</label>
                    <input type="password" name="new_pass" placeholder="Minimum-6 characters long" required id="login-pass">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-box">
                    <label for="re-enter-pass">Re-enter Password</label>
                    <input type="password" name="re_pass" placeholder="Minimum-6 characters long" required id="re-enter-pass">
                  </div>
                </div>
                <div class="col-xs-12">
                  <button class="btn-color" onclick="changePassword(<?php echo $this->session->userdata('user_id'); ?>)" type="button" name="button">Change Password</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 



<?php $this->load->view('FrontEnd/user_dashboard/partials/ajax_user_dashboard'); ?>