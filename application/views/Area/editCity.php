

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        Update City
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
        <form action="<?php echo base_url();?>update_City/<?php echo $data->cty_id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Country Name</label>
                <div class="col-sm-6">
                    <select name="country" required class="form-control">
                        <option value="<?php echo $data->country_id ?>"><?php echo $data->country_name ?></option>
                        <option value="">Select a country</option>

                        <?php 
                            if (isset($allfatchCountry)) :
                                foreach ($allfatchCountry as $data2) :
                         ?>
                        <option value="<?php echo $data2->ct_id ?>"><?php echo $data2->country_name ?></option>
                    <?php endforeach; endif; ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">City Name</label>
                <div class="col-sm-6">
                    <input name="city" id="name" type="text" value="<?php echo $data->city_name; ?>" class="form-control" placeholder="Country Name">
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