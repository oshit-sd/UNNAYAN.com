

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        Update Zone
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
        <form action="<?php echo base_url();?>update_Area/<?php echo $data->ar_id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">City Name</label>
                <div class="col-sm-6">
                    <select name="city" required class="form-control">
                        <option value="<?php echo $data->city_id ?>"><?php echo $data->city_name ?></option>
                        <option value="">Select a city</option>

                        <?php 
                            if (isset($allfatchCity)) :
                                foreach ($allfatchCity as $data2) :
                         ?>
                        <option value="<?php echo $data2->cty_id ?>"><?php echo $data2->city_name ?></option>
                    <?php endforeach; endif; ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Zone Name</label>
                <div class="col-sm-6">
                    <input name="area" id="name" type="text" value="<?php echo $data->area_name; ?>" class="form-control" placeholder="Zone Name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div>
            </div><br>

        </form>
    </div>

    <?php endforeach; endif; ?>