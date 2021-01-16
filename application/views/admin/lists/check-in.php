
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-calendar-plus"></i>&nbsp; Check-In</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Reservation</li>
               <li class="breadcrumb-item active">Check-In</li>
            </ol>
          </div>
        </div>
        
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
         <div class="row">
           <div class='alert alert-danger alert-dismissible col-lg-12' style="display: none;">
           </div>
           <div class='alert alert-success alert-dismissible col-lg-12' style="display: none;">
           </div>    
         </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="callout" style="background: white;color: #343B41;border-left: 5px solid transparent">
              <div class="row" style="padding-top: 20px; padding-bottom: 10px;">
                  <!-- <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-block btn-primary btn-new">New Reservation</button>
                  </div> -->
                  <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12"></div>
                  <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <!-- <div class="form-group">
                      <div class="input-group date">
                        <input type="text" class="form-control search-query" placeholder="Search Reservation Code" id="searchField"> -->
                         <!-- <div class="input-group-addon"> 
                          <i class="fa fa-search"></i>
                        </div>-->
                      <!-- </div>
                    </div> -->
                  </div>
                </div>
               <div class="box-body table-responsive">
                   <table class="table table-bordered table-striped table-hover projects">
                    <caption id="tbl-caption" style="text-align: center;"></caption>
                        <thead style=" font-size: 12px; font-weight: unset; background: #343B41; color: white;">
                        <tr>
                          <th><center>Customer ID</center></th>
                          <th><center>Reservation Code</center></th>
                          <th><center>Company</center></th>
                          <th><center>Contact</center></th>
                          <th><center>Check-in Datetime</center></th>
                          <th><center>Expected Departure</center></th>
                          <th><center>Occassion</center></th>
                          <th><center>Total Bill</center></th>
                          <th><center>Balance</center></th>
                          <th><center>Actions</center></th>
                        </tr>
                        </thead>
                        <tbody id="table"></tbody>
                  </table>
              </div>
            </div> 
         </div>
        </div>
      </div>

      <div class="modal fade" id="checkout-btn">
          <div class="modal-dialog modal-lg">
            <form id="checkout-accomodation" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
               <div class="modal-content">
                  <div class="modal-header bg-warning">
                    <h4 class="modal-title text-dark" style="color: white"> Check-Out</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                  </div>

                  <div class="modal-body">
                    <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">
                          <blockquote id="down-code"></blockquote>
                          <input class="form-control" type="hidden" name="rs-id" id="rs-id" value="">
                          <!-- <input class="form-control" type="hidden" name="rs-down-bal" id="rs-down-bal" value="">
                          <input class="form-control" type="hidden" name="rs-down-newbal" id="rs-down-newbal" value="">
                          <input class="form-control" type="hidden" name="rs-down-totalbill" id="rs-down-totalbill" value=""> -->
                            <div class="row">
                              <div class="col-lg-6 form-group">
                                  <label for="pay_TotalBill_chkout">Total Bill:</label>
                                  <input type="text" class="form-control" id="pay_TotalBill_chkout" name="pay_TotalBill_chkout" readonly="">
                              </div>
                              <div class="col-lg-6 form-group">
                                  <label for="pay_Balance_chkout">Current Balance:</label>
                                  <input type="text" class="form-control" id="pay_Balance_chkout" name="pay_Balance_chkout" readonly>
                                  <input type="hidden" class="form-control" id="tmp_Balance_chkout" name="tmp_Balance_chkout">
                              </div>
                              <div class="col-lg-12 form-groupi is-zero-balance">
                                    <label for="pay_MOP_chkout">Mode of Payment:</label>
                                    <select class="custom-select pay_modeofpayment" id="pay_MOP_chkout" name="pay_MOP_chkout" required="" readonly="true">
                                        <option selected disabled>Select mode of payment..</option>
                                        <option value="0">Cash</option>
                                        <option value="1">Bank to Bank</option>
                                    </select>
                              </div>
                              <div class="col-lg-4 form-group bank-details-form d-none">
                                  <label for="pay_bank_name_chkout">Bank Name:</label>
                                  <input type="text" class="form-control" id="pay_bank_name_chkout" name="pay_bank_name_chkout" placeholder="Enter bank name" required>
                              </div>
                              <div class="col-lg-4 form-group bank-details-form d-none">
                                  <label for="cc_number_chkout" class="control-label">Account Number: <small class="text-muted"><span class="cc-brand text-danger"></span></small></label>

                                  <input id="cc_number_chkout" type="tel" class="input-lg form-control cc-number" name="cc_number_chkout" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
                                  <h2 class="validation"></h2>
                              </div>
                              <div class="col-lg-4 form-group bank-details-form d-none">
                                  <label for="pay_acc_name_chkout">Account Name:</label>
                                  <input type="text" class="form-control" id="pay_acc_name_chkout" name="pay_acc_name_chkout" placeholder="Enter Account Name" required>
                              </div>
                              <!-- <div class="col-lg-6 form-group">
                                  <label for="chkout_totamount">Total Amount (PHP):</label>
                                  <input type="number" class="form-control" id="chkout_totamount" name="chkout_totamount"  placeholder="0" value="0" readonly="">
                                  <input type="hidden" class="form-control" id="chkout_amount" name="chkout_amount" value="0">
                              </div> -->
                              <div class="col-lg-6 form-group is-zero-balance">
                                  <label for="chkout_cash">Cash Tendered:</label>
                                  <input type="number" class="form-control" id="chkout_cash" name="chkout_cash" placeholder="PHP 0.00" required="">
                              </div>
                              <div class="col-lg-6 form-group is-zero-balance">
                                  <label for="chkout_change">Change (PHP):</label>
                                  <input type="number" class="form-control" id="chkout_change" name="chkout_change" placeholder="PHP 0.00" readonly="" value="0">
                              </div>
                              <div class="col-lg-12 form-group">
                                  <label for="chkout_status">Update Status:</label>
                                  <select type="text" class="form-control" name="chkout_status" id="chkout_status" required>
                                        <option disabled selected> -- Select --</option>
                                        <option value="Check-In">Check-In</option>
                                        <option value="Finished">Check-Out</option>
                                   </select>
                              </div>
                              <div class="col-lg-6 form-group form-check form-inline asked-checkout-label d-none">
                                  <label id="asked-mes"></label>
                              </div>
                              <div class="col-lg-6 form-group form-check form-inline asked-checkout d-none">
                                   <div class="form-check">
                                    <input type="radio" class="form-check-input form-control" name="radiotender" id="radioYes" required="">
                                    <label class="form-check-label" for="radioYes">Yes</label>
                                  </div>&nbsp;&nbsp;
                                  <div class="form-check">
                                    <input type="radio" class="form-check-input form-control" name="radiotender" id="radioNo" required="">
                                    <label class="form-check-label" for="radioNo">No</label>
                                  </div>
                              </div>
                            </div>
                       </div>
                  </div>
                  <div class="modal-footer">
                    <button type="reset" class="btn" data-dismiss="modal" style="background: transparent;border-color: #343B41;color: #343B41;text-transform: uppercase;"> Cancel </button>
                    <button id="btn-chkout" type="submit" class="btn btn-warning" style="border: #40b6f9;text-transform: uppercase;"> Check-In/Out </button>
                  </div>
              </div>
            </form>
          </div>
      </div>

      <div class="modal fade" id="additional-btn">
          <div class="modal-dialog modal-lg">
            <form id="additional-accomodation" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
               <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h4 class="modal-title text-dark" style="color: white"> Additional </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                  </div>

                  <div class="modal-body">
                    <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">
                          <blockquote id="additional-down-code"></blockquote>
                          <input class="form-control" type="hidden" name="rs-additional-id" id="rs-additional-id" value="">
                            <div class="row">
                              <div class="d-flex justify-content-center my-4 col-lg-6">
                                <div class="w-100">
                                  <input type="range" class="custom-range" id="customDaysRange" name="customDaysRange" min="1" max="15">
                                </div>
                                <span class="font-weight-bold text-primary ml-2 valueSpan"></span>
                              </div>
                              <div class="col-lg-6 form-group">
                                   <label for="additional-pckgs"> Additional: </label>
                                  <select type="text" class="form-control" name="additional-pckgs" id="additional-pckgs" required>
                
                                   </select>
                              </div>
                              <div class="col-lg-6 form-group">
                                  <label for="additional-pckgs-price">Price:</label>
                                  <input type="number" class="form-control" id="additional-pckgs-price" name="additional-pckgs-price" placeholder="PHP 0.00" value="0" readonly="">
                              </div>
                              <div class="col-lg-6 form-group">
                                  <label for="additional-pckgs-cpcty">Capacity:</label>
                                  <input type="number" class="form-control" id="additional-pckgs-cpcty" name="additional-pckgs-cpcty"  placeholder="0" value="0" readonly="">
                              </div>
                              <div class="col-lg-6 form-group">
                                  <label id="currentBal"></label>
                              </div>
                              <div class="col-lg-6 form-group">
                                  <label id="additional-pckgs-total"></label>
                              </div>
                              <div class="col-lg-12 form-group">
                                    <label for="pay_modeofpayment">Mode of Payment:</label>
                                    <select class="custom-select pay_modeofpayment" id="pay_modeofpayment" name="pay_modeofpayment" required="">
                                        <option selected disabled>Select mode of payment..</option>
                                        <option value="0">Cash</option>
                                        <option value="1">Bank to Bank</option>
                                    </select>
                              </div>
                              <div class="col-lg-4 form-group bank-details-form d-none">
                                  <label for="pay_bank_name">Bank Name:</label>
                                  <input type="text" class="form-control" id="pay_bank_name" name="pay_bank_name" placeholder="Enter bank name" required>
                              </div>
                              <div class="col-lg-4 form-group bank-details-form d-none">
                                  <label for="cc_number" class="control-label">Account Number: <small class="text-muted"><span class="cc-brand text-danger"></span></small></label>

                                  <input id="cc_number" type="tel" class="input-lg form-control cc-number" name="cc_number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
                                  <h2 class="validation"></h2>
                              </div>
                              <div class="col-lg-4 form-group bank-details-form d-none">
                                  <label for="pay_acc_name">Account Name:</label>
                                  <input type="text" class="form-control" id="pay_acc_name" name="pay_acc_name" placeholder="Enter Account Name" required>
                              </div>
                              <div class="col-lg-6 form-group">
                                  <label for="additional-pckgs-total">Total Amount (PHP):</label>
                                  <input type="number" class="form-control" id="additional-pckgs-totAmount" name="additional-pckgs-totAmount"  placeholder="0" value="0" readonly="">
                                  <input type="hidden" class="form-control" id="additional-amount" name="additional-amount" value="0">
                              </div>
                              <div class="col-lg-6 form-group">
                                  <label for="additional-pckgs-payment">Cash Tendered:</label>
                                  <input type="number" class="form-control" id="additional-pckgs-payment" name="additional-pckgs-payment" placeholder="PHP 0.00" required>
                              </div>
                              <div class="col-lg-12 form-group">
                                  <label for="additional-pckgs-change">Change (PHP):</label>
                                  <input type="number" class="form-control" id="additional-pckgs-change" name="additional-pckgs-change" placeholder="PHP 0.00" readonly="">
                              </div>
                              <!-- <div class="col-lg-6 form-group">
                                  <label for="additional-pckgs-payment">Payment (PH:</label>
                                  <input type="number" class="form-control" id="additional-pckgs-payment" name="additional-pckgs-payment"  placeholder="Please enter payment." value="" required="">
                              </div> -->
                              
                            </div>
                       </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background: transparent;border-color: #343B41;color: #343B41;text-transform: uppercase;"> Cancel </button>
                    <button type="submit" class="btn btn-primary" style="border: #40b6f9;text-transform: uppercase;"> Add </button>
                  </div>
              </div>
            </form>
          </div>
      </div>

      <div class="modal fade" id="extend-btn">
          <div class="modal-dialog">
            <form id="extend-accomodation" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
               <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h4 class="modal-title text-dark" style="color: white"> Extend </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                  </div>

                  <div class="modal-body">
                    <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">
                          <blockquote id="extend-down-code"></blockquote>
                          <input class="form-control" type="hidden" name="rs-extend-id" id="rs-extend-id" value="">
                            <div class="row">
                              <div class="d-flex justify-content-center my-4 col-lg-12">
                                <div class="w-100">
                                  <input type="range" class="custom-range" id="customDaysRanges" name="customDaysRanges" min="1" max="1">
                                </div>
                                <span class="font-weight-bold text-primary ml-2 valueSpan"></span>
                              </div>
                              <!-- <div class="slider-red">
                                  <input type="text" value="" class="slider form-control" data-slider-min="5" data-slider-max="15"
                                       data-slider-step="1" data-slider-value="[1,15]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show">
                                </div> -->
                              <!-- <div class="col-lg-12 form-group">
                                   <label for="additional-pckgs"> Extend: </label>
                                  <select type="text" class="form-control" name="additional-pckgs" id="additional-pckgs" required>
                
                                   </select>
                              </div> -->
                            </div>
                       </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background: transparent;border-color: #343B41;color: #343B41;text-transform: uppercase;"> Cancel </button>
                    <button type="submit" class="btn btn-primary" style="border: #40b6f9;text-transform: uppercase;"> Extend </button>
                  </div>
              </div>
            </form>
          </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

