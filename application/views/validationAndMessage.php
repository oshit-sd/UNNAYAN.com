
        <?php
            if(validation_errors()){
        ?>
             <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo validation_errors(); ?>
            </div>
        <?php
            }
        ?>

    <!--Alert List-->
   <?php if($alert = $this->session->flashdata('message')): ?>
       <script type="text/javascript">
          swal({
                text: "<?php echo $this->session->flashdata('message'); ?>",
                icon: "success",
                buttons: false,
                timer: 1200,
              }); 

          setTimeout( function() {
                  //window.location.href = "signIn";
               },1220);
        </script>
  <?php endif; ?>

    <?php if($alert = $this->session->flashdata('message2')): ?>
        <script type="text/javascript">
            swal({
                  text: "<?php echo $this->session->flashdata('message2'); ?>",
                  icon: "error",
                  buttons: false,
                  timer: 1200,
                });
        </script>
    <?php endif; ?>


     <?php if($alert = $this->session->flashdata('signUp')): ?>
        <script type="text/javascript">
            swal({
                  text: "<?php echo $this->session->flashdata('signUp'); ?>",
                  icon: "success",
                  buttons: true,
                  timer: 2500,
                });
        </script>
    <?php endif; ?>


     <?php if($alert = $this->session->flashdata('postCheck')): ?>
        <script type="text/javascript">
            swal({
                  text: "<?php echo $this->session->flashdata('postCheck'); ?>",
                  icon: "warning",
                  dangerMode: true,
                  buttons: true,
                  timer: 3500,
                });
        </script>
    <?php endif; ?>
<!--End Alert List-->

