<section class="contact-section spad wow fadeInUp" style="padding-bottom: 50px;">
    <div class="container intro-text">
<!-- SUCCESSFULL PAGE  -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- <div class="contact-title">
                        <center>
                            <i class="fas fa-check-circle fa-3x"></i>
                            <div class="section-title"> -->
                            <?php if(isset($_SESSION["successMsg"])){ echo $_SESSION["successMsg"]; } else { redirect('Client/signout'); } ?>
                       <!--  </div></center>
                    </div> -->
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
                            <!-- <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a> -->
                        </div>
                    </div>
                 <?php endforeach; ?>
                </div>
            </div>
        <!-- END SUCCESSFULL PAGE  -->
    </div>
</section>