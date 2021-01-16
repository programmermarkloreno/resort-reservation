 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>"> -->
     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-calendar-times"></i>&nbsp; Pending</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Reservation</li>
               <li class="breadcrumb-item active">Pending</li>
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
                  <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <!-- <button type="button" class="btn btn-block btn-primary new-btn">New Reservation</button> -->
                  </div>
                  <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12"></div>
                  <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <!-- <div class="form-group">
                      <div class="input-group date">
                        <input type="text" class="form-control search-query" placeholder="Search Reservation Code" id="searchField"> -->
                         <!-- <div class="input-group-addon"> 
                          <i class="fa fa-search"></i>
                        </div>-->
                     <!--  </div>
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
                          <th><center>Lastname</center></th>
                          <th><center>Firstname</center></th>
                          <th><center>Contact</center></th>
                          <th><center>Reserve Date</center></th>
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

      <div class="modal fade" id="down-btn">
          <div class="modal-dialog modal-lg">
            <form id="down-accomodation" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
               <div class="modal-content">
                  <div class="modal-header bg-warning">
                    <h4 class="modal-title text-dark" style="color: white">Update Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                  </div>

                  <div class="modal-body">
                    <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">
                          <blockquote id="down-code"></blockquote>
                          <input class="form-control" type="hidden" name="rs-down-id" id="rs-down-id" value="">
                          <input class="form-control" type="hidden" name="rs-down-csid" id="rs-down-csid" value="">
                          <input class="form-control" type="hidden" name="rs-down-bal" id="rs-down-bal" value="">
                          <input class="form-control date-time" type="hidden" name="date-time" value="">
                          <input class="form-control" type="hidden" name="rs-down-newbal" id="rs-down-newbal" value="">
                          <input class="form-control" type="hidden" name="rs-down-totalbill" id="rs-down-totalbill" value="">
                            <div class="form-row">
                              <div class="col-lg-6 form-group">
                                  <label for="Or_pay">OR #:</label>
                                  <input type="text" class="form-control" id="Or_pay" name="Or_pay" value="" readonly>
                              </div>
                              <div class="col-lg-6 form-group">
                                  <label for="pay_bal">Total Balance:</label>
                                  <input type="text" class="form-control" id="pay_bal" name="pay_bal" readonly>
                              </div>
                               <div class="col-lg-12 form-group">
                                    <label for="pay_modeofpayment">Mode of Payment:</label>
                                    <select class="custom-select" id="pay_modeofpayment" name="pay_modeofpayment" required="">
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
                                  <!-- <label for="pay_acc_no">Account No:</label>
                                  <input type="text" class="form-control" id="pay_acc_no" name="pay_acc_no" placeholder="XXXX-XXXX-XXXX-XXXX" required> -->
                                  <label for="cc_number" class="control-label">Account Number: <small class="text-muted"><span class="cc-brand text-danger"></span></small></label>

                                  <input id="cc_number" type="tel" class="input-lg form-control cc-number" name="cc_number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
                                  <h2 class="validation"></h2>
                              </div>
                              <div class="col-lg-4 form-group bank-details-form d-none">
                                  <label for="pay_acc_name">Account Name:</label>
                                  <input type="text" class="form-control" id="pay_acc_name" name="pay_acc_name" placeholder="Enter Account Name" required>
                              </div>
                              <div class="col-lg-12 form-group">
                                   <label class="text-muted"><span class="text-danger downpayment"></span></label>
                              </div>
                              <div class="col-lg-12 form-group">
                                  <label for="pay_payment">Amount Tendered:</label>
                                  <input type="number" class="form-control" id="pay_payment" name="pay_payment" placeholder="PHP 0.00" required>
                              </div>
                              <div class="col-lg-4 form-group form-check form-inline cash-method d-none">
                                  <label>Do you want to pay this in full?</label>
                              </div>
                              <div class="col-lg-8 form-group form-check form-inline cash-method d-none">
                                   <div class="form-check">
                                    <input type="radio" class="form-check-input form-control" name="radiotender" id="radioYes" required="">
                                    <label class="form-check-label" for="radioYes">Yes</label>
                                  </div>&nbsp;&nbsp;
                                  <div class="form-check">
                                    <input type="radio" class="form-check-input form-control" name="radiotender" id="radioNo" required="">
                                    <label class="form-check-label" for="radioNo">No</label>
                                  </div>
                              </div>
                              <div class="col-lg-12 form-group cash-method d-none">
                                  <label for="pay_change">Change (PHP):</label>
                                  <input type="number" class="form-control" id="pay_change" name="pay_change" placeholder="PHP 0.00" readonly="">
                              </div>
                              <div class="col-lg-12 form-group">
                                   <label for="status">Status:</label>
                                   <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="Pending" readonly="">
                                  <!-- <select type="text" class="form-control" name="status" id="status">
                                        <option value="Pending" selected>Pending</option>
                                        <option value="Confirmed">Confirmed</option>
                                   </select> -->
                              </div>
                             <!--  <div class="col-lg-12 form-group">
                                   <label for="status">Issue an summary invoice:</label>
                                   <select type="text" class="form-control" name="issueOR">
                                      <option value="0" selected>Generate an Invoice</option>
                                      <option value="1">Send via email</option>
                                   </select>
                              </div> -->
                            </div>
                       </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn cancel-down" data-dismiss="modal" style="background: transparent;border-color: #343B41;color: #343B41;text-transform: uppercase;">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-down-update" style="border: #40b6f9;text-transform: uppercase;">Update</button>
                  </div>
              </div>
            </form>
          </div>
      </div>

      <div class="modal fade" id="cancel-btn">
          <div class="modal-dialog"><!-- 
            <form id="cancel-accomodation" class="form-horizontal" method="post" enctype="multipart/form-data" validate> -->
               <div class="modal-content">
                  <div class="modal-header bg-danger">
                    <h4 class="modal-title" style="color: white">Cancel Reservation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                  </div>

                  <div class="modal-body">
                    <p>Are you sure you want to cancel this reservation?</p>
                    <blockquote id="code"></blockquote>
                    <input class="form-control" type="hidden" name="cancel-code" id="cancel-code" value="0">
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="background: transparent;border-color: #343B41;color: #343B41;text-transform: uppercase;">Cancel</button>
                    <button type="button" class="btn btn-success cancel-accomodation" style="background: #40b6f9;border: #40b6f9;text-transform: uppercase;">Confirm</button>
                  </div>
              </div>
            <!-- </form> -->
          </div>
      </div>
      <div class="modal fade" id="edit-btn">
          <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h4 class="modal-title" style="color: white">Edit Reservation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                  </div>

                  <div class="modal-body">
                    <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">
                       <form id="edit-accomodation" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <h4 style="border-bottom: 1px solid #dee2e8;padding-bottom:10px ">Accomodation Details</h4>
                          </div>
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <blockquote id="rsCode"></blockquote>
                          </div>
                          <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                            <div class="form-group">
                              <label>Check In:</label>
                              <div class="input-group" >
                                <input type="date" class="form-control" name="accom_in" value="" required>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                            <div class="form-group">
                              <label>Check Out:</label>
                              <div class="input-group">
                                <input type="date" class="form-control" name="accom_out" value="" required>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                            <div class="form-group">
                              <label>No. of Days:</label>
                              <div class="input-group">
                                <input type="text" placeholder="Number of days" class="form-control" name="accom_days" value="" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                            <div class="form-group">
                              <label>No. of Person:</label>
                              <div class="input-group">
                                <input type="text" placeholder="Number of person" class="form-control" name="accom_person" value="" required>
                              </div>
                            </div>
                          </div>

                        </div>
                       </form>
                      </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="background: transparent;border-color: #343B41;color: #343B41;text-transform: uppercase;">Cancel</button>
                    <button type="button" class="btn btn-success" id="delete-btn" style="background: #40b6f9;border: #40b6f9;text-transform: uppercase;">Submit</button>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="new-btn">
          <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h4 class="modal-title" style="color: white">New Reservation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                  </div>

                  <div class="modal-body">
                    <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">
                       <form id="new-accomodation" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                        <div class="row" style="padding-bottom: 20px;">
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <h4 style="border-bottom: 1px solid #dee2e8;padding-bottom:10px ">Personal Information</h4>
                          </div>
                          <div class="col-lg-4 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="cs_name">Customer Name:</label>
                              <div class="input-group" >
                                <input type="text" class="form-control" name="cs_name" placeholder="Enter Customer Name" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="cs_email">Email Address:</label>
                              <div class="input-group">
                                <input type="text" class="form-control" name="cs_email" placeholder="Enter Email Address" required>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-lg-4 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="cs_no">Contact No:</label>
                              <div class="input-group">
                                <input type="text" placeholder="Enter Contact no." class="form-control" name="cs_no" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="cs_company">Company Name:</label>
                              <div class="input-group">
                                <input type="text" placeholder="Enter Company Name" class="form-control" name="cs_company" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label>Company Address:</label>
                              <div class="input-group">
                                <input type="text" placeholder="Enter Company Address" class="form-control" name="cs_address" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <h4 style="border-bottom: 1px solid #dee2e8;padding-bottom:10px ">Accomodation Details</h4>
                          </div>
                          <div class="col-lg-4 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="accom_in">Check-In Date:</label>
                              <div class="input-group" >
                                <input type="date" class="form-control" name="accom_in" value="" required>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="accom_out">Check-Out Date:</label>
                              <div class="input-group">
                                <input type="date" class="form-control" name="accom_out" value="" required>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-lg-4 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="accom_timeArr">Time of Arrival:</label>
                              <div class="input-group">
                                <input type="time" class="form-control" name="accom_timeArr"required>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="accom_guests">No. of Guests:</label>
                              <div class="input-group">
                                <input type="text" placeholder="Number of guests" class="form-control" name="accom_guests" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="accom_type">Occation Type:</label>
                              <div class="input-group">
                                <select type="text" class="form-control" name="accom_type" required>
                                  <option>Baptism</option>
                                  <option>Birthday</option>
                                  <option>Wedding</option>
                                  <option>Team Building</option>
                                  <option>Anniversary</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                       </form>
                      </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="background: transparent;border-color: #343B41;color: #343B41;text-transform: uppercase;">Cancel</button>
                    <button type="submit" class="btn btn-success" style="background: #40b6f9;border: #40b6f9;text-transform: uppercase;">Submit</button>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

