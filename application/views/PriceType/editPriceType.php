

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        Update Price Type 
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
        <form action="<?php echo base_url();?>update_PriceType/<?php echo $data->id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Price Type</label>
                <div class="col-sm-6">
                    <input name="price_type" id="name" type="text" value="<?php echo $data->price_type; ?>" class="form-control" placeholder="Category Name">
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