<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Category</li>
    </ol>
</section>
<hr>

<div class="msgMDCreateArea">

 <?php $this->load->view('validationAndMessage') ?>
    <div class="committeeSave">
        <?php
            if(isset($editData)) :
            foreach($editData as $data) :
        ?>
          
            <form action="<?php echo base_url();?>update_Category/<?php echo $data->cat_id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-sm-8">
                        <input name="cate" id="name" type="text" value="<?php echo $data->cat_name; ?>" class="form-control" placeholder="Category Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Category Details</label>
                    <div class="col-sm-8">
                        <textarea name="details" id="txtEditor" placeholder="Contact Us"><?php echo $data->details; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <button type="submit" class="btn btn-success pull-right">Update</button>
                    </div>
                </div><br>

            </form>


        <?php endforeach; endif; ?>
            </div>
    </div>
