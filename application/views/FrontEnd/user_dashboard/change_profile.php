

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        Change Profile
    </h4>
</div>
<hr>

<?php
  // var_dump($userInfo);
  // exit;
    if(isset($editData)) :
    foreach($editData as $data) :
?>
  
<div class="col-sm-12" style="width: 450px;">

    <div class="committeeSave">
        <form action="<?php echo base_url();?>UpdateProfile/<?php echo $data->user_id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

            <input type="hidden" name="old" value="<?php echo $data->u_pic; ?>">

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Select Image</label>
                <div class="col-sm-7">
                    <input type="file" name="changeProfile" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-9">
                    <button type="submit" class="btn btn-success pull-right">Change</button>
                </div>
            </div><br>

        </form>
    </div>

    <?php 
		endforeach;
		endif;
	?>