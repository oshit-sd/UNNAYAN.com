
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category Details</li>
    </ol>
</section>
<hr>

<div class="msgMDCreateArea">

 	<?php $this->load->view('validationAndMessage'); ?>
   
   <?php
	$count = $this->db->from("tbl_category_details")->count_all_results();
	  	if ($count == 1) :	
			if (isset($fatchData)) :
			  	foreach ($fatchData as $data) :
	  ?>
    <div class="committeeSave">
        <form action="<?php echo base_url();?>update_CategoryDetails/<?php echo $data->cd_id; ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Category Details</label>
                <div class="col-sm-8">
                    <textarea name="details" id="txtEditor" placeholder="Category Details"><?php echo $data->cd_details; ?></textarea>
                </div>
            </div>
			
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div>
            </div>
        </form>
    </div>



	<?php  
	    endforeach;
	    endif;
	    endif;
	    if ($count == 0) :
	  ?>

    <div class="committeeSave">
        <form action="<?php echo base_url();?>saveCategoryDetails" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Category Details</label>
                <div class="col-sm-8">
                    <textarea name="details" id="txtEditor" placeholder="Category Details"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
            </div>
        </form>
    </div>
 	<?php  endif; ?>



</script>

</div>