

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        Update Sub Category
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
        <form action="<?php echo base_url();?>update_SubCategory/<?php echo $data->sub_id ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Category Name</label>
                <div class="col-sm-6">
                    <select name="category" required="required" class="form-control">
                        <option value="<?php echo $data->cat_id; ?>"><?php echo $data->cat_name; ?></option>
                        <option value="">Select a category</option>

                        <?php foreach($categoryList as $category): ?>
                            <option value="<?php echo $category->cat_id; ?>">
                                <?php echo $category->cat_name;  ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Sub Category Name</label>
                <div class="col-sm-6">
                    <input name="subCategory" id="name" type="text" value="<?php echo $data->sub_category_name; ?>" class="form-control" placeholder="Sub Category Name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div>
            </div><br>

        </form>
    </div>

    <?php 
		endforeach;
		endif;
	?>