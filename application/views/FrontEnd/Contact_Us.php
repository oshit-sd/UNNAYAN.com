<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" style="">


  <!-- CONTAIN START ptb-70-->
  <section class="pt-70 client-main align-center">
    <div class="container">
      <div class="contact-info">
        <div class="row m-0">
          <div class="col-sm-6 p-0">
            <div class="contact-box" style="color: #050D64; font-weight: bolder;">
              <div class="contact-icon contact-phone-icon"></div>
              <span><b>Contact Us</b></span>
                <?php
                      if (isset($fatchContactInfo)) :
                      foreach ($fatchContactInfo as $contact) :
                  ?>
                    <p style="color: #000;"><?php echo $contact->details;  ?></p>
                  <?php endforeach;  endif; ?>
            </div>
          </div>
          <!-- <div class="col-sm-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-mail-icon"></div>
              <span><b>Mail</b></span>
              <p>infoservices@MarketShop.com </p>
            </div>
          </div> -->
          <div class="col-sm-6 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-open-icon"></div>
              <span><b>UNNAYAN</b></span>
              <p style="color: #050D64; font-weight: bolder;">We are active in 24 hours.</p>
              <div style="margin-top: 10px;">
                <a target="_blank" href="https://www.facebook.com/" title="Facebook" style="color: #1154C2;">
                  <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                </a> &nbsp;
                <a target="_blank" href="https://twitter.com/" title="Twitter" style="color: #23B5CC;">
                  <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
                </a> &nbsp;
                <a target="_blank" href="https://www.instagram.com/" title="Instagram" style="color: #D45127;">
                  <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="heading-part mb-20">
            <h2 class="main_title">Send Your Feedback!</h2>
          </div>
        </div>
      </div>
      <div class="main-form">
        <div class="row">
          <div class="col-sm-7">
          <form id="contactform" action="<?php echo base_url(); ?>sendFeedback" method="POST" name="contactform" enctype="multipart/form-data">
            <div class="col-sm-6" style="margin-bottom: 10px;">
              <input type="text" required="required" placeholder="Name" name="fbname">
             <span style="font-size: 12px; color: red;"><?php echo form_error('name'); ?></span>
            </div>
            <div class="col-sm-6" style="margin-bottom: 10px;">
              <input type="email" required="required" placeholder="Email" name="email">
             <span style="font-size: 12px; color: red;"><?php echo form_error('email'); ?></span>
            </div>
            <div class="col-sm-6" style="margin-bottom: 10px;">
              <input type="text" required="required" placeholder="Phone" name="phone">
              <span style="font-size: 12px; color: red;"><?php echo form_error('phone'); ?></span>
            </div>
            <div class="col-xs-6 mb-30">
              <input type="text"  placeholder="Member ID ( if any )" name="fb_member_id">
            </div>
            <div class="col-xs-12" style="margin-top: -20px; margin-bottom: 10px;">
              <textarea required="required" placeholder="Message" rows="3" cols="30" name="message"></textarea>
              <span style="font-size: 12px; color: red;"><?php echo form_error('message'); ?></span>
            </div>
            <div class="col-xs-12 mb-30">
              <input type="file" name="ffile">
            </div>
            <div class="col-xs-4">
              <div class="align-center">
                <button type="submit" name="submit" class="btn-color">SEND</button>
              </div>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 


      </div>
    </div>
  </div>
</div>



