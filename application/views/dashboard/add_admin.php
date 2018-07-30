<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Admin</li>
    </ol>
</section>
<hr>

<style type="text/css">
    .form-group{
        margin-top: -10px;
    }
</style>

<div class="msgMDCreateArea">

 <?php $this->load->view('validationAndMessage') ?>
    <div class="committeeSave">
        <form action="<?php echo base_url();?>saveAdminData" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Full Name</label>
                <div class="col-sm-8">
                    <input name="fullname" id="name" type="text" value="" class="form-control" placeholder="Full Name">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-8">
                    <input name="user_name" id="name" type="text" value="" class="form-control" placeholder="User Name">
                </div>
            </div>
            <div class="form-group">
                <label for="position" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input name="email" type="email" id="Email" value="" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="offce_name" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                    <input name="password" type="password" id="name" value="" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-8">
                    <input name="con_password" type="password" id="phone" value="" class="form-control" placeholder="Confirm password">
                </div>
            </div>
            <div class="form-group">
                <label for="qwe" class="col-sm-2 control-label">Phone no.</label>
                <div class="col-sm-8">
                    <input name="phone" type="text" id="qwe" value="" class="form-control" placeholder="Phone">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary pull-right">Create Admin</button>
                </div>
            </div>

        </form>
    </div>


    <!--Tender List View-->
    <div class="TenderListView">
            <fieldset>
                <legend>Admin List<span style="padding-left:5px;color:#00CC00;"></span> </legend>
                 <table  id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                         <th>Full Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Phone</th>
                        <th style="width:10%;" colspan="2">Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                        if (isset($allfatchData)) :
                            foreach ($allfatchData as $data) :
                     ?>

                        <tr>
                            <td style="width: 150px; text-align: center; font-size: 15px; ">
                                <?php echo $data->fullname; ?>
                              </td><td style="width: 150px; text-align: center; font-size: 15px; ">
                                <?php echo $data->user_name; ?>
                              </td><td style="width: 150px; text-align: center; font-size: 15px; ">
                                <?php echo $data->email; ?>
                              </td><td style="width: 150px; text-align: center; font-size: 15px; ">
                                <?php echo $data->phone; ?>
                              </td>

                                                
                              <td>
                                <?php if($this->session->userdata('id') != $data->id && $data->admin_type == 'a') : ?>
                                <a href="<?php echo base_url(); ?>access_admin/<?php echo $data->id; ?>" class="linka fancybox fancybox.ajax btn btn-success btn-xs" d ><i class="fa fa-user-plus" aria-hidden="true"></i></a> 
                                <?php endif; ?>

                                <a href="<?php echo base_url(); ?>e_admin/<?php echo $data->id; ?>" class="btn btn-warning btn-xs" d ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                                <?php if($this->session->userdata('id') != $data->id && $data->admin_type == 'a' ) : ?>

                                <a onclick="return confirm('Are you sure to delete this message ? ')" href="<?php echo base_url(); ?>d_admin/<?php echo $data->id; ?>"  title="Delete This"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                            <?php endif; ?>

                            </td>

                        </tr>


                        <?php
                        endforeach;
                        endif;
                        ?>

                    </tbody>
                </table>
            </fieldset>
    </div>
    <!--End Tender List View-->

</div>