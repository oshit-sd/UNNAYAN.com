
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       User Comment
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Comment</li>
    </ol>
</section>
<hr>

<?php $this->load->view('validationAndMessage') ?>

<div class="TenderListView">
    <fieldset>
         <table id="table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="width: 12%;">Date</th>
                <th style="width: 25%;">Name</th>
                <th>Comment</th>
                <th style="width: 1%;">Action</th>
            </tr>
            </thead>
            <tbody>

            <?php 
                if (isset($allSeenData)) :
                    foreach ($allSeenData as $data) :
             ?>

                <tr>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php echo $data->date; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php echo $data->u_name; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php echo $data->comment; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 15px;">
                        <a onclick="return confirm('Are you sure to delete this comment ? ')" 
                            href="<?php echo base_url(); ?>d_comment/<?php echo $data->id; ?>"  title="Delete This"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>


                <?php endforeach; endif;  ?>

            </tbody>
        </table>
    </fieldset>
</div>
