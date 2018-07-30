

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        Product Information
    </h4>
</div>
<hr>
<style type="text/css">
    th{
        width: 150px;
    }
</style>

<?php
    foreach($postData as $data) :
?>         
<div class="col-sm-12" style="width: 580px;">

 <?php $this->load->view('validationAndMessage'); ?>
    <div class="committeeSave">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td><?php echo $data->u_name; ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo $data->p_phone; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $data->p_email; ?></td>
                </tr>
                <tr>
                    <th>Product Title</th>
                    <td><?php echo $data->p_title; ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>
                        <?php 
                            echo number_format($data->p_price); 


                            $qu = $this->db->where('id',$data->p_price_type)->get('pricetype');
                            $type = $qu->row();

                            if(isset($type->price_type)):
                                echo " - ";
                                echo $type->price_type;
                            endif;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><?php echo $data->cat_name; ?></td>
                </tr>
                <tr>
                    <th>Sub-category</th>
                    <td><?php echo $data->sub_category_name; ?></td>
                </tr>
                <tr>
                    <th>Product Details</th>
                    <td style="text-align: justify;"><?php echo $data->p_details; ?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><?php echo $data->p_date; ?></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td><?php echo $data->country_name; ?></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><?php echo $data->city_name; ?></td>
                </tr>
                <tr>
                    <th>Zone</th>
                    <td><?php echo $data->area_name; ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo $data->p_address; ?></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <div style="height: 80px; width: 90px; float: left;">
                            <?php if($data->p_pic1 != 0): ?>
                                <img style="height:70px; border: 1px solid #ddd; border-radius: 2px; width:80px;" src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic1; ?>"> 
                            <?php else: ?>
                                <img  style="height:70px; width:80px;" src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
                            <?php endif; ?>
                        </div>
                        <div style="height: 80px; width: 90px; float: left;">
                            <?php if($data->p_pic2 != 0): ?>
                                <img style="height:70px; border: 1px solid #ddd; border-radius: 2px; width:80px;" src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic2; ?>"> 
                            <?php else: ?>
                                <img style="height:70px; width:80px;" src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
                            <?php endif; ?>
                        </div>
                        <div style="height: 80px; width: 90px; float: left;">
                            <?php if($data->p_pic3 != 0): ?>
                                <img style="height:70px; border: 1px solid #ddd; border-radius: 2px; width:80px;" src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic3; ?>"> 
                            <?php else: ?>
                                <img  style="height:70px; width:80px;" src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
                            <?php endif; ?>
                        </div>
                        <div style="height: 80px; width: 90px; float: left;">
                            <?php if($data->p_pic4 != 0): ?>
                                <img style="height:70px; border: 1px solid #ddd; border-radius: 2px; width:80px;" src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic4; ?>"> 
                            <?php else: ?>
                                <img  style="height:70px; width:80px;" src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th>File</th>
                    <td>
                        <?php if($data->p_file_upload != 0): ?>
                            <a style="color: #089;" href="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_file_upload; ?>" download >Download</a>
                        <?php else: ?> No File <?php endif; ?>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <?php  endforeach; ?>
