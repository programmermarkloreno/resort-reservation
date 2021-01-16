
  <div class="content-wrapper">
    
    <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-calendar-alt"></i>&nbsp; View Reservation</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Reservation</li>
               <li class="breadcrumb-item active">View</li>
            </ol>
          </div>
        </div>
        
      </div>  
    </section>

    <section class="content">
      
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

          <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">

              <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <!-- <div class="alert" style="background-color: #40b6f9;color: white">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>&nbsp;&nbsp;Reservation Code: </p> 
                  </div> -->
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <h4 style="border-bottom: 1px solid #dee2e8;padding-bottom:10px ">Customer Details</h4>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Customer Id:</label>
                    <input type="text" class="form-control" value="<?php echo $csinfo[0]->CustomerId; ?>" disabled="">
                  </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Lastname:</label>
                    <input type="text" class="form-control" value="<?php echo $csinfo[0]->Lastname; ?>" disabled="">
                  </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Firstname:</label>
                    <input type="text" class="form-control" value="<?php echo $csinfo[0]->Firstname; ?>" disabled="">
                  </div>
                </div>
                
                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">MI:</label>
                    <input type="text" class="form-control" value="<?php if($csinfo[0]->Middlename != NULL){ echo $csinfo[0]->Middlename; }else{ echo "N/A"; } ?>" disabled="">
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Company:</label>
                    <input type="text" class="form-control" value="<?php echo $csinfo[0]->Company; ?>" disabled="">
                  </div>
                </div>

                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Company Address:</label>
                    <input type="text" class="form-control" value="<?php echo $csinfo[0]->Address; ?>" disabled="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <h4 style="border-bottom: 1px solid #dee2e8;padding-bottom:10px ">Contact Information</h4>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Mobile Number:</label>
                    <input type="text" class="form-control" value="<?php echo $csinfo[0]->Mobile; ?>" disabled="">
                  </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Telephone Number:</label>
                    <input type="text" class="form-control" value="<?php if($csinfo[0]->TelNo != NULL){ echo $csinfo[0]->TelNo; }else{ echo "N/A"; } ?>" disabled="">
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Email Address:</label>
                    <input type="text" class="form-control" value="<?php echo $csinfo[0]->Email; ?>" disabled="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <h4 style="border-bottom: 1px solid #dee2e8;padding-bottom:10px ">Reservation Details</h4>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Reservation Code:</label>
                    <input type="text" class="form-control" value="<?php echo $resInfo[0]->RCode; ?>" disabled="">
                  </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Check-In Date time:</label>
                    <input type="text" class="form-control" value="<?php echo $formatCheckin; ?>" disabled="">
                  </div>
                </div>
                
                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Check-Out Date time:</label>
                    <input type="text" class="form-control" value="<?php if(isset($formatCheckOut)){ echo $formatCheckOut; } ?>" placeholder="No checkout" disabled="">
                  </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Days:</label>
                    <input type="text" class="form-control" value="<?php echo $resInfo[0]->NDays; ?>" disabled="">
                  </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Occasion:</label>
                    <input type="text" class="form-control" value="<?php echo $resInfo[0]->RType; ?>" disabled="">
                  </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Total of Guest(s):</label>
                    <input type="text" class="form-control" value="<?php echo $resInfo[0]->NPerson; ?>" disabled="">
                  </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Excess Guest(s):</label>
                    <input type="text" class="form-control" value="<?php echo $resInfo[0]->excess; ?>" disabled="">
                  </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label>Special Instructions</label>
                    <textarea class="form-control" rows="2" placeholder="N/A" disabled=""><?php echo $resInfo[0]->Note; ?></textarea>
                  </div>
                </div>
              
            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Date Created:</label>
                    <input type="text" class="form-control" placeholder="N/A" value="<?php echo $resInfo[0]->datetime; ?>" disabled>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="pay_TotalBill_chkout">Date Updated:</label>
                    <input type="text" class="form-control" placeholder="N/A" value="<?php echo $resInfo[0]->updated_at; ?>" disabled>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <h4 style="border-bottom: 1px solid #dee2e8;padding-bottom:10px ">Reservation / Payment Information</h4>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <?php echo $invoiceDetails; ?>
                </div>
              </div>
          </div>
        </div>
      </div>

    </section>

  </div>

