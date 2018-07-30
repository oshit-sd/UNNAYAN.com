
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>libs/FrontEnd/engine1/style.css" media="screen" />
<style type="text/css">a#vlb{display:none}</style>
<script type="text/javascript" src="<?php echo base_url(); ?>libs/FrontEnd/engine1/jquery.js"></script>

<div id="wowslider-container1">
    <div class="ws_images" style="margin-left: -20px; margin-top: -10px;">
       
        <?php $i=0; foreach($allSlideImage as $slider): ?>

            <a href="#"><img src="<?php echo base_url(); ?>libs/upload_pic/slider_image/<?php echo $slider->pic; ?>" alt="" title="" id="wows3"/></a>
         <?php endforeach; ?>

     </div>


    <div class="ws_bullets">
        <div>
       
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>libs/FrontEnd/engine1/script.js"></script>
