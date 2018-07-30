
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Approve Post
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Approve Post</li>
    </ol>
</section>
<hr>

<?php $this->load->view('validationAndMessage') ?>

<div class="TenderListView">
    <fieldset>
         <table id="table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Post Type</th>
                <th style="width:10%;">Action</th>

            </tr>
            </thead>
            <tbody>

            <?php 
                if (isset($fatchPostProduct)) :
                    foreach ($fatchPostProduct as $data) :
                        if($data->p_status == 'a'):
             ?>

                <tr>
                    <td style="width: 150px; text-align: center; font-size: 14px; ">
                        <?php echo $data->p_date; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 14px; ">
                        <?php echo $data->p_title; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 14px; ">
                        <?php echo $data->u_name; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 14px; ">
                        <?php echo $data->p_phone; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 14px; ">
                        <?php echo $data->p_email; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 14px; ">
                        <?php if($data->p_user_type == 's'):  echo "Selling"; else: echo "Buying"; endif; ?>
                    </td>
                
                    <td>
                        <a data-toggle="tooltip" href="<?php echo base_url(); ?>viewSinglePost/<?php echo $data->post_id; ?>" title="View"  class="linka fancybox fancybox.ajax btn btn-xs btn-primary" >View</a> 

                        <a data-toggle="tooltip" onclick="deletePost(<?php echo $data->post_id; ?>)"  title="Delete Post"  class="btn btn-xs btn-danger "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>

                </tr>


                <?php endif; endforeach; endif;  ?>

            </tbody>
        </table>
    </fieldset>
</div>


<script type="text/javascript">
    // Delete User
    function deletePost(id)
    {
      var id = id;
      swal({
          text: "Are you sure want to delete this post ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
                $.ajax({
                url: "<?php echo base_url(); ?>post/Post_delete", 
                type: "POST",
                data: {id : id},
                dataType: "JSON",
                success: function(data)
                  {
                    // alert(data);
                    swal({
                            text: "Successfully!",
                            icon: "success",
                            buttons: false,
                            timer: 1000,
                          }); 

                      setTimeout( function() {
                            location.reload();
                         }, 1020);
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      swal({
                            text: "Unsuccessfully!",
                            icon: "error",
                            buttons: false,
                            timer: 1000,
                          }); 

                      setTimeout( function() {
                            location.reload();
                         }, 1020);
                  }
              });
          }
        });
    }
</script>
