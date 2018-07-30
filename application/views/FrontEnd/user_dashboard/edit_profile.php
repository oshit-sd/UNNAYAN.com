
<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        Update Profile
    </h4>
</div>
<hr>

<?php
  // var_dump($userInfo);
  // exit;
    if(isset($editData)) :
    foreach($editData as $data) :
?>
              
<div class="col-sm-12" style="width: 500px;">

 <?php $this->load->view('validationAndMessage') ?>
    <div class="committeeSave">
        <form action="<?php echo base_url();?>update_userInfo/<?php echo $data->user_id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group" style="margin-top: 5px;">
                <label for="name" class="col-sm-4 control-label">Full Name</label>
                <div class="col-sm-6">
                    <input name="f_name" id="name" type="text" value="<?php echo $data->u_name ?>" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Phone</label>
                <div class="col-sm-6">
                    <input name="Ccode" required maxlength="6" type="text" value="<?php echo $data->u_phone_code ?>" style="width: 30%; float: left;" class="form-control" placeholder="Zone Name">
                    <input name="phone" id="name" type="text" value="<?php echo $data->u_phone ?>" style="width: 68%; float: right;" class="form-control" placeholder="Zone Name">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Email</label>
                <div class="col-sm-6">
                    <input name="email" id="name" type="email" value="<?php echo $data->u_email ?>" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="datepicker" class="col-sm-4 control-label">Date of Birth</label>
                <div class="col-sm-6">
                    <input name="dateBirth" id="datepicker" type="text" value="<?php echo $data->u_date_of_birth; ?>" class="form-control" placeholder="0000-00-00">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Country</label>
                <div class="col-sm-6">
                   <select name="country" onclick="FatchCity()" id="countrySelect" class="form-control">
                    <option value="<?php echo $data->u_country; ?>"><?php echo $data->country_name; ?></option>
                     <option>Select a country</option>

                     <?php $i=1; foreach($fatchCountry as $country): ?>
                        <option value="<?php echo $country->ct_id; ?>"><?php echo $country->country_name; ?></option>
                      <?php endforeach; ?>
                     
                   </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">City</label>
                <div class="col-sm-6">
                   <select name="city" onclick="FatchZone()" id="citySelect" class="form-control">
                     <option value="<?php echo $data->u_area; ?>"><?php echo $data->city_name; ?></option>
                     <option value="">Select a city</option>

                     
                   </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Address</label>
                <div class="col-sm-6">
                    <textarea name="address" rows="5" class="form-control"><?php echo $data->u_address; ?></textarea>
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



<?php $this->load->view('FrontEnd/user_dashboard/partials/ajax_fatch_sub_category'); ?>