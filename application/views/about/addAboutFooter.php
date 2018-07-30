
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">About Us in Footer</li>
    </ol>
</section>
<hr>

<div class="msgMDCreateArea">

 	<?php $this->load->view('validationAndMessage') ?>
   
   <?php
	$count = $this->db->from("footer_about_us")->count_all_results();
	  	if ($count == 1) :	
			if (isset($fatchAllData)) :
			  	foreach ($fatchAllData as $data) :
	  ?>
    <div class="committeeSave">
        <form action="<?php echo base_url();?>footer_aboutUs_update/<?php echo $data->id; ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">About US</label>
                <div class="col-sm-8">
                    <textarea name="details" id="txtEditor" placeholder="About Us"><?php echo $data->details; ?></textarea>
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
        <form action="<?php echo base_url();?>savefooter_aboutUs" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">About US</label>
                <div class="col-sm-8">
                    <textarea name="details" id="txtEditor" placeholder="About Us"></textarea>
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