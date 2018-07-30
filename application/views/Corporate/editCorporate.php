
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Coroporate Client</li>
    </ol>
</section>
<hr>

<div class="msgMDCreateArea">


<?php
  // var_dump($userInfo);
  // exit;
    if(isset($editData)) :
    foreach($editData as $data) :
?>
              
 <?php $this->load->view('validationAndMessage') ?>
    <div class="committeeSave">
        <form action="<?php echo base_url();?>update_Corporate/<?php echo $data->id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">


            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Company Name</label>
                <div class="col-sm-8">
                    <input name="name" value="<?php echo $data->name; ?> "  type="text" class="form-control " placeholder="Company Name">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Details</label>
                <div class="col-sm-8">
                    <textarea name="details" id="txtEditor" placeholder="Details"><?php echo $data->details; ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Select Image</label>
                <div class="col-sm-5">
                    <input name="image" id="name" type="file" value="" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div>
            </div><br>

        </form>
    </div>

    <?php 
		endforeach;
		endif;
	?>
</div>
