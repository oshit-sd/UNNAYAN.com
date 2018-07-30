
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pending Register User
        <!--<small>Control panel</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pending Register User</li>
    </ol>
</section>
<hr>

<?php $this->load->view('validationAndMessage') ?>

<div class="TenderListView">
    <fieldset>
         <table id="table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th style="width:13%;">Action</th>

            </tr>
            </thead>
            <tbody>

            <?php 
                if (isset($fatchUserList)) :
                    foreach ($fatchUserList as $data) :
                        if($data->u_status === 'p'):
             ?>

                <tr>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php echo $data->u_name; ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                       <?php
                        $qu = $this->db->where('id',$data->u_phone_code)->get('tbl_phone_code');
                        $res = $qu->row();
                        if (isset($res->phone_code)) {
                          $code = $res->phone_code;

                         echo $code.$data->u_phone;
                        }else{
                          echo $data->u_phone;
                        }
                        ?>
                    </td>
                    <td style="width: 150px; text-align: center; font-size: 15px; ">
                        <?php echo $data->u_email; ?>
                    </td>

                                        
                    <td>                         

                        <a data-toggle="tooltip" href="<?php echo base_url(); ?>viewSingleUser/<?php echo $data->user_id; ?>" title="View"  class="linka fancybox fancybox.ajax btn btn-xs btn-primary" >View</a> 


                        <a data-toggle="tooltip" href="<?php echo base_url(); ?>member_Id_pass/<?php echo $data->user_id; ?>" title="Create Member ID Pass"  class="linka fancybox fancybox.ajax  btn btn-xs btn-success" ><i class="fa fa-cog" aria-hidden="true"></i></a>&nbsp;

                        <a data-toggle="tooltip" onclick="deleteUser(<?php echo $data->user_id; ?>)"  title="Delete User"  class="btn btn-xs btn-danger "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>

                </tr>


                <?php endif; endforeach; endif;  ?>

            </tbody>
        </table>
    </fieldset>
</div>


<script type="text/javascript">
    // Delete User
    function deleteUser(id)
    {
      var id = id;
      swal({
          text: "Are you sure want to delete this user ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
                $.ajax({
                url: "<?php echo base_url(); ?>users/user_delete", 
                type: "POST",
                data: {id : id},
                dataType: "JSON",
                success: function(data)
                  {
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
