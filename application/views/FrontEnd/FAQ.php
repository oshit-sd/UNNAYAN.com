<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" style="">

		<div class="row" style="margin-top: 10px;">
          <div class="col-xs-12">
            <div class="heading-part heading-bg mb-30">
              <h2 class="heading m-0">FAQ</h2>
            </div>
          </div>
        </div>

		<div class="row" style="">
          <div class="col-xs-12" style="margin-top: -20px;">
            <?php
	            if (isset($fatchFaq)) :
	            foreach ($fatchFaq as $Faq) :
	        ?>
	        	<div style="font-size: 14px; color: #000;">
                    <?php echo $Faq->details; ?>
                </div>
            <?php endforeach;  endif; ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>