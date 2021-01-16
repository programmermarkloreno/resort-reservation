<!-- Reservation Summary -->
<section id="accomodation" class="contact-section spad wow fadeInUp" style="padding-bottom: 50px; padding-top: -50px;">
<div class="container intro-text">
<div id="terms" class="white-popup mfp-hide">
 <section class="intro-section">
     <div class="container intro-text">
      <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <span><h5>Payment Terms and Conditions</h5></span><br>
                <p><?php echo $sectionD[0]->company_termsAndconditions; ?></p>
            </div>
        </div>
      </div>
   </div>
  </section>
</div>
<input type="hidden" name="token" id="token" value="<?php if(isset($_SESSION["token"])) { echo $_SESSION["token"]; } ?>">
 <form id="reservation_form_summary" class="contact-form" method="post" enctype="multipart/form-data" validate>
<div class="row">
	<div class="col-12">
		<input type="hidden" name="datetime_val" id="datetime_val" value="" readonly="">
	</div>
</div>
<div id="reservation_summary" class="row">
  <div class="col-md-12">
      <div class="card card-secondary">
        <div class="card-header">
          <div class="card-title">
          Reservation Summary & Payment Details
          <!-- <a href="<?php //echo base_url(); ?>Client/reservation/<?php //if(isset($_SESSION["token"])) { echo $_SESSION["token"].'/additional/'.$_SESSION["days"]; }?>" type="submit" class="btn btn-primary float-right text-white"> Additional Reservation </a> -->
         </div>
        </div>
        <div class="card-body">
              <!-- Table row -->
          <div class="row form-group">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Reserve</th>
                  <th>Day/s reserve</th>
                  <th>Desc.</th>
                  <th>Price</th>
                </tr>
                </thead>
                <tbody id="tbl-summary">
               
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
           <p>Reservation date/s:</p>
           <div class="table-responsive">
            <table class="table">
               <tr>
                <th style="width:30%">Arrival Time:</th>
                <td id="arrival"></td>
              </tr>
               <tr>
                <th style="width:10%">From:</th>
                <td id="dateFrom"></td>
              </tr>
              <tr>
                <th style="width:10%">To:</th>
                <td id="dateTo"></td>
              </tr>
              <tr>
                <th style="width:10%">Day's:</th>
                <td id="days"></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-6">
          <p>*(package price * total days) + excess guest's rates:</p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Guest's:</th>
                <td id="guest"></td>
              </tr>
              <tr>
                <th>Excess Guest's:</th>
                <td id="exGuest"></td>
              </tr>
              <tr>
                <th>Excess guest's Rates:</th>
                <td id="exRates"></td>
              </tr>
              <tr>
                <th style="width:50%">Total Price:</th>
                <td id="totalAmount"></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
       <input class="form-group" type="hidden" name="rs_total" id="rs_total" value="0"/>
      <input class="form-group" type="hidden" name="rs_total_add" id="rs_total_add" value="0"/>
        <div class="row form-group">
          <div class="col-lg-12 col-sm-12">
                <label for="rs_modeofpayment">Mode of Payment:</label>
                <select class="custom-select" id="rs_modeofpayment" name="rs_modeofpayment" required>
                    <option selected disabled>Select mode of payment..</option>
                    <option value="0">Cash</option>
                    <option value="1">Bank to Bank</option>
                </select>
          </div>
        </div>
        <div class="row form-group">
            <div class="col-auto">
                  <div class="custom-checkbox custom-control">
                      <input class="custom-control-input" type="checkbox" value="" id="rs_agree" name="rs_agree" required>
                      <label class="custom-control-label" for="rs_agree">
                          I agree to the <a href="#terms" class="text-info open-popup-link">payment terms and conditions</a>.
                      </label>
                  </div>
              </div>
           </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="row form-group">
           <div class="col-lg-5 col-sm-12 col-md-5">
              <center><button id="reservation-submit" type="submit" class="btn btn-primary"> RESERVE </button></center>
          </div>
          <div class="col-lg-2 col-sm-12 col-md-2" style="padding-top: 10px;"></div>
          <div class="col-lg-5 col-sm-12 col-md-5">
             <center><button type="button" class="btn btn-danger"> CANCEL </button></center>
          </div>
         </div>
       </div>
      </div>
      <!-- /.card -->
    </div>
  
 </div>
</form>
 <div class="row" style="padding-top: 20px;">
       <div class='col-lg-12'><center>
        <label class="alert alert-danger alert-dismissible" style="display: none;"></label>
        </center> 
     </div>
</div>
<!-- End Reservation Summary -->
</div>
</section>