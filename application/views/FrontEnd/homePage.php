  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>

  <!-- BANNER STRAT -->
  <div class="banner" style="margin-left: 15px;">
    <div class="container">
      <div class="row m-0">
        <div class="col-md-3"></div>
        <div class="col-md-9 p-0">
          <div class="main-banner">

            <!-- Slider Start -->
            <div class="banner1" style=" height: 282px; border-bottom: 3px solid #ddd;" > 
              
              <?php $this->load->view('FrontEnd/partials/slider'); ?>

            </div>
            <!-- End Slider -->

          </div>

          <div style="height: 15px;" class="col-md-12 p-0"></div>

          
          <!-- Start Content -->
          <div style="" class="col-md-12 mainContent">
              <div class="row titeLocation" style=""><img src="<?php echo base_url(); ?>libs/FrontEnd/images/map_pin.svg" style="height: 25px; width: 25px;"> PLEASE SELECT YOUR LOCATION</div>

               <!-- <div style="" class="row locationTxt"><h2 style="color: #222; font-size: 15px; font-weight: bold; ">All Locations</h2></div> -->

               <div id="tabs">
                    <ul>
                      <?php $i=1; foreach($fatchCountry as $country): ?>
                          <li>
                            <a class="Bbutton" href="#tabs-<?php echo $i++; ?>"><?php echo $country->country_name; ?></a>
                          </li>
                       <?php endforeach; ?>
                    </ul>

                     <!-- <div style="" class="row locationTxt"><h2 style="color: #222; font-size: 15px; font-weight: bold; ">All Locations</h2></div> -->
                    
                    <?php
                    $uType = $this->session->userdata('user_type');
                    if($uType): $uType = $uType; else: $uType = 0; endif;
                    $i=1; foreach($fatchCountry as $country): ?>
                        <div style="min-height: 600px;" id="tabs-<?php echo $i++; ?>">
                          <?php foreach($fatchCity as $city): if($city->country_id == $country->ct_id):
                          $cityID  = $city->cty_id;
                          $cityid = strtr(base64_encode($cityID), '+/=', '_-.');?>

			                         <a  href="<?php echo base_url(); ?>CityProduct/<?php echo $cityid; ?>/<?php echo $uType; ?>/<?php echo $city->city_name; ?>">

                              	<div style="height: 50px;  padding: 5px;  width: 50%; border-right:1px solid #d4d4d4; float: left;">
                              
                                <div style="border:1px solid #ddd;  color:#fff; text-align:center; padding: 8px; border-radius: 3px; width: 70%; background-color: #2167E5; margin:auto;">
                                    <?php echo $city->city_name; ?>
                                </div>
                                
                              </div>
                              </a>

                               <!--  <a href="<?php echo base_url(); ?>CityProduct/<?php echo $city->cty_id; ?>"  class="areaBox">
                                  <div class="areaName"><?php echo $city->city_name; ?></div>
                                </a> -->
                                        
                          <?php endif; endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>






              <?php if(isset($fatchArea)): foreach($fatchArea as $area): ?>
              <!-- <div class="col-md-4 col-sm-4 col-xs-6 plr-20" style="border-right: 1px solid #ddd;">
                  <a href="#"><div class="areaName"><?php echo $area->area_name; ?></div></a>
              </div> -->
            <?php endforeach; endif; ?>


              <div style="height: 25px;" class="col-md-12 p-0"></div> 
           </div>


           </div>
          </div> 
      </div>
    </div>
  </div>
  <!-- BANNER END --> 


<style type="text/css">    
  @media only screen and (max-width: 995px) {
      
    .banner1{
      display: none;
    }
  }
</style>



<style type="text/css">
  .mainContent{
    height: auto; background-color: #f9f9f9; 
    margin-bottom: 50px; border:1px solid #ddd;
  }
  .titeLocation{
    font-size: 19px; padding: 15px; 
    border-bottom: 1px solid #ddd; 
    font-weight:bold; color:#555;
  }
  .locationTxt{
    padding-left: 15px; height: 40px; 
    line-height: 40px; 
  }
  .areaBox{
     /*padding: 8px 8px 8px 0;*/
  }
  .areaName{
    color: #0b354d; font-weight: bold; float: left;
    margin-left: 40px; background-color: ;  padding: 10px 10px 20px 0;
  }
  @media only screen and (max-width: 995px) {
      .mainContent{
        min-height: 500px;  background-color: #f9f9f9; 
        margin-bottom: 30px; border:1px solid #ddd;
      }
      .titeLocation{
        font-size: 15px; padding: 15px; 
        border-bottom: 1px solid #ddd; 
        font-weight:bold; color:#555;
      }
      .locationTxt{
        padding-left: 15px; height: 40px; 
        line-height: 40px; 
      }
      .areaName{
         font-weight: bold; 
        text-align: center;
        margin-left: 0px; 
        padding: 5px 5px 5px 0;
      }
  }
</style>
