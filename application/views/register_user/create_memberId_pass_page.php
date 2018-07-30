

<!-- Content Header (Page header) -->
<div class="header">
    <h4 style="margin-left: 10px;">
        Create Member ID / Password
    </h4>
</div>
<hr>

<?php
    foreach($userData as $data) :
?>         
<div class="col-sm-12" style="width: 400px;">

 <?php $this->load->view('validationAndMessage'); ?>
    <div class="committeeSave">
        <form id="MemberForm" class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
                <label for="mId" class="col-sm-4 control-label">Member ID</label>
                <div class="col-sm-6">
                    <input name="mId" id="mId" type="text" class="form-control" placeholder="Member ID" value="<?php echo $data->u_member_id;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Password</label>
                <div class="col-sm-6">
                    <input name="password" id="password" type="password" required class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="date" class="col-sm-4 control-label">Expiration Date</label>
                <div class="col-sm-6">
                    <input name="date" id="datepicker" type="text" class="form-control" value="<?php if($data->u_validity): echo $data->u_validity; else: echo date('Y-m-d'); endif; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="button" onclick="updateMemberID(<?php echo $data->user_id; ?>)" class="btn btn-success pull-right">Submit</button>
                </div>
            </div><br>

        </form>
    </div>
    <?php  endforeach; ?>


<script type="text/javascript">
    

    // Update Member ID Pass==========================
    function updateMemberID(id)
    {
        $.ajax({
            url : "<?php echo base_url(); ?>users/update_Member_Id_Pass/"+id,
            type: "POST",
            data: $('#MemberForm').serialize(),
            dataType: "JSON",
            success: function(data)
            {
              //alert(data);
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
                      timer:1200,
                    }); 

                setTimeout( function() {
                      location.reload();
                   }, 1220);
            }
        });
    }


</script>