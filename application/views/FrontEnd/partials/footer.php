  <!-- FOOTER START -->
  <div class="footer dark-bg">
    <div class="container"  style="margin-top: -35px; margin-bottom: -45px;">
      <div class="footer-inner" >
     
        <div class="footer-middle"  style="margin-top: 0px;"> 
          <div class="row">
            <div class="col-md-4 f-col">
             <div class="footer-static-block"> <span class="opener plus"></span>
                <div class="f-logo"> <a href="" class=""> 
                  <img style="height: 80px; width: 100px; border-radius: 5px;" src="<?php echo base_url(); ?>libs/logo_image/logo.jpg"> </a> 
                 
                </div>
                <div class="footer-block-contant" style="margin-top: -30px;">
                   <?php
                        if (isset($fatchAboutus)) :
                        foreach ($fatchAboutus as $about) :
                    ?>
                      <p><?php echo $about->details; ?></p>
                    <?php endforeach;  endif; ?>

                </div>
              </div>
             </div>
            <div class="col-md-8">
            <div class="row">
              <div class="col-md-4 f-col">
               <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">Main Menu</h3>
              <ul class="footer-block-contant link">
                 <li>
                  <a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>AboutUs">About Us</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>FAQ">FAQ</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>Payment">Payment</a>
                </li>
                <li>    
                  <a href="<?php echo base_url(); ?>TermsCondition">Terms & Conditions</a>
                </li>
              </ul>
                </div>
              </div>
              <div class="col-md-4 f-col">
                <div class="footer-static-block"> <span class="opener plus"></span>
                  <h3 class="title">Quick Access</h3>
                  <ul class="footer-block-contant link">
                    <li><a href="<?php echo base_url() ?>User-Dashboard">My Account</a></li>
                    <li><a href="<?php echo base_url(); ?>PhotoGallery">Photo Gallery</a></li>
                    <li>
                    <li><a href="<?php echo base_url() ?>CorporateClient">Corporate Client</a></li>
                      <a href="<?php echo base_url(); ?>Services">Services</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url(); ?>UserComment">Comment</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 f-col">
               <div class="footer-static-block"> <span class="opener plus"></span>
                  <h3 class="title">Address</h3>
                  <ul class="footer-block-contant address-footer">
                    <li class="item"> <i class="fa fa-home"> </i>
                      <?php
                        if (isset($fatchcontact)) :
                        foreach ($fatchcontact as $contact) :
                    ?>
                      <p><?php echo $contact->details; ?></p>
                    <?php endforeach;  endif; ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row"> 
          <div class="col-md-6 col-sm-6 center-sm">
            <div class="copy-right" style="font-weight: bolder; color: #089;">© 2018  All Rights Reserved by UNNAYAN</div>
          </div>
          <div class="col-md-6 col-sm-6">
          <div class="payment float-none-xs center-sm">
            <ul class="payment_icon">
             <!--  <li class="discover"><a></a></li>
              <li class="visa"><a></a></li>
              <li class="mastro"><a></a></li>
              <li class="paypal"><a></a></li> -->
              <li><a style="width: 80px; height: 30px;"><img src="<?php echo base_url(); ?>libs/logo_image/bank.png"></a></li>
              <li><a style="width: 90px;  height: 30px;"><img src="<?php echo base_url(); ?>libs/logo_image/bKash.jpg"></a></li>
              <li><a style="width: 130px;  height: 40px;"><img src="<?php echo base_url(); ?>libs/logo_image/paypal-logo.png"></a></li>
            </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-top">
    <div id="scrollup"></div>
  </div>
  <!-- FOOTER END --> 
  </div>

  <!-- Slider -->
  <script src="<?php echo base_url(); ?>libs/FrontEnd/engine1/jquery.js"></script>
  <script src="<?php echo base_url(); ?>libs/FrontEnd/engine1/wowslider.js"></script>
  <script src="<?php echo base_url(); ?>libs/FrontEnd/engine1/script.js"></script>

  
<script src="<?php echo base_url(); ?>libs/FrontEnd/js/jquery-1.12.3.min.js"></script> 
<script src="<?php echo base_url(); ?>libs/FrontEnd/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>libs/FrontEnd/js/jquery-ui.min.js"></script> 
<script src="<?php echo base_url(); ?>libs/FrontEnd/js/fotorama.js"></script>
<script src="<?php echo base_url(); ?>libs/FrontEnd/js/jquery.magnific-popup.js"></script>  
<script src="<?php echo base_url(); ?>libs/FrontEnd/js/owl.carousel.min.js"></script> 
<script src="<?php echo base_url(); ?>libs/FrontEnd/js/custom.js"></script>

<script>
  /* ------------ Newslater-popup JS Start ------------- */
  // $(window).load(function() {
  //   $.magnificPopup.open({
  //     items: {src: '#newslater-popup'},type: 'inline'}, 0);
  // });
    /* ------------ Newslater-popup JS End ------------- */
</script>

<?php $this->load->view('validationAndMessage') ?>

  
  
  <script>
  
  $(window).scroll(function() {
  var len=$(window).scrollTop();
	$('#floatintdiv').css('top',len+200);
});	
</script>
		
  <div id="floatintdiv" style="position:absolute;right:0px;top:200px;min-width:30px;min-height:100px;overflow:hidden;z-index:10000;transition:top 2s;">

  <!-- mibew button --><a id="mibew-agent-button" href="/mibew/chat?locale=en" target="_blank" onclick="Mibew.Objects.ChatPopups['5af042db637871c8'].open();return false;"><img style="border-radius:6px;" src="/mibew/b?i=mgreen&amp;lang=en" border="0" alt="" /></a><script type="text/javascript" src="/mibew/js/compiled/chat_popup.js"></script><script type="text/javascript">Mibew.ChatPopup.init({"id":"5af042db637871c8","url":"\/mibew\/chat?locale=en","preferIFrame":true,"modSecurity":false,"forceSecure":false,"width":640,"height":480,"resizable":true,"styleLoader":"\/mibew\/chat\/style\/popup"});</script><!-- / mibew button -->
  
  </div>
  
  
  
  
  


<!-- For Fancy Box -->
<script type="text/javascript" src="<?php echo base_url()?>libs/BackEnd/fancyBox/js/jquery.fancybox.js?v=2.1.5"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>libs/BackEnd/fancyBox/css/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">

        $(document).ready(function() {

            $('.fancybox').fancybox({

            padding: 0,

                openEffect : 'elastic',

                openSpeed  : 150,

                closeEffect : 'elastic',

                closeSpeed  : 150,

                maxWidth    : "60%",

                autoSize    : true,

                autoScale   : true,

                fitToView   : true,

                helpers : {

                    title : {

                        type : 'inside'

                    },

                    overlay : {

                        css : {

                            'background' : 'rgba(0,0,0,0.3)'

                        }

                    }

                }       

            });

            $('.fancyboxview').fancybox({

            padding: 0,

                openEffect : 'elastic',

                openSpeed  : 150,



                closeEffect : 'elastic',

                closeSpeed  : 150,

                maxWidth    : "95%",

                autoSize    : true,

                autoScale   : true,

                fitToView   : true,



                helpers : {

                    title : {

                        type : 'inside'

                    },

                    overlay : {

                        css : {

                            'background' : 'rgba(0,0,0,0.3)'

                        }

                    }

                }       

            });

        });    

</script>





</body>

<!-- Mirrored from aaryaweb.info/html/marketshop/mrk001/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Apr 2018 03:30:04 GMT -->
</html>

