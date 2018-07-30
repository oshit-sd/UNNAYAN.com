

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        More Category Access
    </h4>
</div>
<hr>

<?php
    foreach($userData as $data) :
?>         
<div class="col-sm-12" style="width: 600px;">

 <?php $this->load->view('validationAndMessage'); ?>
    <div class="committeeSave">
        <form action="<?php echo base_url(); ?>insertCategoryAccess" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">User Access Category</label>
                <div class="col-sm-8">

	               <?php foreach($accessCategory as $cate): ?>

               			<div style="padding: 5px; margin-left: 5px; color: #fff; border-radius: 3px; margin-top: 5px; float: left; background-color: #089;"> <?php echo  $cate->cat_name; ?> &nbsp; 
                            <a style="color: #F7F45F;" onclick="DeleteCateAccess(<?php echo $cate->acs_id; ?>)">
                                <i class="fa fa-times-circle"></i> 
                            </a> 
                        </div>
               			
               		<?php endforeach; ?>

	            </div>
            </div>

            <input type="hidden" name="userID" value="<?php echo $cate->acs_user_id; ?>">

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Add Access Category</label>
                <div class="col-sm-8">

               		<?php foreach($withoutAccessCategory as $category):?>

	               		<div style="padding: 8px; float: left;">
	                   		<input type="checkbox" value="<?php echo $category->cat_id; ?>" name="category[]"> <?php echo $category->cat_name; ?> 
	               		</div>

               		<?php endforeach; ?>

	            </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="Submit"  class="btn btn-success pull-right">Submit</button>
                </div>
            </div><br>

        </form>
    </div>
    <?php  endforeach; ?>



<script type="text/javascript">

    // Delete Category Access============================
    function DeleteCateAccess(id)
    {
      var id = id;
      swal({
          text: "Are you sure want to delete this category ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
                $.ajax({
                url : "<?php echo base_url(); ?>users/Delete_Cate_Access/"+id,
	            type: "POST",
	            dataType: "JSON",
                success: function(data)
                  {
                    swal({
                            text: "Successfully!",
                            icon: "success",
                            buttons: false,
                            timer: 1200,
                          }); 

                      setTimeout( function() {
                            location.reload();
                         }, 1220);
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      swal({
                            text: "Unsuccessfully!",
                            icon: "error",
                            buttons: false,
                            timer: 1200,
                          }); 

                      setTimeout( function() {
                            location.reload();
                         }, 1220);
                  }
              });
          }
        });
    }
</script>




