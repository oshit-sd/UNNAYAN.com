<?php  if(isset($id)): $id = $id; else: $id ="search"; endif; ?>

<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" style="">

        <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12">
            <div class="heading-part heading-bg mb-30">
              <h2 class="heading m-0">Products</h2>
              <?php
                $qu = $this->db->where('cat_id',$id)->get('category');
                $res  = $qu->row();
              ?>
              <div style="color: #089; font-weight: bold;"><?php if(isset($res->details)): echo $res->details; endif; ?></div>
            </div>
          </div>
        </div>


        <?php
            $uid = $this->session->userdata('user_id');
            if(isset($uid)):
         ?>
             <div class="row" style="">
              <div class="col-xs-1"></div>
              <div class="col-xs-9" style="margin-top: -20px;">
                 <form method="post" action="<?php echo base_url(); ?>UserWASearchProduct/<?php echo $id; ?>">
                 <spsn style="font-weight: bolder; color: #089;">Serach</spsn>  
                    <select name="p_country" onclick="FatchCity()" id="countrySelect" style="margin-top: 5px;">
                        <option value=""> &nbsp; Select a country &nbsp; </option>

                        <?php $i=1; foreach($fatchCountry as $country): ?>
                          <option value="<?php echo $country->ct_id; ?>"><?php echo $country->country_name; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="p_area" onclick="FatchZone()" id="citySelect" style="margin-top: 5px;">
                        <option value=""> &nbsp; Select a city &nbsp; </option>
                    </select>

                    <select name="p_zone" id="zoneSelect" style="margin-top: 5px; ">
                        <option value=""> &nbsp; Select a zone &nbsp; </option>
                    </select>
                    <button type="submit" class="btn btn-primary">Search</button>
                 </form> 

              </div>
            </div>

        <?php else:?>
            <?php if(isset($id)): $id = $id; else: $id ="search"; endif; ?>
            <div class="row" style="">
              <div class="col-xs-1"></div>
              <div class="col-xs-9" style="margin-top: -20px;">
                 <form method="post" action="<?php echo base_url(); ?>UserSearchProduct/<?php echo $id; ?>">
                 <spsn style="font-weight: bolder; color: #089;">Serach</spsn>  
                    <select name="p_country" onclick="FatchCity()" id="countrySelect" style="margin-top: 5px;">
                        <option value=""> &nbsp; Select a country &nbsp; </option>

                        <?php $i=1; foreach($fatchCountry as $country): ?>
                          <option value="<?php echo $country->ct_id; ?>"><?php echo $country->country_name; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="p_area" onclick="FatchZone()" id="citySelect" style="margin-top: 5px;">
                        <option value=""> &nbsp; Select a city &nbsp; </option>
                    </select>

                    <select name="p_zone" id="zoneSelect" style="margin-top: 5px; ">
                        <option value=""> &nbsp; Select a zone &nbsp; </option>
                    </select>
                    <button type="submit" class="btn btn-primary">Search</button>
                 </form> 

              </div>
            </div>
            
        <?php endif;?>


        
          <div class="row">
            <div class="col-md-12 col-sm-8"  style="margin-top: 20px;">
              <div class="product-listing">
                <div class="row mlr_-20">

                <?php
                    if (isset($CategoryProduct)) :
                    foreach ($CategoryProduct as $data) :
                      if($data->p_status == 'p' || $data->p_status == 'a'):
                      $cID  = $data->p_category;
                      $cid = strtr(base64_encode($cID), '+/=', '_-.'); 

                      $pID  = $data->post_id;
                      $pid = strtr(base64_encode($pID), '+/=', '_-.'); 
                ?>
                  <div class="col-md-3 col-xs-6 plr-20" >
                    <div class="product-item" style="border:1px solid #e9e9e9;">
                      <div class="product-image"> 
                        <a href="<?php echo base_url(); ?>registerPlease"> 

                          <?php if($data->p_pic1 != 0): ?>
                              <img src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic1; ?>" style="height: 150px; width: 100%; border:5px solid #fff;" alt="Product Image">
                          <?php else: ?>
                              <img style="height: 150px; width: 100%;" src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
                          <?php endif; ?>

                        </a>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left left-side">
                            <a style="padding: 7px; border-radius: 3px; font-weight: bolder; color: #089; background-color: #fff; width: 100%:" href="<?php echo base_url(); ?>registerPlease">VIEW</a>
                          </div>
                        </div>
                      </div>
                      <div class="product-item-details" style=" margin-bottom: 0px;">
                        <div class="product-item-name"> 
                          <a style="padding: 10px; text-align: justify;" href="<?php echo base_url(); ?>registerPlease"><?php echo $data->p_title; ?></a> 
                        </div>
                        <div class="price-box"> 
                          <span class="price" style="padding: 10px;">
                            <?php echo number_format($data->p_price); ?>
                            <?php
                                $qu = $this->db->where('id',$data->p_price_type)->get('pricetype');
                                $res = $qu->row();
                                echo $res->price_type;
                              ?>
                          </span> 
                        </div>
                        <div class="product-item-name"> 
                          <span class="price" style="padding: 10px;">
                            <?php 
                                $qu = $this->db->where('ct_id',$data->p_country)->get('tbl_country');
                                $country = $qu->row();
                                if(isset($country->country_name)):
                                echo $country->country_name; echo " - "; 
				endif;
                                $qu = $this->db->where('cty_id',$data->p_city)->get('tbl_city');
                                $city = $qu->row();
                                if(isset($city->city_name)):
                                	echo $city->city_name; 
                                endif; 
                            ?>
                            </span> 
                        </div>
                      </div>
                    </div>
                  </div>
                <?php  endif; endforeach;  endif; ?>


                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>

<?php $this->load->view('FrontEnd/user_dashboard/partials/ajax_fatch_sub_category'); ?>