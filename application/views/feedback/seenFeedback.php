
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       User Feedback
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Feedback</li>
    </ol>
</section>
<hr>

<?php $this->load->view('validationAndMessage') ?>

<div class="TenderListView">
    <fieldset>
         <table id="table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Member ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Message</th>
                <th>File</th>
            </tr>
            </thead>
            <tbody>

            <?php 
                if (isset($allSeenData)) :
                    foreach ($allSeenData as $data) :
             ?>

                <tr>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php echo $data->fb_member_id; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php echo $data->fb_name; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php echo $data->fb_phone; ?>
                    </td>

                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php echo $data->fb_email; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php echo $data->fb_message; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php if($data->fb_file != 0): ?>
                            <a href="<?php echo base_url(); ?>libs/upload_pic/feddback_file/<?php echo $data->fb_file; ?>" download>Download</a>
                        <?php else: ?>
                            No File 
                        <?php endif; ?>
                    </td>


                </tr>


                <?php endforeach; endif;  ?>

            </tbody>
        </table>
    </fieldset>
</div>
