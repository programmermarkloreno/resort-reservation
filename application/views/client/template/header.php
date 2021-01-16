<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8">
    <meta content="Hoyoland Eco-Tropical Resort" name="title">
    <meta content="Hoyoland, eco, tropical, resort, vacation, philippines, cavite, silang, team building, swimming pool, wedding, birthday, company event, training" name="keywords">
    <meta content="Hoyoland is a place for relaxation or recreation and can be used as a Vacation Place and/or events place for your Wedding, Birthdays, Company events like Team building, Training. We are located at Barangay Hoyo in Silang Cavite, 30 minutes away from Tagaytay and 15 minutes away from Nuvali." name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="0qsyU5szxJdRRpR24JzUDwAyetlxL5sq4xWMLaPQFxo" />

     <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property="og:title" content="Hoyoland Eco Tropical Resort">
    <meta property="og:image" content="<?php echo $sectionD[0]->company_icon; ?>">
    <meta property="og:url" content="<?php echo base_url(); ?>">
    <meta property="og:site_name" content="Hoyoland Eco Tropical Resort">
    <meta property="og:description" content="Hoyoland is a place for relaxation or recreation and can be used as a Vacation Place and/or EVENTS place for your Wedding, Birthdays, Company events like Team building, Training. We are located at Barangay Hoyo in Silang Cavite, 30 minutes away from Tagaytay and 15 minutes away from Nuvali.">

    <title><?php echo $title; ?></title>
   
     <link rel="shortcut icon" type='image/x-icon' href="<?php echo base_url(); ?>assets/img/icon/<?php echo $sectionD[0]->company_icon; ?>">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <!--   <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet"> -->
   <!--  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed&display=swap" rel="stylesheet"> -->
    
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/jquery-ui/jquery-ui.min.css">

    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/css/owl.carousel.min.css" type="text/css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/css/jquery-ui.min.css" type="text/css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/morphext/dist/morphext.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/animate/animate.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/timepicker/jquery.timepicker.css" type="text/css">

    <script src="<?php echo base_url(); ?>assets/client/template/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/template/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script data-ad-client="ca-pub-9297405359948501" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    <?php if($mode == 'sign_up'): ?>
    <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
    
    <!-- <script src="https://www.google.com/recaptcha/api.js?render=6LfFCvYZAAAAAFw2QhwyXHF1by5BsysnSbpoo-ZJ"></script> -->

  <!-- For Remote Development -->
     <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6LfkEvYZAAAAAF9Jy_gaZ5kldLQ6gedB8ZyDH4gH'
        });
      };
    </script>
   <!--  <script>
       function onSubmit(token) {
         document.getElementById("demo-form").submit();
       }
     </script> -->
    <?php endif; ?>
    <script type="text/javascript">

      function display_c(){
          var refresh = 1000;
          mytime = setTimeout('display_ct()', refresh);
         }

         function display_ct(){
           var today = new Date();
           var datetime = today.toLocaleDateString()+' '+today.toLocaleTimeString();
           $('#datetime').html("<h5>"+datetime+"</h5>");
           $('#datetime_val').val(datetime);
           display_c();
         }

    </script>
    <style type="text/css">
      .ui-datepicker-unselectable.ui-state-disabled span.ui-state-default {
        color: white; 
        background-color: red;
        border-color: black;
      }
    </style>
  </head>
<body onload="display_ct();">
  
    <!-- Your Chat Plugin code -->
  <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
       <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script> 

    
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="100411365228526">
      </div>
      
	<!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>"/>
    <input type="hidden" id="segment" value="<?php echo $this->uri->segment(2); ?>"/>
    <!-- Header Section Begin -->
    <header class="header-section no-print">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                  <?php foreach ($sectionD as $secD) { ?>
                    <a href="#"><img src="<?php echo base_url(); ?>assets/img/logo/<?php echo $secD->company_logo; ?>" alt=""></a>
                   <?php } ?>
                </div>
                <div class="nav-right">
                    <?php echo $_SESSION["session_path"]; ?>
                </div>
              <nav class="main-menu">
                <ul>
                    <li class="<?php if($mode == 'main'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/index">Home</a></li>
                    <li class="<?php if($mode == 'reservations'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/view_reservations">Reservations</a></li>
                    <li class="<?php if($mode == 'rates_and_packages'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/rates_and_packages">Rates and Packages</a></li>
                    <li class="<?php if($mode == 'schedule_of_events'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/schedule_of_events">Schedule of Events</a></li>
                     <li class="<?php if($mode == 'contact_us'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/contact_us">Contact Us</a></li>
                </ul>
              </nav>
              <nav class="main-menu mobile-menu d-none">
                <ul>
                    <li class="<?php if($mode == 'main'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/index">Home</a></li>
                    <li class="<?php if($mode == 'reservations'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/view_reservations">Reservations</a></li>
                    <li class="<?php if($mode == 'rates_and_packages'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/rates_and_packages">Rates and Packages</a></li>
                    <li class="<?php if($mode == 'schedule_of_events'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/schedule_of_events">Schedule of Events</a></li>
                    <li class="<?php if($mode == 'contact_us'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/contact_us">Contact Us</a></li>
                    <li><?php echo $_SESSION["session_path_menu"]; ?></li>
                </ul>
              </nav>
          <div id="mobile-menu-wrap"></div>
       </div>
    </div>
</header>
    <!-- Header End -->
