<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" style="">
        <?php $this->load->view('validationAndMessage'); ?>

      	<style type="text/css">
      		.InputDiv{
      			margin-top: 5px;
      		}
      	</style>

      	<div id="data-step2" class="account-content" data-temp="tabdata" style="margin-top: 10px;">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">Post your product</h2>
                </div>
              </div>
            </div>
            <div class="m-0">
              <form action="<?php echo base_url(); ?>SavePostProduct" method="post" class="main-form full"  enctype="multipart/form-data">
                <div class="mb-20">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="p_title" required class="InputDiv" placeholder="Title">
                      </div>
                    </div>

                   	<div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="Ccode" maxlength="8"  style="width: 20%; " required class="InputDiv" placeholder="Code">
                        <input type="text" name="p_phone"  style="width: 78%; " required class="InputDiv" placeholder="Contact Number">
                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <select name="p_category" id="categorySelect" onclick="FatchSubCategory()" required="required" style="margin-top: 5px;">
                          <option value="">Select a category</option>
                        	
                          <?php $i=1; foreach($accessCategory as $category): ?>
                            <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_name; ?></option>
                          <?php endforeach; ?>

                        </select>
                      </div>
                    </div>

                     <div class="col-sm-6">
                      <div class="input-box">
                        <input type="email" name="p_email"  class="InputDiv"  placeholder="Email Address">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <select name="p_sub_category" id="subCategory"  style="margin-top: 5px;" >

                          <option value="">Select a sub-category</option>
                        
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" readonly name="p_date" class="InputDiv" value="<?php echo date('Y-m-d'); ?>" >
                      </div>
                    </div> 
                    
                  

                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="p_price" style="width: 70%;" required placeholder="Price" class="InputDiv">

                        <select name="p_price_type" style="width: 28%;" >
                          <?php foreach($fatchPriceType as $type): ?>
                              <option value="<?php echo $type->id; ?>"><?php echo $type->price_type; ?></option>
                          <?php endforeach; ?>
                        </select>

                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="input-box">
                        <input type="file" name="image" class="InputDiv">
                      </div>
                    </div>
                    <div class="col-sm-2" style="padding-top: 15px; color: #000; font-weight: bold; font-size: 11px; ">
                      Select Image
                    </div> 


                    <div class="col-sm-6">
                      <div class="input-box">
                        <select name="p_country" onclick="FatchCity()" id="countrySelect" style="margin-top: 5px;">
                          <option value="">Select a country</option>

                          <?php $i=1; foreach($fatchCountry as $country): ?>
                            <option value="<?php echo $country->ct_id; ?>"><?php echo $country->country_name; ?></option>
                          <?php endforeach; ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="input-box">
                        <input type="file" name="image2" class="InputDiv">
                      </div>
                    </div> 
                    <div class="col-sm-2" style="padding-top: 15px; color: #000; font-weight: bold; font-size: 11px; ">
                      Select Image
                    </div> 


                    <div class="col-sm-6">
                      <div class="input-box">
                        <select name="p_area" onclick="FatchZone()" id="citySelect" style="margin-top: 5px;">
                          <option value="">Select a city</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="input-box">
                        <input type="file" name="image3" class="InputDiv">
                      </div>
                    </div>
                    <div class="col-sm-2" style="padding-top: 15px; color: #000; font-weight: bold; font-size: 11px; ">
                      Select Image
                    </div>  


                    <div class="col-sm-6">
                      <div class="input-box" style="">
                        <select name="p_zone" id="zoneSelect" style="margin-top: 5px; ">
                          <option value="">Select a zone</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="input-box">
                        <input type="file" name="image4" class="InputDiv">
                      </div>
                    </div> 
                    <div class="col-sm-2" style="padding-top: 15px; color: #000; font-weight: bold; font-size: 11px; ">
                      Select Image
                    </div> 


                    <div class="col-sm-6">
                      <div class="input-box">
                        <textarea name="p_address" rows="4" style="margin-top: 5px;" placeholder="Address"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box" style="">
                        <textarea name="p_details" rows="4" style="margin-top: 5px;" placeholder="Product Details"></textarea>
                      </div>
                    </div>

                    <div class="col-sm-8">
                      <div class="input-box" style="">
                        <input type="file" name="DocPdfUpload" class="InputDiv">
                      </div>
                    </div>

                    <div class="col-sm-4" style="color: #000; font-weight: bold; padding-top: 15px; font-size: 11px;">
                          Select DOC / PDF / any
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
</div>
</div>
</div>
</div>
<?php $this->load->view('FrontEnd/user_dashboard/partials/ajax_fatch_sub_category'); ?>