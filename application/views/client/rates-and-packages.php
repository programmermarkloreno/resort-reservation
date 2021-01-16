<!--Accomodation Section Begin -->
<?php foreach ($categories as $categorieskey): ?>
    <section class="room-section wow fadeInUp">
        <div class="container-fluid">
             <div class="row">
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
                <div class="row bg-light">
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
                                          <p><h4><?php echo $subcategorieskey["Category_title"]; ?></h4></p>
                                          <p><h5>Price:&nbsp <?php echo 'P'.'  '.number_format($subcategorieskey["price"], 2); ?></h5></p>
                                        <p><h5>Good for <?php echo $subcategorieskey["capacity"]; ?> pax.</h5></p></center>
                                      </div>
                                    </div>
                                 </div>
                               </section>
                            </div>
                            <a href="#<?php echo $subcategorieskey["id"]; ?>" class="text-info open-popup-link">Show more..</a>
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