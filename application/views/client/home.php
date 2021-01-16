 <!-- Section A -->
<section class="room-section spad">
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-lg-12">
                     <div class="ri-slider-item">
                         <div class="ri-sliders owl-carousel">
                            <?php foreach ($sectionA as $secA): ?>
                              <div class="single-img set-bg" data-setbg="<?php echo base_url() ?>assets/client/img/sec-A/<?php echo $secA->img_filename; ?>" style="width: auto;"><!-- <h1 style="font-size: 50px; color: #ffffff; font-weight: 600;">Welcome to Hoyoland</h1> -->
                                </div>
                             <?php endforeach; ?>
                            </div>
                       </div>
                 </div>
            </div> 
        </div>
</section>

<?php foreach ($categories as $categorieskey): ?>
    <section class="room-section" style="padding-top: -50px;">
        <div class="container-fluid">
             <div class="row wow fadeInUp">
                <div class="col-lg-12">
                   <div class="ri-text">
                        <div class="section-title">
                            <div class="section-title">
                               <span>a memorable occasion</span>
                                <h2><?php echo $categorieskey["Category_title"]; ?></h2>
                            </div>
                           <p><?php echo $categorieskey["Category_desc"]; ?></p>
                        </div>
                    </div>
                </div>
             </div>
         <?php $switchA = 1; $switchB = 2;?>
          <?php foreach ($subcategories as $subcategorieskey): ?>
              <?php if($subcategorieskey["parent_id"] == $categorieskey["id"]): ?> 
                <div class="row bg-light wow fadeInUp">
                  <div class="col-lg-6 order-lg-<?php echo $switchA; ?>">
                      <div class="ri-slider-item">
                          <div class="ri-sliders owl-carousel">
                            <?php foreach ($subcatfiles as $subcatfileskey): ?>
                              <?php if($subcatfileskey["Subcategory_Id"] == $subcategorieskey["sub_category_id"]): ?>
                                 <div class="single-img set-bg" data-setbg="<?php echo base_url().'assets/img/acommodationfile/'.$subcatfileskey["imgfile_name"]; ?>"></div>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </div>
                      </div>
                  </div>
                <div class="col-lg-6 order-lg-<?php echo $switchB; ?>">
                    <div class="ri-text">
                        <div class="section-title">
                            <div class="section-title">
                                <!-- <span>a memorable holliday</span> -->
                                <h2><?php echo $subcategorieskey["Category_title"]; ?></h2>
                            </div>
                            <p><?php echo $subcategorieskey["Category_desc"]; ?></p>
                            <!-- <div class="ri-features">
                                <div class="ri-info">
                                    <i class="flaticon-019-television"></i>
                                    <p>Smart TV</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-029-wifi"></i>
                                    <p>High Wi-fii</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-003-air-conditioner"></i>
                                    <p>AC</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-036-parking"></i>
                                    <p>Parking</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-007-swimming-pool"></i>
                                    <p>Pool</p>
                                </div>
                            </div> -->
                            <div id="<?php echo $subcategorieskey["id"]; ?>" class="white-popup mfp-hide">
                               <section class="intro-section">
                                   <div class="container intro-text">
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <center>
                                          <p><h5><?php echo $subcategorieskey["Category_title"]; ?></h5></p>
                                          <p><h5>Price:&nbsp; <?php echo 'P'.'  '.number_format($subcategorieskey["price"], 2); ?></h5></p>
                                        <p><h5>Good for <?php echo $subcategorieskey["capacity"]; ?> person's</h5></p></center>
                                      </div>
                                    </div>
                                 </div>
                               </section>
                            </div>
                          <!--   <a href="#<?php //echo $subcategorieskey["id"]; ?>" class="text-info open-popup-link">Show more..</a> -->
                            <!-- <a href="<?php //echo base_url(); ?>Client/acc/<?php// if(isset($_SESSION["token"])) { echo $_SESSION["token"].'/'.$subcategorieskey["id"]; }?>" class="primary-btn">Make a Reservation</a> -->
                            <a href="<?php echo $_SESSION["session_path_home"]; ?>" class="primary-btn wow pulse">Schedule a Reservation</a>
                        </div>
                      </div>
                  </div>
                </div>
              <?php if($switchA == 2 && $switchB = 1){ $switchA = 1; $switchB = 2; }else{$switchA = 2; $switchB = 1;}?>
             <?php endif; ?>
          <?php endforeach; ?>
        </div>
    </section>
<?php endforeach; ?>
    <!-- END ROOM SELECTION -->


<?php foreach ($sectionD as $secD): ?>
<section class="intro-section wow fadeInUp" style="padding-top: 10px;
    padding-bottom: 50px;">
        <div class="container intro-text">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Mission</h2>
                    </div>
                    <p><?php echo $secD->company_mission; ?></p>
                </div>
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Vision</h2>
                    </div>
                    <p><?php echo $secD->company_vision; ?></p>
                </div>
            </div>
        </div>
  </section>
<?php endforeach; ?>

 <!-- Section C -->
<section class="testimonial-section spad wow fadeInUp" style="padding: 50px 50px;">
    <center><div class="container">
            <div class="row">
                <div class="section-title col-lg-12">
                    <h2>Reviews</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                     <div class="ri-slider-item">
                         <div class="ri-sliders owl-carousel">
                            <?php foreach ($sectionC as $secC): ?>
                                <div class="testimonial-item">
                                    <div class="ti-time">
                                        <?php echo $secC->date_created; ?>
                                    </div>
                                    <h4><?php echo $secC->satisfactory; ?></h4>
                                    <div class="rating">
                                <?php for($a=$secC->star; $a>0; $a--){ ?>
                                        <i class="fa fa-star"></i>
                                    <?php } ?>
                                    </div>
                                    <p><?php echo $secC->comments; ?></p>
                                    <div class="ti-author">
                                        <div class="author-text">
                                            <h6><?php echo $secC->name; ?><span><?php echo $secC->address; ?></span></h6>
                                        </div>
                                    </div>
                                </div>
                         <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div></center>
</section>
<!-- <div class="video-section">
        <div class="video-bg set-bg" data-setbg="<?php //echo base_url(); ?>assets/client/img/eventhall3.jpg"></div> -->
        <!-- <div class="container">
            <div class="video-text set-bg" data-setbg="img/video-inside-bg.jpg">
                <a href="https://www.youtube.com/watch?v=j56YlCXuPFU" class="pop-up"><i class="fa fa-play"></i></a>
            </div>
        </div> -->
<!-- </div> -->

 <section class="hero-area set-bg wow fadeInUp" data-setbg="<?php echo base_url(); ?>assets/client/img/h2.jpg" style="height: 750px; width: auto;">
     <div class="container-fluid">
         <div class="row"> 
                <div class="col-lg-12 text-center">
                    <div class="hero-text">
                       <h1 id="rotate" style="font-size: 50px; color: #ffffff;font-weight: 600;">High Level Experience, Make Yourself at Home, The places you'd rather be, Refined by Nature</h1>
                 </div>
              </div>
          </div>
    </div>
 </section>

<?php foreach ($sectionD as $secD): ?>
  <section class="intro-section wow fadeInUp" style="padding-top: 50px;
    padding-bottom: 50px;">
        <div class="container">
            <div class="row intro-text">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>About Us</h2>
                    </div>
                    <?php echo $secD->company_about; ?>
                </div>
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>History</h2>
                    </div>
                    <p><?php echo $secD->company_history; ?></p>
                </div>
            </div>
        </div>
</section>
<?php endforeach; ?>
    