<section class="contact-section spad wow fadeInUp" style="padding-bottom: 50px;">
    <div class="container intro-text">
<!-- NO PERMISSION PAGE  -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-title">
                        <center>
                            <i class="fas fa-check-circle fa-3x"></i>
                            <div class="section-title text-dark" style="padding-top: 20px;">
                            <span>RESERVATION CODE: <?php if(isset($_SESSION["reservation"])){ echo $_SESSION["reservation"]; }?></span>
                            <h2>You successfully created your reservation.</h2>
                            <span></span>
                        </div>
                      </center>
                    </div>
                     <div class="d-flex justify-content-center" style="padding-top: 50px;">
                    <a href="<?php echo base_url(); ?>Client/invoice/<?php if(isset($_SESSION["token"])) { echo $_SESSION["token"]; }?>" class="primary-btn"> View My Invoice </a>
                   </div>
                </div>
                <div class="col-lg-4">
                 <?php foreach ($sectionD as $secD): ?>
                    <div class="info-box">
                        <img src="<?php echo base_url(); ?>assets/img/logo/<?php echo $secD->company_logo; ?>" alt="" style="background: rgb(0,0,0);">
                        <ul>
                            <li><?php echo $secD->company_address; ?></li>
                            <li>For reservation, <br/>please contact us at &nbsp;<br/> <b><?php echo $secD->company_no; ?></b>, &nbsp; <b><?php echo $secD->company_tel; ?></b></li>
                            <li><a class="text-info" href="mailto:<?php echo $secD->company_email; ?>"><?php echo $secD->company_email; ?></a></li>
                            <li>Everyday: 08:00 -18:00</li>
                        </ul>
                        <div class="social-links">
                            <a href="<?php echo $secD->company_fbpage; ?>"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                 <?php endforeach; ?>
                </div>
            </div>
          <!-- END NO PERMISSION PAGE  -->
    </div>
</section>