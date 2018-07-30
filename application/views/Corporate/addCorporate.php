<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Coroporate Client</li>
    </ol>
</section>
<hr>

<div class="msgMDCreateArea">

 	<?php  $this->load->view('validationAndMessage') ?>

    <div class="committeeSave">
        <form action="<?php echo base_url();?>saveCorporate" class="form-horizontal" enctype="multipart/form-data" method="post">
            

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Company Name</label>
                <div class="col-sm-8">
                    <input name="name"  type="text" class="form-control " placeholder="Company Name">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Details</label>
                <div class="col-sm-8">
                    <textarea name="details" id="txtEditor" placeholder="Details"></textarea>
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Select Image</label>
                <div class="col-sm-5">
                    <input name="image" id="name" type="file" value="" class="form-control">
                </div>
            </div>
			

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-5">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
            </div>
        </form>
    </div>


</div>



    <!--Tender List View-->
    <div class="TenderListView">
            <fieldset>
                <legend>List of corporate client<span style="padding-left:5px;color:#00CC00;"></span> </legend>
                <table id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                         <th>SL.</th>
                         <th>Name</th>
                         <th>Details</th>
                         <th>Logo</th>
                        <th style="width:10%;" colspan="2">Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $s =1;
                        if (isset($fatchClient)) :
                            foreach ($fatchClient as $data) :
                     ?>

                        <tr>
                            <td style="width: 150px; text-align: center; font-size: 15px; "><?php echo $s++; ?> </td>

                             <td style="width: 150px; text-align: center; font-size: 15px; "><?php echo $data->name; ?> </td>

                              <td style="width: 150px; text-align: center; font-size: 15px; "><?php echo $data->details; ?> </td>

                              <td style="width: 100px; text-align: center; font-size: 15px; ">
                                <img style="width:40px; height: 30px;" src="<?php echo base_url(); ?>libs/upload_pic/Corporate_logo/<?php echo $data->pic; ?>">
				
                              </td>

                                                
                              <td>
                                <a href="<?php echo base_url(); ?>e_Corporate/<?php echo $data->id; ?>" class="btn btn-warning btn-xs" title="Edit This"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                                <a onclick="return confirm('Are you sure to delete this message ? ')" 
                            href="<?php echo base_url(); ?>d_Corporate/<?php echo $data->id; ?>/<?php echo $data->pic; ?>"  title="Delete This"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>


                            </td>

                        </tr>


                        <?php
                        endforeach;
                        endif;
                        ?>

                    </tbody>
                </table>
            </fieldset>
    </div>
    <!--End Tender List View-->

</div>