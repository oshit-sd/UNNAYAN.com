<?php $this->load->view('FrontEnd/partials/header_css'); ?>

<?php $this->load->view('FrontEnd/partials/header_navbar'); ?>
             
  	<?php  
  		if(isset($content)):
          	$this->load->view('FrontEnd/'.$content, TRUE);
        endif;
  	?>

<!-- Footer -->
<?php $this->load->view('FrontEnd/partials/footer'); ?>



  