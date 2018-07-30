<?php $this->load->view('FrontEnd/partials/header_css'); ?>

<?php $this->load->view('FrontEnd/user_dashboard/partials/header_navbar'); ?>
             
    <?php  
      if(isset($content)):
            $this->load->view('FrontEnd/user_dashboard/'.$content, TRUE);
        endif;
    ?>

<!-- Footer -->
<?php $this->load->view('FrontEnd/partials/footer'); ?>

