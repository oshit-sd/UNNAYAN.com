<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sub Category</li>
    </ol>
</section>
<hr>

<div class="msgMDCreateArea">

 <?php $this->load->view('validationAndMessage'); ?>
    <div class="committeeSave">
        <form action="<?php echo base_url();?>saveSubCategory" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-4">
                    <select name="category" required="required" class="form-control">
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
                <label for="name" class="col-sm-2 control-label">Sub Category Name</label>
                <div class="col-sm-4">
                    <input name="subCategory" id="name" type="text" value="" class="form-control" placeholder="Sub Category Name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                </div>
            </div>

        </form>
    </div>



    <!--Tender List View-->
    <div class="TenderListView">
            <fieldset>
                <legend>Sub Category List<span style="padding-left:5px;color:#00CC00;"></span> </legend>
                <table  id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                         <th>SL NO.</th>
                         <th>Category Name</th>
                         <th>Sub Category Name</th>
                        <th style="width:10%;">Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $i=1;
                        if (isset($SubCategoryList)) :
                            foreach ($SubCategoryList as $data) :
                     ?>

                        <tr>
                            <td style="width: 10% ; text-align: center; font-size: 15px; ">
                                <?php echo $i++; ?>
                             </td>
                            <td style="width: 150px; text-align: center; font-size: 15px; ">
                                <?php echo $data->cat_name; ?>
                              </td>
                            <td style="width: 150px; text-align: center; font-size: 15px; ">
                                <?php echo $data->sub_category_name; ?>
                              </td>
                  
                              <td>
            
                                <a class="linka fancybox fancybox.ajax btn btn-warning" href="<?php echo base_url(); ?>e_SubCategory/<?php echo $data->sub_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

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