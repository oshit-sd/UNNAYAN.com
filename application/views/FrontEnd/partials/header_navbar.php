<body class="common-home">
<!-- <div class="se-pre-con"></div> -->
<div class="main"> 
  <!-- HEADER START -->
  <header class="navbar navbar-custom" id="header">
    <div class="header-top gray-bg">
      <div class="container">
        <div class="row">
            <div class="col-sm-5">
              <div class="top-link top-link-left">
                <ul>
                  <li class="language-icon">
                    <!-- <select>
                      <option selected="selected" value="">English</option>
                      <option value="">China</option>
                    </select> -->


                    <!-- For translate language -->
                    <div id="google_translate_element"></div><script type="text/javascript">
                      function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'bn,en,es,hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                      }
                      </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                       <!-- End translate language -->
                              
                  </li> 
                </ul>
              </div>
            </div>
            
              <?php
                $logUser = $this->session->userdata('user_id');
                $userType = $this->session->userdata('user_type');
                $query = $this->db->where('user_id',$logUser)->get('tbl_users');
                $user = $query->row();

              if(isset($user->user_id)):
              ?>

               <div class="col-sm-7">
                <div class="top-link right-side">
                  <ul>
                    <li class="login-icon">
                      <a href="<?php echo base_url(); ?>User-Dashboard" title="User-Dashboard">
                        <i class="fa fa-user" style="color: #003d99;"></i>
                        <span class="hidden-xs hidden-sm hidden-md" style="color: #003d99; font-weight: bold;"><?php  echo $this->session->userdata('user_name'); ?></span>
                      </a>
                    </li>
                    <li class="login-icon">
                      <a href="<?php echo base_url(); ?>users/logout" title="Logout">
                        <i class="fa fa-sign-out" style="color: #003d99;"></i>
                        <span class="hidden-xs hidden-sm hidden-md" style="color: #003d99; font-weight: bold;">Logout</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <?php else: ?>

              <div class="col-sm-7">
                <div class="top-link right-side">
                  <ul>
                    <li class="login-icon">
                      <a href="<?php echo base_url(); ?>signIn" title="Sing In">
                        <i class="fa fa-user" style="color: #003d99;"></i>
                        <span class="hidden-xs hidden-sm hidden-md" style="color: #003d99; font-weight: bold;">Sign In</span>
                      </a>
                    </li>
                    <li class="Register-icon">
                      <a href="<?php echo base_url(); ?>signUp" title="Register">
                        <i class="fa fa-user-plus" style="color: #003d99;"></i>
                        <span class="hidden-xs hidden-sm hidden-md" style="color: #003d99; font-weight: bold;">Register</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

            <?php endif;?>
          </div>
      </div>
    </div>

    <style type="text/css">
        .hedddd{
          margin-bottom: -15px;
          }
        .logod{
          height: 90px; width: 130px margin-top: -15px;
        }
        .logoTxt{
            color: #089; margin-top: 40px; margin-left: 5px; font-weight: bold; 
            text-transform: uppercase; font-size: 30px; float: left;
          }
          .button-Div{
            margin-top: 15px;
          }
          .Bbutton{
            background-color: #26749C; padding: 9px; font-size: 13px;
            color: #fff; border-radius: 2px;
          }
          .Bbutton:hover{
              background-color: #3FB7CB;
              color: #000;
          }
          .TotalMem{
            margin-top: 8px;
            font-weight: bold;
            color: #15AA32;
          }
      @media only screen and (max-width: 600px) {
          .imgdiv{
            width: 100px;
          }
          .hedddd{
            margin-bottom: 20px;
          }
          .logod{
            height: 70px; width: 60px margin-top: -15px;
          }
          .logoTxt{
            color: #089; margin-top: 20px; font-weight: bold; 
            text-transform: uppercase; font-size: 18px; float: left;
          }
          .button-Div{
            margin-top: 70px;
          }
          .Bbutton{
            background-color: #26749C; padding: 5px; 
            color: #fff; border-radius: 2px;
            font-size: 12px;
          }
          .TotalMem{
            margin-top: 2px;
            margin-bottom: 15px;
            font-weight: bold;
            color: #15AA32;
          }

      }
    </style>

    <?php
       $countMembers= $this->db->from("tbl_users")->where('u_status', 'a')
       ->count_all_results();
    ?>


    <div class="header-middle">
      <div class="container">
      <div class="header-inner">
        <div class="navbar-header hedddd" style="">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-bars"></i></button>
            <a class="navbar-brand page-scroll imgdiv" href="<?php echo base_url(); ?>"> <img style="" class="logod" src="<?php echo base_url(); ?>libs/logo_image/logo.jpg">  </a> <h2 style="" class="logoTxt">Unnayan</h2> 
        </div>

        <div class="right-side float-none-sm">
          <div class="right-side float-left-xs header-right-link">
            <div class="button-Div">
               <?php if($userType === 'b'): ?>
                  <a href="<?php echo base_url(); ?>PostProduct" class="Bbutton btn">Buyer Post</a>
              <?php elseif($userType === 's'): ?>
                  <a href="<?php echo base_url(); ?>PostProduct" class="Bbutton btn">Seller Post</a>
              <?php else:?>
                  <a href="<?php echo base_url(); ?>PostProduct" class="Bbutton btn">Buyer Post</a>
                  <a href="<?php echo base_url(); ?>PostProduct" class="Bbutton btn">Seller Post</a><br>
                  <div class="TotalMem">Total Members : <?php echo $countMembers; ?></div>
              <?php endif;?>
            </div>
            <!-- <ul>
             <li class="cart-icon"> <a style="background-color: #26749C; padding: 12px; color: #fff; border-radius: 2px;" href="<?php echo base_url(); ?>" class="btn btn-primary hovvr"> Buyer Post </a></li>
             <li class="cart-icon"> <a style="background-color: #26749C; padding: 12px; color: #fff; border-radius: 2px;" href="<?php echo base_url(); ?>" class="btn btn-primary hovvr"> Seller Post </a></li>
            </ul> -->
          </div>
        </div>

      </div>
    </div>
    </div>




     <div class="header-bottom">
    <div class="container position-r">
      <div class="row m-0">

        <div class="col-md-3 position-i p-0">
          <div class="sidebar-menu-dropdown home ptb-20">
            <a class="btn-sidebar-menu-dropdown"><span></span> Categories</a>
            <div id="cat" class="cat-dropdown">
              <div class="sidebar-contant">
                <div id="menu" class="navbar-collapse collapse">
                  
                  <?php
                  $uid = $this->session->userdata('user_id');
                  $uType = $this->session->userdata('user_type');
                  if($uType): $uType = $uType; else: $uType = 0; endif;

                      $query = $this->db->where('user_id',$uid)->get('tbl_users');
                      $FatchUser =  $query->row();
                      if(isset($FatchUser->user_id)):

                      $query2 = $this->db->query('select * from category where cat_id not in (select acs_category from tbl_access where acs_user_id='.$uid.')');

                      $withoutAccessCategory = $query2->result();
                  ?>

                  <!-- When User Login This Category Show -->
                  <ul class="nav navbar-nav">

                    <!-- Access Category Show -->
                    <?php 
                        if(isset($accessCategory)): 
                         foreach($accessCategory as $category): 
                          $cateID  = $category->cat_id;
                          $cateid = strtr(base64_encode($cateID), '+/=', '_-.');
                    ?>
                     <li class="level sub-megamenu">
                      <span class="opener plus"></span>
                      <a href="<?php echo base_url(); ?>CategoryProduct/<?php echo $cateid; ?>/<?php echo $uType; ?>/<?php echo $category->cat_name; ?>" class="page-scroll"><i class="fa fa-codepen"></i>

                        <?php echo $category->cat_name; ?>

                        <?php
                          $qu = $this->db->where('category_id',$category->cat_id)->limit('1')->get('sub_category');
                          $sub = $qu->result();
                         if($sub): ?>
                            <i class="fa fa-angle-right right-side"></i>
                          <?php endif;   ?>
                        </a>

                      <?php 
                        foreach($fatchSubCategory as $SubCategory): 
                        if($category->cat_id === $SubCategory->category_id ): 
                      ?>
                      <div class="megamenu mobile-sub-menu">
                        <div class="megamenu-inner-top">
                          <ul class="sub-menu-level1">
                            <li class="level2">
                              <ul class="sub-menu-level2 ">
                                <?php 
                                  foreach($fatchSubCategory as $SubCategory): 
                                    if($category->cat_id === $SubCategory->category_id ):
                                    $subCID  = $SubCategory->sub_id;
                                    $subCid = strtr(base64_encode($subCID), '+/=', '_-.'); 
                                ?>

                                  <li class="level3"><a href="<?php echo base_url(); ?>SubCategoryProduct/<?php echo $subCid; ?>/<?php echo $uType; ?>/<?php echo $SubCategory->sub_category_name; ?>" style="color: #fff;"><?php echo $SubCategory->sub_category_name; ?></a></li>

                              <?php endif; endforeach; ?>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <?php endif; endforeach; ?>
                    </li>
                    <?php endforeach; endif;  ?>


                    <!-- Without Access Category Show -->
                    <?php if(isset($withoutAccessCategory)): foreach($withoutAccessCategory as $category): ?>
                     <li class="level sub-megamenu">
                      <span class="opener plus"></span>
                      <a href="<?php echo base_url(); ?>Category-Product/<?php echo $category->cat_id; ?>" class="page-scroll"><i class="fa fa-codepen"></i>

                        <?php echo $category->cat_name; ?>

                        <?php
                          $qu = $this->db->where('category_id',$category->cat_id)->limit('1')->get('sub_category');
                          $sub = $qu->result();
                         if($sub): ?>
                            <i class="fa fa-angle-right right-side"></i>
                          <?php endif;   ?>
                        </a>

                      <?php 
                          foreach($fatchSubCategory as $SubCategory): 
                            if($category->cat_id === $SubCategory->category_id ): 
                      ?>
                      <div class="megamenu mobile-sub-menu">
                        <div class="megamenu-inner-top">
                          <ul class="sub-menu-level1">
                            <li class="level2">
                              <ul class="sub-menu-level2 ">
                                <?php 
                                foreach($fatchSubCategory as $SubCategory): 
                                  if($category->cat_id === $SubCategory->category_id ): 
                                ?>
                                  <li class="level3"><a href="<?php echo base_url(); ?>Sub-CategoryProduct/<?php echo $SubCategory->sub_id; ?>" style="color: #fff;"><?php echo $SubCategory->sub_category_name; ?></a></li>

                                <?php endif; endforeach; ?>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <?php endif; endforeach; ?>
                    </li>
                    <?php endforeach; endif;  ?>
                  </ul>




                <?php else :?>

                  <!-- When User Not Login This Category Show -->
                  <ul class="nav navbar-nav">

                    <?php if(isset($fatchCategory)): foreach($fatchCategory as $category): ?>
                     <li class="level sub-megamenu">
                      <span class="opener plus"></span>
                      <a href="<?php echo base_url(); ?>Category-Product/<?php echo $category->cat_id; ?>" class="page-scroll"><i class="fa fa-codepen"></i><?php echo $category->cat_name; ?>

                        <?php
                          $qu = $this->db->where('category_id',$category->cat_id)->limit('1')->get('sub_category');
                          $sub = $qu->result();
                         if($sub): ?>
                            <i class="fa fa-angle-right right-side"></i>
                          <?php endif;   ?>
                        </a>

                      <?php if(isset($fatchSubCategory)): foreach($fatchSubCategory as $SubCategory): if($category->cat_id === $SubCategory->category_id ): ?>
                      <div class="megamenu mobile-sub-menu">
                        <div class="megamenu-inner-top">
                          <ul class="sub-menu-level1">
                            <li class="level2">
                              <ul class="sub-menu-level2 ">
                                <?php if(isset($fatchSubCategory)): foreach($fatchSubCategory as $SubCategory): if($category->cat_id === $SubCategory->category_id ): ?>
                                  <li class="level3"><a href="<?php echo base_url(); ?>Sub-CategoryProduct/<?php echo $SubCategory->sub_id; ?>" style="color: #fff;"><?php echo $SubCategory->sub_category_name; ?></a></li>
                              <?php endif; endforeach; endif;   ?>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <?php endif; endforeach; endif;   ?>
                    </li>
                    <?php endforeach; endif;  ?>
                  </ul>


                <?php endif; ?>


                </div>
              </div>
            </div>
          </div>

          <!-- <div>
            <img style="height: 300px; width: 100%;" src="<?php echo base_url(); ?>libs/img.jpg">
          </div> -->

         
        </div>




        <div class="col-md-9 p-0">
          <div class="nav_sec position-r">
            <div class="mobilemenu-title mobilemenu">
              <span>Menu</span>
              <i class="fa fa-bars pull-right"></i>
            </div>
            <div class="mobilemenu-content">
              <ul class="nav navbar-nav" id="menu-main">
                <li>
                  <a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>AboutUs">About Us</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>Services">Services</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>TermsCondition">Terms & Conditions</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>FAQ">FAQ</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>Payment">Payment</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>ContactUs">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div></div>
    </div>
  </header>
  <!-- HEADER END --> 
  
