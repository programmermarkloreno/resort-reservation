
<!-- ACCOMODATION SECTION -->
<section id="accomodation" class="contact-section spad wow fadeInUp" style="padding-bottom: 50px; padding-top: -50px;">
<div class="container intro-text">

<input type="hidden" id="reservation_mode" name="reservation_mode" value="<?php if(isset($_SESSION["mode"])){ echo $_SESSION["mode"]; } ?>">
<form id="reservation_form" class="contact-form" method="post" enctype="multipart/form-data" validate>
    <!-- Reservation Form -->
        <div id="accomodation-section" class="">
          <div class="row">
              <div class="col-12">
                  <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-sm-6 ">
                             <div class="contact-title">
                              <div class="section-title">
                                 <center><span><h4>Accomodation Details</h4></span></center>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 section-title">
                            <center>
                              <span id="datetime">
                              </span>
                            </center>
                          </div>
                        </div>
                       </div>
                      <input type="hidden" id="rs_id" name="rs_id" value="<?php echo $this->uri->segment(4); ?>">
                       <input type="hidden" id="e_code" name="e_code" value="<?php if(isset($_SESSION["token"])){ echo $_SESSION["token"]; } ?>">
                       <div class="col-12" style="padding-top: 20px;">
                          <div class="contact-title">
                            <div class="section-title">
                               <center><span>
                                  <label for="rs_code">Reservation Code:</label>
                                  <input type="text" id="rs_code" name="rs_code" value="<?php if(isset($_SESSION["reservation"])){ echo $_SESSION['reservation']; }else{ redirect('Client/reservation/'.$_SESSION["token"]); } ?>" readonly style="text-align: center;">
                                  </span></center>
                            </div>
                          </div>
                       </div>
                   </div>
                   <div class="row">
                        <div class="col-lg-6 col-sm-12 form-group">
                           <label for="rs_package"><b>Package:</b> <u><?php echo $packagesInfo[0]->Category_title; ?></u></label><br>
                           <label for="rs_price"><b>Price:</b>&nbsp; &nbsp; &nbsp; &nbsp;<u><?php echo 'PHP '.number_format($packagesInfo[0]->price, 2); ?></u></label>
                         </div>
                        <!-- <div class="col-lg-12 col-sm-12 form-group">
                             <label for="rs_occasion">Occasion type:</label>
                              <select class="custom-select" id="rs_occasion" name="rs_occasion" required>
                                      <option selected disabled>Select Occasion..</option>
                                      <?php //foreach ($occasion as $occasionkey) {
                                       // echo '<option value='.$occasionkey->type.'>'.$occasionkey->type.'</option>';} ?>
                                  </select>
                              </div> -->
                              <div class="col-lg-12 col-sm-12 form-group">
                                  <label for="rs_occasion">Occasion type:</label>
                                  <input class="form-control" type="text" id="rs_occasion" name="rs_occasion" value="<?php echo $occasionType; ?>" readonly>
                              </div>
                              <div class="col-lg-4 col-sm-12 form-group">
                                  <input type="hidden" id="reservation_days" value="<?php echo $days_reservation; ?>">
                                  <label for="rs_date">Event date:</label>
                                  <input class="form-control" type="text" id="rs_date" name="rs_date" placeholder="mm-dd-yyyy" required readonly>
                              </div>
                              <!-- <div class="col-lg-4 form-group">
                              </div> -->
                              <div class="col-lg-4 col-sm-12 form-group">
                                  <label for="rs_time">Time of arrival:</label>
                                  <input id="rs_time" class="form-control" type="text" name="rs_time" required readonly>
                              </div>
                              <div class="col-lg-4 col-sm-12 form-group">
                                  <label for="rs_days">Number of Day/s:</label>
                                  <input class="form-control" type="number" id="rs_days" name="rs_days" placeholder="No. of Day/s" min="1" max="15" required>
                              </div>
                              <div class="col-lg-6 col-sm-12 form-group">
                                  <label for="rs_guest">Good for:</label>
                                  <input id="rs_guest" class="form-control" type="text" name="rs_guest" value="<?php echo $packagesInfo[0]->capacity; ?>" required readonly>
                              </div>
                               <div class="col-lg-6 col-sm-12 form-group">
                                  <small><label for="rs_excess">If excess to the max. no of guests *Note -<u class="text-danger">Subject for admin approval!</u>:</label></small>
                                  <input id="rs_excess" class="form-control" type="number" name="rs_excess" placeholder="Excess Guests" min="1" max="10">
                              </div>
                              <div class="col-lg-12 col-sm-12 form-group">
                                 <label for="rs_message">Special Instructions:</label>
                                 <textarea class="subject" id="rs_message" name="rs_message" placeholder="Special Instructions."></textarea>
                              </div>
                          </div>
                      </div>
                   </div><!-- endrow -->
                  <div id="btn-continue" class="row form-group">
                    <div class="col-lg-12">
                       <center><button type="submit" id="next-btn" class="btn btn-primary"> NEXT </button></center>
                      </div>
                  </div>
                     <!-- end row add cottages -->
               </div>
          <!-- </form> -->
              <!-- End Reservation Form -->
        </form>
            <div class="row" style="padding-top: 20px;">
               <div class='col-lg-12'><center>
                <label class="alert alert-danger alert-dismissible" style="display: none;"></label>
                </center> 
             </div>
                   <!--  <div id="alert-danger-b" class="alert alert-danger alert-dismissible" style="display: none;"></div> -->

        </div>
      </div>
  </section>
  <!-- END ACCOMODATION SECTION -->