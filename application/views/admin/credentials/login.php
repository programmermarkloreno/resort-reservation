<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Script-Type" content="type">
   <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type='image/x-icon' href="<?php echo base_url(); ?>assets/img/icon/<?php echo $profile[0]->company_icon; ?>">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/external.css">
  <!-- iCheck -->
   <link rel="stylesheet" href="<?php echo base_url();?>assets/iCheck/square/blue.css"> 

  <!-- Google Font -->
  <link rel="icon" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="">
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 login_div">
    <div class="login-box" style="width: 100%;margin-top: 0px;margin-bottom: 0px;">
      <div class="login-logo" style="margin-bottom: 0px">
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/img/icon/<?php echo $profile[0]->company_icon; ?>" class="logo-img"></a>
        <!-- <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/client-side/img/sample7.png" class="logo-img"></a> -->
        <!-- <a href="<?php echo base_url();?>"><p class="logo-title">ENGAGE COURIER</p></a> -->
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        
        <?php
          if($error != ''){
        ?>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Login Error!</strong> <?php echo $error; ?>
          </div>
        <?php
          }
        ?>

        
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->
        <form action="<?php echo base_url();?>login/loginproc" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email Address" style="border-radius: 5%;">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" style="border-radius: 5%;">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row"> 
            <!-- /.col --><br> 
            <div class="col-xs-12">
              <button type="submit" class="btn login-btn btn-block btn-lg">Login</button>
            </div>

            <div class="col-xs-12 text-center" style="margin-top: 1rem">
              <div class="checkbox icheck">
                <label>
                  <a href="#" class="text-nav">Forgot Password</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <br />
          <!-- <div><span>Copyright <?php echo date('Y');?>. All Rights Reserved. Version 1.2.1</span></div> -->
        </form>

        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-box-body -->
    </div>

  </div>

  <div class="col-xs-7 col-sm-6 col-md-6 col-lg-9 login-slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item">
            <img class="d-block w-100" src="<?php echo base_url().'assets/client/img/sec-A/aa.jpeg'; ?>" data-color="lightblue" alt="First Image">
            <div class="carousel-caption d-md-block">
              
            </div>
          </div>
          <div class="item">
            <img class="d-block w-100" src="<?php echo base_url().'assets/client/img/sec-A/ac.jpeg'; ?>" data-color="firebrick" alt="Second Image">
            <div class="carousel-caption d-md-block">
              
            </div>
          </div>
          <div class="item">
            <img class="d-block w-100" src="<?php echo base_url().'assets/client/img/sec-A/ad.jpeg'; ?>" data-color="violet" alt="Third Image">
            <div class="carousel-caption d-md-block">
              
            </div>
          </div>
          <div class="item">
            <img class="d-block w-100" src="<?php echo base_url().'assets/client/img/sec-A/ae.jpeg'; ?>" data-color="violet" alt="fourth Image">
            <div class="carousel-caption d-md-block">
              
            </div>
          </div>
        </div>
        <!-- Controls -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
      </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
<!-- /.login-box -->

<!-- jQuery --> 
  <script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/iCheck/icheck.min.js"></script>
<script>

var $item = $('.item'); 
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight); 
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});

$('.carousel').carousel({
  interval: 3000,
  pause: "false"
});

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  
</script>
</body>
</html>