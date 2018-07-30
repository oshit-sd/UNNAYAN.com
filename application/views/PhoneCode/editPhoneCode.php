

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        Update Phone Code 
    </h4>
</div>
<hr>

<?php
  // var_dump($userInfo);
  // exit;
    if(isset($editData)) :
    foreach($editData as $data) :
?>
              
<div class="col-sm-12" style="width: 400px;">

 <?php $this->load->view('validationAndMessage') ?>
    <div class="committeeSave">
        <form action="<?php echo base_url();?>update_PhoneCode/<?php echo $data->id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Country Name</label>
                <div class="col-sm-6">
                    <input name="country" id="name" type="text" value="<?php echo $data->country; ?>" class="form-control" placeholder="Country Name">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Phone Code</label>
                <div class="col-sm-6">
                    <input name="phone_code" id="name" type="text" value="<?php echo $data->phone_code; ?>" class="form-control" placeholder="Phone Code">
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