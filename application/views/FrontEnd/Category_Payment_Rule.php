<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" style="">

		<div class="row" style="margin-top: 10px;">
          <div class="col-xs-12">
            <div class="heading-part heading-bg mb-30">
              <h2 class="heading m-0">Category Payment Rule</h2>
            </div>
          </div>
        </div>

		<div class="row" style="">
          <div class="col-xs-12">
            <?php
	            if (isset($CategoryPayRule)) :
	            foreach ($CategoryPayRule as $details) :
	        ?>
  	        	<div style="font-size: 15px; color: #000;">
                  <?php echo $details->cd_details; ?>
                  <br>
                  
              </div>
            <?php endforeach;  endif; ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>