

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
       Access Admin
    </h4>
</div>
<hr>

<?php
  // var_dump($userInfo);
  // exit;
    if(isset($AccessData)) :
    foreach($AccessData as $data) :
?>
              
<div class="col-sm-12" style="width: 500px;">

 <?php $this->load->view('validationAndMessage') ?>
    <div class="committeeSave">
        <form action="<?php echo base_url();?>defineAccess/<?php echo $data->admin_id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="col-sm-6" style="margin-top: 10px;"> 
                <!-- Register User -->
                <div class="form-group" style="">
                    <div class="col-sm-12">
                    <?php if($data->reg_user == 1) : ?>
                        <input name="reg_user" value="1" checked type="checkbox">  Register User
                    <?php else: ?>
                        <input name="reg_user" value="1" type="checkbox"> Register User
                    <?php endif; ?>
                    </div>
                </div>

                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->pending_reg_user == 1) : ?>
                        <input name="pending_reg_user" value="1" checked type="checkbox"> Pending Reg. User
                    <?php else: ?>
                        <input name="pending_reg_user" value="1" type="checkbox"> Pending Reg. User
                    <?php endif; ?>
                    </div>
                </div>

                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->approve_user == 1) : ?>
                        <input name="approve_user" value="1" checked type="checkbox"> Approve User
                    <?php else: ?>
                        <input name="approve_user" value="1" type="checkbox"> Approve User
                    <?php endif; ?>
                    </div>
                </div>

                <!-- User Post -->
                <div class="form-group" style="">
                    <div class="col-sm-12">
                    <?php if($data->user_post == 1) : ?>
                        <input name="user_post" value="1" checked type="checkbox">  Register User
                    <?php else: ?>
                        <input name="user_post" value="1" type="checkbox"> User Post
                    <?php endif; ?>
                    </div>
                </div>


                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->pending_post == 1) : ?>
                        <input name="pending_post" value="1" checked type="checkbox"> Pending Post
                    <?php else: ?>
                        <input name="pending_post" value="1" type="checkbox"> Pending Post
                    <?php endif; ?>
                    </div>
                </div>

                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->approve_post == 1) : ?>
                        <input name="approve_post" value="1" checked type="checkbox"> Approve Post
                    <?php else: ?>
                        <input name="approve_post" value="1" type="checkbox"> Approve Post
                    <?php endif; ?>
                    </div>
                </div>




                <!-- footer -->
                <div class="form-group" style="">
                    <div class="col-sm-12">
                    <?php if($data->footer == 1) : ?>
                        <input name="footer" value="1" checked type="checkbox"> Footer
                    <?php else: ?>
                        <input name="footer" value="1" type="checkbox"> Footer
                    <?php endif; ?>
                    </div>
                </div>


                 <!-- photo_gallery -->
                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->photo_gallery == 1) : ?>
                        <input name="photo_gallery" value="1" checked type="checkbox"> Photo Gallery
                    <?php else: ?>
                        <input name="photo_gallery" value="1" type="checkbox"> Photo Gallery
                    <?php endif; ?>
                    </div>
                </div>



                <!-- conporate -->
                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->conporate == 1) : ?>
                        <input name="conporate" value="1" checked type="checkbox"> Corporate
                    <?php else: ?>
                        <input name="conporate" value="1" type="checkbox"> Corporate
                    <?php endif; ?>
                    </div>
                </div>

                <!-- footer_about -->
                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->footer_about == 1) : ?>
                        <input name="footer_about" value="1" checked type="checkbox"> Footer About Us
                    <?php else: ?>
                        <input name="footer_about" value="1" type="checkbox"> Footer About Us
                    <?php endif; ?>
                    </div>
                </div>

                <!-- footer_contact -->
                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->footer_contact == 1) : ?>
                        <input name="footer_contact" value="1" checked type="checkbox"> Footer Contact Us
                    <?php else: ?>
                        <input name="footer_contact" value="1" type="checkbox"> Footer Contact Us
                    <?php endif; ?>
                    </div>
                </div>

                
               
            </div>


            <!-- ============================= -->
            <!-- ============================= -->
            <!-- ============================= -->


            <div class="col-sm-6" style="margin-top: 10px;"> 
            
                <!-- Main Menu -->
                <div class="form-group" style="">
                    <div class="col-sm-12">
                    <?php if($data->main_menu == 1) : ?>
                        <input name="main_menu" value="1" checked type="checkbox"> Main Menu
                    <?php else: ?>
                        <input name="main_menu" value="1" type="checkbox"> Main Menu
                    <?php endif; ?>
                    </div>
                </div>
                <!-- about us -->
                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->about_us == 1) : ?>
                        <input name="about_us" value="1" checked type="checkbox"> About Us
                    <?php else: ?>
                        <input name="about_us" value="1" type="checkbox"> About Us
                    <?php endif; ?>
                    </div>
                </div>

                <!-- service -->
                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->service == 1) : ?>
                        <input name="service" value="1" checked type="checkbox"> Services
                    <?php else: ?>
                        <input name="service" value="1" type="checkbox"> Services
                    <?php endif; ?>
                    </div>
                </div>

                <!-- terms_con -->
                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->terms_con == 1) : ?>
                        <input name="terms_con" value="1" checked type="checkbox"> Terms & Condition
                    <?php else: ?>
                        <input name="terms_con" value="1" type="checkbox"> Terms & Condition
                    <?php endif; ?>
                    </div>
                </div>

                <!-- faq -->
                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->faq == 1) : ?>
                        <input name="faq" value="1" checked type="checkbox"> Faq
                    <?php else: ?>
                        <input name="faq" value="1" type="checkbox"> Faq
                    <?php endif; ?>
                    </div>
                </div>

                <!-- payment -->
                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->payment == 1) : ?>
                        <input name="payment" value="1" checked type="checkbox"> Payment
                    <?php else: ?>
                        <input name="payment" value="1" type="checkbox"> Payment
                    <?php endif; ?>
                    </div>
                </div>

                <!-- contact_us -->
                <div class="form-group" style="padding-left: 15px;">
                    <div class="col-sm-12">
                    <?php if($data->contact_us == 1) : ?>
                        <input name="contact_us" value="1" checked type="checkbox"> Contact Us
                    <?php else: ?>
                        <input name="contact_us" value="1" type="checkbox"> Contact Us
                    <?php endif; ?>
                    </div>
                </div>


                 <!-- price Type -->
                <div class="form-group" style="">
                    <div class="col-sm-12">
                    <?php if($data->price_type == 1) : ?>
                        <input name="price_type" value="1" checked type="checkbox"> Price Type
                    <?php else: ?>
                        <input name="price_type" value="1" type="checkbox"> Add Price Type
                    <?php endif; ?>
                    </div>
                </div>

                <!-- category -->
                <div class="form-group" style="">
                    <div class="col-sm-12">
                    <?php if($data->category == 1) : ?>
                        <input name="category" value="1" checked type="checkbox"> Category
                    <?php else: ?>
                        <input name="category" value="1" type="checkbox"> Category
                    <?php endif; ?>
                    </div>
                </div>

                <!-- location -->
                <div class="form-group" style="">
                    <div class="col-sm-12">
                    <?php if($data->location == 1) : ?>
                        <input name="location" value="1" checked type="checkbox"> Location
                    <?php else: ?>
                        <input name="location" value="1" type="checkbox"> Location
                    <?php endif; ?>
                    </div>
                </div>

       
        
                <!-- slider -->
                <div class="form-group" style="">
                    <div class="col-sm-12">
                    <?php if($data->slider == 1) : ?>
                        <input name="slider" value="1" checked type="checkbox"> Slider Image
                    <?php else: ?>
                        <input name="slider" value="1" type="checkbox"> Slider Image
                    <?php endif; ?>
                    </div>
                </div>


            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success pull-right">Access</button>
                </div>
            </div><br>

        </form>
    </div>

    <?php 
        endforeach;
        endif;
    ?>