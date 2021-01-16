<!doctype html>
<html lang="en">
<head>
  <title><?php echo $title; ?></title>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Script-Type" content="type">
   <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="0qsyU5szxJdRRpR24JzUDwAyetlxL5sq4xWMLaPQFxo" />

	<link rel="shortcut icon" type='image/x-icon' href="<?php echo base_url(); ?>assets/img/icon/<?php echo $profile[0]->company_icon; ?>">
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery --> 
  <script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/template/plugins/jquery-ui/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/jquery-ui/jquery-ui.min.css">
  <script src="<?php echo base_url(); ?>assets/template/plugins/jquerycard/jquery.payment.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/plugins/creditcard/dist/creditcard.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/Ionicons/css/ionicons.min.css">
   <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/fullcalendar-bootstrap/main.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/adminlte.min.css">
 <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/select2/css/select2.min.css">
  <!-- daterange picker -->
  <!-- <link rel="stylesheet" href="assets/template/plugins/daterangepicker/daterangepicker.css"> -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/daterangepicker-0.1.0/dist/daterangepicker.css">
  <script data-ad-client="ca-pub-9297405359948501" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

  
  <!-- bootstrap slider -->
  <!-- <link rel="stylesheet" href="assets/template/plugins/bootstrap-slider/css/bootstrap-slider.min.css"> -->
   <!-- <script src="assets/client/template/bootstrap/js/bootstrap.min.js"></script> -->
  <?php

    if($this->uri->segment(3) == 'all' || $this->uri->segment(2) == 'audit_logs' ||$this->uri->segment(2) == 'user_management' || $this->uri->segment(2) == 'customer' || $this->uri->segment(2) == 'reports'){
      echo '<link href="'.base_url().'assets/bootstrap-table/2.2.0/colors.min.css" rel="stylesheet">
          <link href="'.base_url().'assets/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
         <script src="'.base_url().'assets/bootstrap-table/dist/tableExport.min.js"></script>
             <script src="'.base_url().'assets/bootstrap-table/dist/bootstrap-table.min.js"></script>
            <script src="'.base_url().'assets/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js"></script>
            <script src="'.base_url().'assets/bootstrap-table/dist/extensions/print/bootstrap-table-print.min.js"></script>
            <script src="'.base_url().'assets/bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
            <script src="'.base_url().'assets/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>
            <script src="'.base_url().'assets/bootstrap-table/dist/bootstrap-table-locale-all.min.js"></script>
           
        ';
    }
   ?>
 
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
           $('.date-time').val(datetime);
           $('.sidebar-time').html(datetime);
           display_c();
         }

    </script>

 
  <style type="text/css">
    .info-box{
      transition: transform 250ms ease-in-out,
      opacity 250ms linear;
    }
    .info-box:hover, .info-box:focus{
      /*transform: scale(1.);*/
      opacity: .9;
    }
    .ic:hover, .ic:focus{
      transform: scale(1.1);
      opacity: .9;
    }
    .ui-datepicker-unselectable.ui-state-disabled span.ui-state-default {
        color: white; 
        background-color: red;
        border-color: black;
      }
      
    .is-invalid input {
      border-width: 2px;
    }

    .is-valid input {
      border-width: 2px;
    }
  </style> 
   <!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed" onload="display_ct();">
<!-- <body class="hold-transition sidebar-mini layout-fixed" onload="display_ct();"> -->
 <!-- Load Facebook SDK for JavaScript -->
     <!--  <div id="fb-root"></div>
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
 -->
      <!-- Your Chat Plugin code -->
      <!-- <div class="fb-customerchat"
        attribution=setup_tool
        page_id="100411365228526">
      </div> -->

  <!-- <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId            : '100411365228526',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v9.0'
          });
        };
  </script>
<div class="fb-messengermessageus" 
    messenger_app_id="100411365228526" 
    page_id="100411365228526"
    color="<blue | white>"
    size="<standard | large | xlarge>">
  </div> -->

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<input type="hidden" name="response_mode" id="response_mode" value="<?php echo $this->uri->segment(4); ?>">
<input type="hidden" name="response_con" id="response_con" value="<?php echo $this->uri->segment(5); ?>">
<input type="hidden" class="date-time" name="global-time" id="global-time">
<!-- Site wrapper -->
<div class="wrapper">
