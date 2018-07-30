
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
                url: "<?php echo base_url(); ?>Post/user_Post_delete", 
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


    function changePassword(id)
    {
      $.ajax({
          url : "<?php echo base_url(); ?>Users/user_change_password/"+id,
          type: "POST",
          data: $('#ChangePassForm').serialize(),
          dataType: "JSON",
          success: function(data)
          {
            //alert(data);
            $('#ChangePassForm')[0].reset();
            swal({
                text: "Change Successfully!",
                icon: "success",
                buttons: false,
                timer: 1200,
              }); 

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            $('#ChangePassForm')[0].reset();
            swal({
              text: "Unsuccessfully!",
              icon: "error",
              buttons: false,
              timer: 1300,
            }); 
          }
      });
    }









</script>
