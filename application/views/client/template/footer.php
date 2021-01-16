<footer class="footer-section no-print">
    <?php foreach ($sectionD as $secD): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-item">
                        <div class="footer-logo">
                            <a href="#"><img src="<?php echo base_url(); ?>assets/img/logo/<?php echo $secD->company_logo; ?>" alt=""></a>
                        </div>
                        <p><?php echo $secD->company_footertxt; ?></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-item">
                    </div>
                </div>
                <div id="contact" class="col-lg-4">
                    <div class="footer-item">
                        <h5>Contact Us</h5>
                        <ul>
                            <li><img src="<?php echo base_url(); ?>assets/client/template/img/placeholder.png" alt=""><?php echo $secD->company_address; ?></li>
                            <li><img src="<?php echo base_url(); ?>assets/client/template/img/phone.png" alt="">
                            <p class="section-description">For reservation, please contact us at &nbsp;<br> <b><?php echo $secD->company_no; ?></b>, &nbsp; <b><?php echo $secD->company_tel; ?></b>, &nbsp;<br> <a href="mailto:<?php echo $secD->company_email; ?>"><?php echo $secD->company_email; ?></a></p></li>

                         <li><p class="section-description"><i class="fa fa-facebook-square" aria-hidden="true"></i><a href="<?php echo $secD->company_fbpage; ?>" target="_blank">Like us</a> & <a href="<?php echo $secD->company_fb; ?>" target="_blank">Add us</a></p>
                         </li>
                        </ul> 
                    </div>
                </div>
            </div>
        </div>
<?php endforeach; ?>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                     <ul>
                        <li class="<?php if($mode == 'main'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/index">Home</a></li>
                         <li class="<?php if($mode == 'reservations'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/view_reservations">Reservations</a></li>
                        <li class="<?php if($mode == 'rates_and_packages'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/rates_and_packages">Rates and Packages</a></li>
                        <li class="<?php if($mode == 'schedule_of_events'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/schedule_of_events">Schedule of Events</a></li>
                         <li class="<?php if($mode == 'contact_us'){ echo 'active';}else{ echo '';} ?>"><a href="<?php echo base_url()?>Client/contact_us">Contact Us</a></li>
                        <li><a href="<?php echo $_SESSION["session_path_home"]; ?>">Schedule a Reservation</a></li>
                       </ul>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-lg-12 ">
                        <div class="small text-white text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Powered by: <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                    </div>
                </div>

            </div>
        </div>
    </footer>

  <!-- loader -->
 <!--  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->

<!-- Js Plugins -->
     <script src="<?php echo base_url(); ?>assets/client/template/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/timepicker/jquery.timepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/template/bootstrap/js/bootstrap.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/client/template/js/jquery.magnific-popup.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-validation/additional-methods.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/client/template/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/template/js/jquery.slicknav.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/template/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/client/morphext/dist/morphext.min.js"></script>
    <script src="<?php echo base_url()?>assets/template/plugins/jQueryMask/dist/jquery.mask.js"></script>
   <!--  <script src="<?php //echo base_url()?>assets/template/plugins/inputmask/inputmask/inputmask.date.extensions.js"></script>
    <script src="<?php// echo base_url()?>assets/template/plugins/inputmask/inputmask/inputmask.numeric.extensions.js"></script>
    <script src="<?php //echo base_url()?>assets/template/plugins/inputmask/inputmask/inputmask.extensions.js"></script> -->
      <!-- Ekko Lightbox -->
    <!-- <script src="<?php //echo base_url(); ?>assets/template/plugins/ekko-lightbox/ekko-lightbox.min.js"></script> -->
    <!-- Filterizr-->
    <!-- <script src="<?php //echo base_url(); ?>assets/template/plugins/filterizr/jquery.filterizr.min.js"></script> -->
    
    <script src="<?php echo base_url(); ?>assets/client/wow/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script> 
    <?php 
         $base = base_url();
         $segment = $this->uri->segment(2);
         switch ($segment) {
             case 'index':
                echo '<script type="text/javascript" src="'.$base.'assets/js/client/'.$segment.'.js"></script>';
                 break;
             case 'signin':
                echo '<script type="text/javascript" src="'.$base.'assets/js/client/'.$segment.'.js"></script>';
                 break;
             case 'sign_up':
                echo '<script type="text/javascript" src="'.$base.'assets/js/client/'.$segment.'.js"></script>';
                 break;
             case 'accommodation':
                echo '<script type="text/javascript" src="'.$base.'assets/js/client/'.$segment.'.js"></script>';
                 break;
             case 'reservation_summary':
                echo '<script type="text/javascript" src="'.$base.'assets/js/client/'.$segment.'.js"></script>';
                 break;
             default:
                 # code...
                 break;
         }

    ?>
    <!-- <script type="text/javascript"> 
     window.addEventListener("load", window.print());
   </script> -->
    <script type="text/javascript">
      // var onloadCallback = function() {
      //   alert("grecaptcha is ready!");
      // };
      $(function(){

        
        

      });
    </script>
  </body>
</html>