

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        User Information
    </h4>
</div>
<hr>
<style type="text/css">
    th{
        width: 150px;
    }
</style>

<?php
    foreach($userData as $data) :
?>         
<div class="col-sm-12" style="width: 600px;">

 <?php $this->load->view('validationAndMessage'); ?>
    <div class="committeeSave">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Full Name</th>
                    <td><?php echo $data->u_name; ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo $data->u_phone_code.$data->u_phone; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $data->u_email; ?></td>
                </tr>
                <tr>
                    <th>Selected Category</th>
                    <td>
                        <?php 
                            $category = $data->u_category; 
                            $allCate = explode(',', $category);
                            foreach($allCate as $cate):  
                        ?>  
                            <div style="padding: 5px; margin-left: 5px; color: #fff; border-radius: 3px; margin-top: 5px; float: left; background-color: #089;"> <?php echo  $cate; ?> </div>
                        <?php endforeach; ?>
                            
                    </td>
                </tr>
                <tr>
                    <th>User File</th>
                    <td>
                        <img style="height:200px; border: 1px solid #ddd; border-radius: 2px; width:400px;" src="<?php echo base_url(); ?>libs/upload_pic/user_reg_file/<?php echo $data->u_file; ?>">    
                    </td>
                </tr>
                <tr>
                    <th>Terms & Condition</th>
                    <td><?php if($data->u_agree == 1): echo "Yes"; else: echo "No"; endif; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php  endforeach; ?>
