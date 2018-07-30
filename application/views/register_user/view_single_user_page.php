

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        User Information
    </h4>
</div>
<hr>
<style type="text/css">
    th{
        width: 150px;
    }
</style>

<?php
    foreach($userData as $data) :
?>         
<div class="col-sm-12" style="width: 450px;">

 <?php $this->load->view('validationAndMessage'); ?>
    <div class="committeeSave">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Full Name</th>
                    <td><?php echo $data->u_name; ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>
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
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $data->u_email; ?></td>
                </tr>
                <tr>
                    <th>NID / PASSPORT</th>
                    <td><?php echo $data->NIDpassNumber; ?></td>
                </tr>
                <tr>
                    <th>Selected Category</th>
                    <td>
                        <?php 
                            foreach($accessCategory as $cate):  
                        ?>  
                            <div style="padding: 5px; margin-left: 5px; color: #fff; border-radius: 3px; margin-top: 5px; float: left; background-color: #089;"> <?php echo  $cate->cat_name; ?> &nbsp; 
                                <a style="color: #F7F45F;" onclick="DeleteCateAccess(<?php echo $cate->acs_id; ?>)">
                                    <i class="fa fa-times-circle"></i> 
                                </a> 
                            </div>
                        <?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <th>User Uploaded File</th>
                    <td>
                      <?php if($data->u_file): ?>
                        <a style="font-weight: bold;" href="<?php echo base_url(); ?>libs/upload_pic/user_reg_file/<?php echo $data->u_file; ?>" download>Download File</a>
                      <?php else: ?>
                        NO FILE
                      <?php endif; ?>

                        <!-- <img style="height:200px; border: 1px solid #ddd; border-radius: 2px; width:400px;" src="<?php echo base_url(); ?>libs/upload_pic/user_reg_file/<?php echo $data->u_file; ?>">  -->   
                    </td>
                </tr>
                <tr>
                    <th>Terms & Condition</th>
                    <td><?php if($data->u_agree == 1): echo "Yes"; else: echo "No"; endif; ?></td>
                </tr>
            </tbody>
        </table>
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

