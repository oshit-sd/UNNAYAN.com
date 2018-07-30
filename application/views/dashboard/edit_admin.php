
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Admin</li>
    </ol>
</section>
<hr>
			<?php
			  // var_dump($adminInfo);
			  // exit;
			  	if(isset($editData)) :
			  	foreach($editData as $admin) :
			?>
			  
<div class="msgMDCreateArea">

 <?php $this->load->view('validationAndMessage') ?>
    <div class="committeeSave">
        <form action="<?php echo base_url();?>admin_update/<?php echo $admin->id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Full Name</label>
                <div class="col-sm-8">
                    <input name="fullname" value="<?php echo $admin->fullname; ?>" id="name" type="text" value="" class="form-control" placeholder="Full Name">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Admin Name</label>
                <div class="col-sm-8">
                    <input name="user_name" required="required"  value="<?php echo $admin->user_name; ?>" id="name" type="text" value="" class="form-control" placeholder="Admin Name">
                </div>
            </div>
            <div class="form-group">
                <label for="position" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input name="email"  value="<?php echo $admin->email; ?>" type="email" id="Email" value="" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="offce_name" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" name="password"  id="name" value="" class="form-control"  placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-8">
                    <input type="password"  name="con_password"  id="phone" value="" class="form-control" placeholder="Confirm password">
                </div>
            </div>
            <div class="form-group">
                <label for="qwe" class="col-sm-2 control-label">Phone no.</label>
                <div class="col-sm-8">
                    <input name="phone" value="<?php echo $admin->phone; ?>" type="text" id="qwe" value="" class="form-control" placeholder="Phone">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div>
            </div>

        </form>
    </div>

    <?php 
		endforeach;
		endif;
	?>