<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<body>


<!-- Breadcrumb -->
    <div class="page-title">
      <div class="row">
        <div class="col s12 m9 l10">
          <h1 style="color: #3867A2; font-weight: bolder;">Photo Gallery</h1><br>
          <ul style="color: #328ed1;">
            <li>
              <a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Home</a>  <i class="fa fa-angle-right"></i>
            </li>

            <li><a href="#">Edit Gallery</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /Breadcrumb -->

		<div class="container">
			  
		    <div class="input-field">
	          	<?php
	          		if(validation_errors()){
	          	?>
	          		<div class="alert">
	          			<?php echo validation_errors(); ?>
	          		</div>
	      		<?php
	      		   	}
	            ?>
	        </div>

	        <div class="input-field">
	          	<?php
	          		if(isset($error_update)){
	          	?>
	          		<div class="alert">
	          			<?php echo $error_update; ?>
	          		</div>
	      		<?php
	      		   	}
	            ?>
	        </div>
	        <?php
			  // var_dump($userInfo);
			  // exit;
			  	if(isset($userInfo)) :
			  	foreach($userInfo as $user) :
			  	echo form_open_multipart('/update_gallery/'.$user->pg_id); 
			  ?>
				 <div class="input-field">
				  	<i class="fa fa-picture-o prefix"></i>
				    <input id="input_fname" type="file" style="padding-top: 10px;" name="image" required="required">
				    <img src="<?php echo base_url(); ?>libs/image/galleryImg/<?php echo $user->pg_pic; ?>" style="height:100px; padding-top: 5px; width:100px;">
				  </div><br>

				  <div class="input-field">
				  	<i class="fa fa-comments-o prefix"></i>
				    <input id="input_fname" value="<?php echo $user->pg_title; ?>"  type="text" name="title" required="required">
				    <label for="input_fname">Gallery Title</label>
				  </div><br>

				  <div class="input-field">
				  	<i class="fa fa-comments-o prefix"></i>
				    <input id="input_fname" type="text" value="<?php echo $user->pg_save_by; ?>"  name="saveby">
				    <label for="input_fname">Upload By : </label>
				    <input type="hidden" name="date" value="<?php echo date("l jS \of F Y") ?>">
				  </div><br>
				
				  <div class="row" style="float: center;">
				    <div class="col">
				      <a href="<?php echo base_url(); ?>add_gallery" class="btn btn-danger">Back</a>   &nbsp; 
				      <button class="waves-effect btn" style="background: green;">Update Gallery</button>
				    </div>
				  </div>

			 
			<?php echo form_close(); 
				endforeach;
				endif;
				?>
		</div>
	
</body>
</html>