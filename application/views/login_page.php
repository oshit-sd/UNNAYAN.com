

<?php echo doctype('html5'); ?>
<!--[if lt IE 7]>  <html class="lt-ie7"> <![endif]-->
<!--[if IE 7]>     <html class="lt-ie8"> <![endif]-->
<!--[if IE 8]>     <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->


<!-- Mirrored from nkdev.info/con/page-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 18 Apr 2015 12:58:44 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>

  <?php echo meta('description', 'This is content') ?>
  <?php
  	$attr = array(
  		array(
  			'name' => 'viewport', 
  			'content' => 'width=device-width, initial-scale=1', 
  		),
  	);
  	echo meta($attr);
  ?>

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

  <!-- <link rel="icon" type="image/png" href="<?php echo base_url() ?>libs/Login/assets/_con/images/icon.png"> -->
  <?php
  	$link = array(
  		'rel' => 'icon', 
  		'type' => 'image/png', 
  		'href' => base_url().'libs/Login/assets/_con/images/icon.png', 
  	);
  	echo link_tag($link);
  ?>


<!-- Image er jono diynamic -->
  <!-- 	// $img = array(
  	// 	'alt' => '', 
  	// 	'src' => base_url().'libs/img/icon.png', 
  	// );
  	// echo img($img); -->

  <!-- nanoScroller -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>libs/Login/assets/nanoScroller/nanoscroller.css" />


  <!-- FontAwesome -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>libs/Login/assets/font-awesome/css/font-awesome.min.css" />

  <!-- Material Design Icons -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>libs/Login/assets/material-design-icons/css/material-design-icons.min.css" />

  <!-- IonIcons -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>libs/Login/assets/ionicons/css/ionicons.min.css" />

  <!-- WeatherIcons -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>libs/Login/assets/weatherIcons/css/weather-icons.min.css" />
  <!-- Main -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>libs/Login/assets/_con/css/_con.min.css" />

  <!--[if lt IE 9]>
    <script src="assets/html5shiv/html5shiv.min.js"></script>
  <![endif]-->
</head>

<body>

  <section id="sign-in">

    <!-- Background Bubbles -->
    <canvas id="bubble-canvas"></canvas>
    <!-- /Background Bubbles -->

    <!-- Sign In Form -->
    <?php echo form_open('login/user_login_data_check'); ?>
      <div class="row links">
        <div class="col s6 logo">
          <h4>Login For Administrator</h4>
        </div>
        
      </div>

      <div class="card-panel">

    
        <div class="row">
          <div class="col">
          	<?php
          		if(validation_errors()){
          	?>
          		<div class="alert">
          			<?php echo validation_errors(); ?>
          		</div>
          		
      		<?php
      		}
          ?>

          	<?php
          		if(isset($error_login)) :
          	?>
          		<div class="alert">
          			<?php echo $error_login; ?>
          		</div>
          		
      		<?php endif; ?>
          </div>
        </div>

        <!-- Username -->
        <div class="input-field">
          <i class="fa fa-user prefix"></i>

          <?php
          	$username = array(
          		'id' => 'username-input', 
          		'class' => 'validate', 
          		'name' => 'username', 
          		'required' => 'required', 
          	);
          	echo form_input($username);
          ?>
          <label for="username-input">Username</label>
        </div>
        <!-- /Username -->

        <!-- Password -->
        <div class="input-field">
          <i class="fa fa-unlock-alt prefix"></i>
          <?php
          	$password = array(
          		'id' => 'password-input', 
          		'class' => 'validate', 
          		'name' => 'password', 
          		'required' => 'required', 
          	);
          	echo form_password($password);
          ?>
          <label for="password-input">Password</label>
        </div>
        <!-- /Password -->
        <button class="waves-effect waves-light btn-large z-depth-0 z-depth-1-hover" style="background-color: #255892;">Sign In</button> <br>

        <a style="margin-top: 10px; background-color: #017490;" href="<?php echo base_url() ?>" class="waves-effect waves-light btn-large z-depth-0 z-depth-1-hover">Back to home</a>
      </div>

    <?php echo form_close();?>
    <!-- /Sign In Form -->

  </section>


  <!-- DEMO [REMOVE IT ON PRODUCTION] -->
  <script type="text/javascript" src="<?php echo base_url() ?>libs/Login/assets/_con/js/_demo.js"></script>

  <!-- jQuery -->
  <script type="text/javascript" src="<?php echo base_url() ?>libs/Login/assets/jquery/jquery.min.js"></script>

  <!-- jQuery RAF (improved animation performance) -->
  <script type="text/javascript" src="<?php echo base_url() ?>libs/Login/assets/jqueryRAF/jquery.requestAnimationFrame.min.js"></script>

  <!-- nanoScroller -->
  <script type="text/javascript" src="<?php echo base_url() ?>libs/Login/assets/nanoScroller/jquery.nanoscroller.min.js"></script>

  <!-- Materialize -->
  <script type="text/javascript" src="<?php echo base_url() ?>libs/Login/assets/materialize/js/materialize.min.js"></script>

  <!-- Sortable -->
  <script type="text/javascript" src="<?php echo base_url() ?>libs/Login/assets/sortable/Sortable.min.js"></script>

  <!-- Main -->
  <script type="text/javascript" src="<?php echo base_url() ?>libs/Login/assets/_con/js/_con.min.js"></script>

</body>


<!-- Mirrored from nkdev.info/con/page-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 18 Apr 2015 12:58:44 GMT -->
</html>