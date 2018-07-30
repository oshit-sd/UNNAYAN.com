
        <?php $this->load->view('validationAndMessage'); ?>

      	<style type="text/css">
      		.InputDiv{
      			margin-top: 5px;
      		}
      	</style>

	<?php
        if(isset($editData)) :
        foreach($editData as $data) :
    ?>
      	<div id="data-step2" class="account-content" data-temp="tabdata" >
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">Update product</h2>
                </div>
              </div>
            </div>
            <div class="m-0">
              <form action="<?php echo base_url(); ?>UpdatePostProduct/<?php echo $data->post_id;?>" method="post" class="main-form full"  enctype="multipart/form-data">
                <div class="mb-20">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="p_title" required class="InputDiv" placeholder="Title" value="<?php echo $data->p_title; ?>">
                      </div>
                    </div>

                   	<div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="p_phone" required class="InputDiv" placeholder="Contact Number" value="<?php echo $data->p_phone; ?>">
                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <select name="p_category"  id="categorySelect" onclick="FatchSubCategory()" required="required" style="margin-top: 5px;">
                        <option value="<?php echo $data->p_category; ?>"><?php echo $data->cat_name; ?></option>
                        
                          <option value="">Select a category</option>
                        	
                          <?php $i=1; foreach($accessCategory as $category): ?>
                            <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_name; ?></option>
                          <?php endforeach; ?>

                        </select>
                      </div>
                    </div>

                     <div class="col-sm-6">
                      <div class="input-box">
                        <input type="email" name="p_email"  class="InputDiv"  placeholder="Email Address" value="<?php echo $data->p_email; ?>"> 
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <select name="p_sub_category" id="subCategory" style="margin-top: 5px;" >
                        	<option value="<?php echo $data->p_sub_category; ?>"><?php echo $data->sub_category_name; ?></option>
                        	<option value="">Select a sub-category</option>

                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="p_date" class="InputDiv" value="<?php echo $data->p_date; ?>" >
                      </div>
                    </div> 
                    
                    <?php
                      $qu = $this->db->where('id',$data->p_price_type)->get('pricetype');
                      $type = $qu->row();
                    ?>

                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="p_price"  style="width: 60%;"  required placeholder="Price" class="InputDiv" value="<?php echo $data->p_price; ?>">
                        <select name="p_price_type" style="width: 38%;" >
                          <?php  if(isset($type->price_type)): ?>
                            <option value="<?php echo $data->p_price_type; ?>">
                                <?php echo $type->price_type; ?>
                            </option>
                          <?php endif; ?>

                          <?php foreach($fatchPriceType as $type): ?>
                              <option value="<?php echo $type->id; ?>"><?php echo $type->price_type; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="file" name="image" class="InputDiv">
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <div class="input-box">
                        <select name="p_country" onclick="FatchCity()" id="countrySelect" style="margin-top: 5px;">
                          <option value="<?php echo $data->p_country; ?>"><?php echo $data->country_name; ?></option>
                          <option value=" ">Select a country</option>

                          <?php $i=1; foreach($fatchCountry as $country): ?>
                            <option value="<?php echo $country->ct_id; ?>"><?php echo $country->country_name; ?></option>
                          <?php endforeach; ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="file" name="image2" class="InputDiv">
                      </div>
                    </div> 


                    <div class="col-sm-6">
                      <div class="input-box">
                        <select name="p_area" onclick="FatchZone()" id="citySelect"  style="margin-top: 5px;">
                          <option value="<?php echo $data->p_city; ?>"><?php echo $data->city_name; ?></option>
                          <option value="">Select a city</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="file" name="image3" class="InputDiv">
                      </div>
                    </div> 


                    <div class="col-sm-6">
                      <div class="input-box" style="">
                        <select name="p_zone" id="zoneSelect"  style="margin-top: 5px; ">
                          <option value="<?php echo $data->p_zone; ?>"><?php echo $data->area_name; ?></option>
                          <option value="">Select a zone</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="file"  name="image4" class="InputDiv">
                      </div>
                    </div> 


                    <div class="col-sm-6">
                      <div class="input-box">
                        <textarea name="p_address" rows="4" style="margin-top: 5px;" placeholder="Address"><?php echo $data->p_address; ?></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box" style="">
                        <textarea name="p_details" rows="4" style="margin-top: 5px;" placeholder="Product Details"><?php echo $data->p_details; ?></textarea
                      </div>
                    </div>



                    <div class="col-sm-12">
                      <div class="input-box" style="margin-top: 20px;">
                        <button name="submit" type="submit" class="btn-color right-side">Submit</button>
                      </div>
                    </div> 


                </div>
            </div>
        	</form>
        	</div>
    	</div>

    <?php endforeach; endif; ?>


    <?php $this->load->view('FrontEnd/user_dashboard/partials/ajax_fatch_sub_category'); ?>


