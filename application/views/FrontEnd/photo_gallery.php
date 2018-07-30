<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" style="">

		<div class="row" style="margin-top: 10px;">
          <div class="col-xs-12">
            <div class="heading-part heading-bg mb-30">
              <h2 class="heading m-0">Photo Gallery</h2>
            </div>
          </div>
        </div>

		<div class="row" style="">
          <div class="col-xs-12" style="margin-top: -20px;">

			    <?php foreach ($fatchGalleryImage as $atbl_photogallery):
			    ?>      

			    <div style="width: 156px; height: 120px; margin: 9px; float: left;">
			        <div class="product-box">
			            <span class="sale_tag"></span>
			            <p>
			                <a href="<?php echo base_url(); ?>libs/upload_pic/gallery_pic/<?php echo $atbl_photogallery->pic; ?>" data-lightbox="example-set" data-title="<?php echo $atbl_photogallery->title; ?>">
			                <img style="width:100%;height: 120px;" title="<?php echo $atbl_photogallery->title; ?>" class="example-image img img-thumbnail" src="<?php echo base_url(); ?>libs/upload_pic/gallery_pic/<?php echo $atbl_photogallery->pic; ?>"/>
			            </a>
			        </p>
			        </div>
			    </div>

			  
			  	<?php endforeach; ?>
			</div>
		</div>

      </div>
    </div>
  </div>
</div>


<link rel="stylesheet" href="<?php echo base_url(); ?>libs/FrontEnd/dist/css/lightbox.min.css">  
<script src="<?php echo base_url(); ?>libs/FrontEnd/dist/js/lightbox-plus-jquery.min.js"></script>