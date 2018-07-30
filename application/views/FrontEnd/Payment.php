<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" style="">

      <?php if($alert = $this->session->flashdata('regComplete')): ?>
      <div class="row" style="margin-top: 10px;">
        <div class="col-xs-12">
          <div class="heading-part heading-bg mb-30">
            <h2 class="heading m-0">To complete registration, please make payment for your membership</h2>
          </div>
        </div>
      </div>
      <?php else: ?>

      <div class="row" style="margin-top: 10px;">
        <div class="col-xs-12">
          <div class="heading-part heading-bg mb-30">
            <h2 class="heading m-0">Payment</h2>
          </div>
        </div>
      </div>
      <?php endif; ?>


  		<div class="row" style="">
          <div class="col-xs-12" style="margin-top: -20px;">
            <?php
	            if (isset($fatchPayment)) :
	            foreach ($fatchPayment as $pay) :
	        ?>
	        	<div style="font-size: 14px; color: #000;">
                    <?php echo $pay->details; ?>
                </div>
            <?php endforeach;  endif; ?>
          </div>
        </div>

        

      </div>
    </div>
  </div>
</div>