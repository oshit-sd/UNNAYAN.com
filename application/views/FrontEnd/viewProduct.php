<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" style="">

        <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12">
            <div class="heading-part heading-bg mb-30">
              <h2 class="heading m-0">Products</h2>
            </div>
          </div>
        </div>


        <?php
            if (isset($fatchViewProduct)) :
            foreach ($fatchViewProduct as $data) :
        ?>
       	<div class="row">
        	<div class="col-md-5 col-sm-5 mb-xs-30">
		    	<div class="fotorama" data-nav="thumbs" data-allowfullscreen="native"> 		
		    		<?php if($data->p_pic1 != 0): ?>
		    			<a style="height: 500px;">
	                 	<img src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic1; ?>" alt="Product Image"></a>
	                <?php else: ?>
	                  	<img src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
	                <?php endif; ?>

		    		<?php if($data->p_pic2 != 0): ?>
	                 	<img src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic2; ?>" alt="Product Image">
	                <?php else: ?>
	                  	<img src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
	                <?php endif; ?>

		    		<?php if($data->p_pic3 != 0): ?>
	                 	<img src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic3; ?>" alt="Product Image">
	                <?php else: ?>
	                  	<img src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
	                <?php endif; ?>

		    		<?php if($data->p_pic4 != 0): ?>
	                 	<img src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic4; ?>" alt="Product Image">
	                <?php else: ?>
	                  	<img src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
	                <?php endif; ?>
 

	            </div>
	        </div>




        	<div class="col-md-7 col-sm-7">
	          <div class="row">
	            <div class="col-xs-12">
	              <div class="product-detail-main">
	                 <div class="product-item-details">
	                  <h1 class="product-item-name"><?php echo $data->p_title; ?></h1>
	                  <div class="price-box"> <span class="price">Price : <?php echo number_format($data->p_price); ?></span></div>
	                  <div class="product-info-stock-sku">
	                    <div>
	                      <label>Category: </label>
	                      <span class="info-deta"><?php echo $data->cat_name; ?></span> </div>
	                    <div>
	                      <label>Sub-category: </label>
	                      <span class="info-deta"><?php echo $data->sub_category_name; ?></span> </div>
	                  </div>
	                  <p><?php echo $data->p_details; ?></p>
	           
	                </div>
	              </div>
	            </div>
	          </div>
        	</div>
      	</div>


      	<div class="product-detail-tab">
	        <div class="row">
	          <div class="col-md-12">
	             <div class="heading-part heading-bg mb-30" style="margin-top: 20px;">
	             	 <h2 class="heading m-0">Contact</h2>
	            </div>
	            <div id="items" style="margin-top: -30px;">
	              <div class="tab_content">
	                <ul>
	                  <li>
	                    <div class="items-Description selected gray-bg">
	                      <div class="Description" style="color: #000;"> 

                          <?php if($data->u_pic != 0): ?>
                              <img style="height: 100px; width: 80px;" src="<?php echo base_url(); ?>libs/upload_pic/user_pic/<?php echo $data->u_pic; ?>"> <br>
                          <?php else: ?>
                              <img style="height: 100px; width: 80px;" src="<?php echo base_url(); ?>libs/logo_image/user.png"><br> 
                          <?php endif; ?>

	                      	Name : <strong style="color: #041E64;">
                                    <?php echo $data->u_name; ?>
                                  </strong><br />

	                      	Phone : <strong style="color: #041E64;">
                                      <?php echo $data->p_phone; ?>
                                  </strong><br />

	                      	Email : <strong style="color: #041E64;">
                                      <?php echo $data->p_email; ?>
                                  </strong><br />
                                  
	                      	Address : <strong style="color: #041E64;">
                                      <?php echo $data->p_address; ?>
                                  </strong><br />
	                      </div>
	                    </div>
	                  </li>
	                </ul>
	              </div>
	            </div>
	          </div>
	        </div>
      	</div>

      	
      	<?php endforeach;  endif; ?>



	      <div class="row" style="margin-top: 20px;">
          <div class="col-xs-12">
            <div class="heading-part heading-bg mb-30">
              <h2 class="heading m-0">Related Products</h2>
            </div>
          </div>
        </div>

        
          <div class="row">
            <div class="col-md-12 col-sm-8">
              <div class="product-listing">
                <div class="row mlr_-20">

                <?php
                    if (isset($RelatedProduct)) :
                    foreach ($RelatedProduct as $data) :
                    $cID  = $data->p_category;
                    $cid = strtr(base64_encode($cID), '+/=', '_-.'); 

                    $pID  = $data->post_id;
                    $pid = strtr(base64_encode($pID), '+/=', '_-.'); 
                ?>
                  <div class="col-md-3 col-xs-6 plr-20" >
                    <div class="product-item" style="border:1px solid #e9e9e9;">
                      <div class="product-image"> 
                        <a href="<?php echo base_url(); ?>viewProduct/<?php echo $pid; ?>/<?php echo $cid; ?>/<?php echo $data->p_title; ?>"> 

                          <?php if($data->p_pic1 != 0): ?>
                              <img src="<?php echo base_url(); ?>libs/upload_pic/PostImg/<?php echo $data->p_pic1; ?>" style="height: 150px; width: 100%; border:5px solid #fff;" alt="Product Image">
                          <?php else: ?>
                              <img style="height: 150px; width: 100%;" src="<?php echo base_url(); ?>libs/upload_pic/no.png"> 
                          <?php endif; ?>

                        </a>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left left-side">
                            <a style="padding: 7px; border-radius: 3px; font-weight: bolder; color: #089; background-color: #fff; width: 100%:" href="<?php echo base_url(); ?>viewProduct/<?php echo $pid; ?>/<?php echo $cid; ?>/<?php echo $data->p_title; ?>">VIEW</a>
                          </div>
                        </div>
                      </div>
                      <div class="product-item-details" style=" margin-bottom: 0px;">
                        <div class="product-item-name"> 
                          <a style="padding: 10px; text-align: justify;" href="<?php echo base_url(); ?>viewProduct/<?php echo $pid; ?>/<?php echo $cid; ?>/<?php echo $data->p_title; ?>"><?php echo $data->p_title; ?></a> 
                        </div>
                        <div class="price-box"> 
                          <span class="price" style="padding: 10px;"><?php echo number_format($data->p_price); ?></span> 
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach;  endif; ?>


                </div>
              </div>
            </div>
          </div>

  	   </div>
    </div>
  </div>
</div>

