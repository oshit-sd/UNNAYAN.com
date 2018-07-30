<script type="text/javascript">

function validateForm() {
    var x = document.forms["Registerform"]["agree"];
    if (x.checked == false) {
         swal({
          text: "Please select i agree all terms & condition !",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          timer: 2500,
        }); 
        return false;
    }
}





	// SignIn User
	function SignIn(){
    var isvalid = true;
        $('#SignInForm :input[required]').each(function () {
            var id = this.id; 
            $('#error' + id).remove(); //this code use in, required text no repeat
            if (this.value.trim() === '') {

                 $('#' + id).next('span').after("<span id='error" + id + "' class='errorTag' style='color:red; font-size:12px; font-weight:bold;'> &nbsp; Required this field ! </span>");
                isvalid = false; 
            }
        });

        if (isvalid) {
  		    $.ajax({
              url : "<?php echo base_url(); ?>Users/login_user_data_check",
              type: "POST",
              data: $('#SignInForm').serialize(),
              dataType: "JSON",
              success: function(data)
              {
                  //alert(data);
                  if(data){
                    swal({
                        text: "Login Successfully!",
                        icon: "success",
                        buttons: false,
                        timer: 1000,
                      }); 

                    setTimeout( function() {
                        window.location.href = "<?php echo base_url();?>User-Dashboard";
                     }, 1020);
                  }
                  else{
                    swal({
                      text: "Invalid Member ID or Password!",
                      icon: "error",
                      buttons: true,
                      dangerMode: true,
                      timer: 2300,
                    }); 
                  }
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  swal({
                    text: "Please renew your membership!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                    timer: 2300,
                  }); 
              }
          });
      }
	}






  // Regester Code

  


  function registerUser() {
        var isvalid = true;
        $('#Registerform :input[required]').each(function () {
            var id = this.id; 
            $('#error' + id).remove(); //this code use in, required text no repeat
            if (this.value.trim() === '') {

                 $('#' + id).next('span').after("<span id='error" + id + "' class='errorTag' style='color:red; font-size:11px; font-weight:bold;'> &nbsp; Required this field ! </span>");
                isvalid = false; 
            }
        });

        if (isvalid) {
          var agree = document.getElementById("agree");
          //alert(agree);
           if (agree.checked == true){
            $.ajax({
              url : "<?php echo base_url(); ?>Users/register_user_data_check",
              type: "POST",
              data: $('#Registerform').serialize(),
              dataType: "JSON",
              success: function(data)
              {
                $('#Registerform')[0].reset();
                  swal({
                      text: "Registation Successfully! We will contact soon",
                      icon: "success",
                      buttons: true,
                      //timer: 2000,
                    }); 
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  swal({
                      text: "Something went wrong!",
                      icon: "error",
                      buttons: false,
                      timer: 1200,
                    });
              }
          });
        }
        else{ 
          swal({
              text: "Please select agree all terms & condition !",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              timer: 2500,
            }); 
        }
    }
  }



</script>