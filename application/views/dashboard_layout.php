<?php $this->load->view('dashboard/partials/header_css'); ?>
<?php 
    $id = $this->session->userdata('admin_id');
    $attr = array('admin_id' =>  $id);  
    $adminQuery = $this->db->limit(1)->get_where('tbl_admin_access', $attr);
    $accessAdmin = $adminQuery->row();


    $adminQuery2 = $this->db->limit(1)->where('admin_type','s')->where('id',$id)->get('create_admin');
    $accessSuperAdmin = $adminQuery2->row();

?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url();?>dashboard" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>Unnayan Admin</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Unnayan Admin</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <?php
                $countFeed = $this->db->from("tbl_feedback")->where('fb_status', 'p')->count_all_results();
            ?>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="<?php echo base_url();?>ViewComment" class="dropdown-toggle">
                            <img src="<?php echo base_url();?>libs/logo_image/comment.png" class="user-image" alt="User Image">
                             <span class="hidden-xs">Comment</span>
                        </a>
                    </li>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url();?>libs/logo_image/msg.gif" class="user-image" alt="User Image">
                             <span class="hidden-xs">Feedback( <?php echo $countFeed; ?> )</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header" style="overflow: scroll; background-color: #C6BD34; ">
                                <style type="text/css">
                                    
                                </style>
                            <?php
                                $qu = $this->db->where('fb_status','p')->order_by('fb_id','desc')->get('tbl_feedback');
                                $pendingData =  $qu->result();
                            ?>

                            <?php foreach($pendingData as $data):?>
                                <a href="<?php echo base_url(); ?>singleFeedback/<?php echo $data->fb_id; ?>" style="text-align: left; color: #000; border-bottom: 1px solid #eee;"> <?php echo $data->fb_name; ?></a>
                            <?php endforeach; ?>


                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url(); ?>seenFeedback" style="color: #fff;" class="btn btn-primary btn-flat">Seen Message</a>
                                </div>
                                <!-- <div class="pull-right">
                                   <a href="<?php echo base_url() ?>login/logout">
                                        <img  src="<?php echo base_url();?>libs/logo_image/logout.jpg" class="user-image" alt="User Image">
                                        <span class="hidden-xs">Sign out</span>
                                    </a>
                                </div> -->
                            </li>
                        </ul>
                    </li>




                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img <script src="<?php echo base_url();?>libs/logo_image/user.png" class="user-image" alt="User Image">
                             <span class="hidden-xs"><?php echo $this->session->userdata('name'); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img <script src="<?php echo base_url();?>libs/logo_image/user.png" class="img-circle" alt="User Image">

                                <p>
                                    <span class="hidden-xs"><?php echo $this->session->userdata('name'); ?></span>
                                    <small></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <!-- <div class="pull-left">
                                    <a href="#" style="color: #fff;" class="btn btn-default btn-flat">Profile</a>
                                </div> -->
                                <div class="pull-right">
                                   <a href="<?php echo base_url() ?>login/logout">
                                        <img  src="<?php echo base_url();?>libs/logo_image/logout.jpg" class="user-image" alt="User Image">
                                        <span class="hidden-xs">Sign out</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <!-- <li class="user user-menu">
                        <a href="<?php echo base_url() ?>login/logout">
                            <img  src="<?php echo base_url();?>libs/logo_image/logout.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">Sign out</span>
                        </a>
                    </li> -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url();?>libs/logo_image/user.png" style="height: 40px;" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Unnayan Admin</p>
                    <a href="<?php echo base_url();?>dashboard"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                
                <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-tachometer text-aqua"></i> <span>Dashboard</span></a></li> 

                <?php
                    $countPenUesr = $this->db->from("tbl_users")->where('u_status', 'p')->count_all_results();

                    $countAppUesr = $this->db->from("tbl_users")->where('u_status', 'a')->count_all_results();

                    $countPPost = $this->db->from("tbl_post")->where('p_status', 'p')->count_all_results();

                    $countAPost = $this->db->from("tbl_post")->where('p_status', 'a')->count_all_results();
                ?>               

             
                <?php if(isset($accessSuperAdmin) || isset($accessAdmin)): ?>

                <?php if(empty($accessAdmin->reg_user) ==0 || empty($accessAdmin->pending_reg_user) ==0  || empty($accessAdmin->approve_user) ==0  || isset($accessSuperAdmin)) : ?>
                
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-user text-aqua" aria-hidden="true"></i><span>Register User</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu"> 

                        <?php if(empty($accessAdmin->reg_user) ==0 || empty($accessAdmin->pending_reg_user) ==0 || isset($accessSuperAdmin)) : ?>

                        <li><a href="<?php echo base_url() ?>PendingRegisterUser"><i class="fa fa-user text-aqua"></i> <span>Pending Register User ( <?php echo $countPenUesr; ?> )</span></a></li>

                        <?php endif; if(empty($accessAdmin->reg_user) ==0 || empty($accessAdmin->approve_user) ==0 || isset($accessSuperAdmin)) : ?>

                        <li><a href="<?php echo base_url() ?>ApproveUser"><i class="fa fa-user text-aqua"></i> <span>Approve User ( <?php echo $countAppUesr; ?> )</span></a></li>
                         <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                

                <!-- User Post -->
                <?php if(empty($accessAdmin->user_post) ==0 || empty($accessAdmin->pending_post) ==0  || empty($accessAdmin->approve_post) ==0  || isset($accessSuperAdmin)) : ?>

                <li class="treeview">
                    <a href="">
                        <i class="fa fa-product-hunt text-aqua" aria-hidden="true"></i><span>User Post</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <?php if(empty($accessAdmin->user_post) ==0 || empty($accessAdmin->pending_post) ==0 || isset($accessSuperAdmin)) : ?> 

                         <li><a href="<?php echo base_url() ?>PendingPost"><i class="fa fa-product-hunt text-aqua"></i> <span>Pending Post ( <?php echo $countPPost; ?> )</span></a></li>

                        <?php endif; if(empty($accessAdmin->user_post) ==0 || empty($accessAdmin->approve_post) ==0 || isset($accessSuperAdmin)) : ?>

                          <li><a href="<?php echo base_url() ?>approvePost"><i class="fa fa-product-hunt text-aqua"></i> <span>Approve Post ( <?php echo $countAPost; ?> )</span></a></li>
                          <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>


                <!-- Price Type -->
                <?php if(empty($accessAdmin->price_type) ==0  || isset($accessSuperAdmin)) : ?>
                <li><a href="<?php echo base_url() ?>addPriceType"><i class="fa fa-money text-aqua"></i> <span>Add Price Type</span></a></li>
                <?php endif; ?>

                <!-- Phone Code Type -->
                <?php if(empty($accessAdmin->phone_code) ==0  || isset($accessSuperAdmin)) : ?>
                <li><a href="<?php echo base_url() ?>addPhoneCode"><i class="fa fa-phone-square text-aqua"></i> <span>Add Phone Code</span></a></li>
                <?php endif; ?>


                <!-- Category -->
                <?php if(empty($accessAdmin->category) == 0  || isset($accessSuperAdmin)) : ?> 
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-tags text-aqua" aria-hidden="true"></i><span>Category</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                      <li><a href="<?php echo base_url() ?>addCategory"><i class="fa fa-tags text-aqua"></i> <span>Category</span></a></li>

                      <li><a href="<?php echo base_url() ?>addSubCategory"><i class="fa fa-tags text-aqua"></i> <span>Sub Category</span></a></li>

                     <!--  <li><a href="<?php echo base_url() ?>addCategoryDetails"><i class="fa fa-cubes text-aqua"></i> <span>Category Details</span></a></li> -->

                    </ul>
                </li>
                <?php endif; ?>


                <!-- Location -->
                <?php if(empty($accessAdmin->location) ==0  || isset($accessSuperAdmin)) : ?>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-map-marker text-aqua" aria-hidden="true"></i><span>Location</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                            <li><a href="<?php echo base_url() ?>addCountry"><i class="fa fa-map-marker text-aqua"></i> <span>Add Country</span></a></li>
                          
                            <li><a href="<?php echo base_url() ?>addCity"><i class="fa fa-map-marker text-aqua"></i> <span>Add City</span></a></li>

                            <li><a href="<?php echo base_url() ?>addArea"><i class="fa fa-map-marker text-aqua"></i> <span>Add Zone</span></a></li>
                        </ul>
                    </a>
                </li>
                <?php endif; ?>

                

                <!-- Main Menu -->
                <?php if(empty($accessAdmin->main_menu) ==0 || empty($accessAdmin->about_us) ==0  || empty($accessAdmin->service) ==0  || empty($accessAdmin->terms_con) ==0  || empty($accessAdmin->faq) ==0  || empty($accessAdmin->payment) ==0  || empty($accessAdmin->contact_us) ==0  || isset($accessSuperAdmin)) : ?>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-bars text-aqua" aria-hidden="true"></i><span>Main Menu</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <?php if(empty($accessAdmin->main_menu) ==0 || empty($accessAdmin->about_us) ==0 || isset($accessSuperAdmin)) : ?>
                        <li><a href="<?php echo base_url() ?>add_about"><i class="fa fa-cubes text-aqua"></i> <span>About Us</span></a></li>
                        <?php endif; ?>


                        <?php if(empty($accessAdmin->main_menu) ==0 || empty($accessAdmin->service) ==0 || isset($accessSuperAdmin)) : ?>
                        <li><a href="<?php echo base_url() ?>add_Service"><i class="fa fa-cubes text-aqua"></i> <span>Add Service</span></a></li>
                        <?php endif; ?>


                        <?php if(empty($accessAdmin->main_menu) ==0 || empty($accessAdmin->terms_con) ==0 || isset($accessSuperAdmin)) : ?>
                        <li><a href="<?php echo base_url() ?>add_Terms"><i class="fa fa-cubes text-aqua"></i> <span>Terms & Condition</span></a></li>
                        <?php endif; ?>


                        <?php if(empty($accessAdmin->main_menu) ==0 || empty($accessAdmin->faq) ==0 || isset($accessSuperAdmin)) : ?>
                        <li><a href="<?php echo base_url() ?>add_Faq"><i class="fa fa-cubes text-aqua"></i> <span>FAQ</span></a></li>
                        <?php endif; ?>


                        <?php if(empty($accessAdmin->main_menu) ==0 || empty($accessAdmin->payment) ==0 || isset($accessSuperAdmin)) : ?>
                        <li><a href="<?php echo base_url() ?>add_Payment"><i class="fa fa-cubes text-aqua"></i> <span>Payment</span></a></li>
                        <?php endif; ?>


                        <?php if(empty($accessAdmin->main_menu) ==0 || empty($accessAdmin->contact_us) ==0 || isset($accessSuperAdmin)) : ?>
                        <li><a href="<?php echo base_url() ?>add_contact"><i class="fa fa-cubes text-aqua"></i> <span>Contact Us</span></a></li>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>



                <!-- footer -->
                <?php if(empty($accessAdmin->footer) ==0 || empty($accessAdmin->photo_gallery) ==0  || empty($accessAdmin->conporate) ==0  || empty($accessAdmin->footer_about) ==0  || empty($accessAdmin->footer_contact) ==0  || isset($accessSuperAdmin)) : ?> 
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-bars text-aqua" aria-hidden="true"></i><span>Footer</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                            <?php if(empty($accessAdmin->footer) ==0 || empty($accessAdmin->photo_gallery) ==0 || isset($accessSuperAdmin)) : ?>
                            <li><a href="<?php echo base_url() ?>add_gallery"><i class="fa fa-cubes text-aqua"></i> <span>Photo Gallery</span></a></li>
                            <?php endif; ?>

                            <?php if(empty($accessAdmin->footer) ==0 || empty($accessAdmin->conporate) ==0 || isset($accessSuperAdmin)) : ?>
                            <li><a href="<?php echo base_url() ?>addCorporate"><i class="fa fa-cubes text-aqua"></i> <span>Corporate Client</span></a></li>
                            <?php endif; ?>

                            <?php if(empty($accessAdmin->footer) ==0 || empty($accessAdmin->footer_about) ==0 || isset($accessSuperAdmin)) : ?>
                            <li><a href="<?php echo base_url() ?>footer_aboutUs"><i class="fa fa-cubes text-aqua"></i> <span>About Us</span></a></li>
                            <?php endif; ?>

                            <?php if(empty($accessAdmin->footer) ==0 || empty($accessAdmin->footer_contact) ==0 || isset($accessSuperAdmin)) : ?>
                            <li><a href="<?php echo base_url() ?>footer_contact"><i class="fa fa-cubes text-aqua"></i> <span>Contact Us</span></a></li>
                            <?php endif; ?>
                        </ul>
                    </a>
                </li>
                <?php endif; ?>




                <!-- Slider -->
                <?php if(empty($accessAdmin->slider) ==0  || isset($accessSuperAdmin)) : ?>
                <li><a href="<?php echo base_url() ?>add_slideImage"><i class="fa fa-picture-o text-aqua"></i> <span>Slider Image</span></a></li>
                <?php endif; endif; ?>


                <!-- Create Admin -->
                <?php if(isset($accessSuperAdmin)) : ?>
                <li><a href="<?php echo base_url() ?>add_admin"><i class="fa fa-user-plus text-aqua"></i> <span>Create Admin</span></a></li>
                <?php endif; ?>


                <li><a href="<?php echo base_url() ?>login/logout"><i class="fa fa-sign-out text-aqua"></i> <span>Sign out</span></a></li>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
           <?php  
                if(isset($content)):
                  
                   $this->load->view($content, TRUE);

              endif;
            ?>
        </section>
        <!-- /.content -->
    </div>
  <?php $this->load->view('dashboard/partials/footer'); ?>