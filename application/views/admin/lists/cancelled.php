
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-calendar-times"></i>&nbsp; Cancelled</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Reservation</li>
               <li class="breadcrumb-item active">Cancelled</li>
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

      <div class="modal fade" id="resched-btn">
          <div class="modal-dialog modal-lg">
             <form id="resched-accomodation" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
               <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h4 class="modal-title" style="color: white">Re-Schedule Reservation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                  </div>

                  <div class="modal-body">
                    <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <h4 style="border-bottom: 1px solid #dee2e8;padding-bottom:10px ">Accomodation Details</h4>
                          </div>
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <blockquote id="rsCode"></blockquote>
                            <input type="hidden" name="resched-id" id="resched-id" value="">
                          </div>
                          <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                               <label for="rs_date">Re-Schedule Date:</label>
                               <input class="form-control" type="text" id="rs_date" name="rs_date" placeholder="mm-dd-yyyy" required readonly>
                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                            <div class="form-group">
                              <label for="rs_days">Number of Day/s:</label>
                              <input class="form-control" type="number" id="rs_days" name="rs_days" placeholder="No. of Day/s" min="1" max="15" required>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="background: transparent;border-color: #343B41;color: #343B41;text-transform: uppercase;"> Cancel </button>
                    <button type="submit" class="btn btn-success" style="background: #40b6f9;border: #40b6f9;text-transform: uppercase;"> Re-Sched </button>
                  </div>
              </div>
            </form>
          </div>
      </div>

      <div class="modal fade" id="refund-btn">
          <div class="modal-dialog">
            <form id="refund-accomodation" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
               <div class="modal-content">
                  <div class="modal-header bg-warning">
                    <h4 class="modal-title text-dark" style="color: white"> Refund </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                  </div>

                  <div class="modal-body">
                    <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">
                        <blockquote id="down-code"></blockquote>
                            <input class="form-control" type="hidden" name="rs-refund-id" id="rs-refund-id" value="">
                            <div class="row">
                              <div class="col-lg-12 form-group">
                                  <label for="pay_payment">Amount to be refund:</label>
                                  <input type="text" class="form-control" id="refund_amount" name="refund_amount" readonly>
                              </div>
                            </div>
                       </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background: transparent;border-color: #343B41;color: #343B41;text-transform: uppercase;"> Cancel </button>
                    <button type="submit" class="btn btn-warning btn-refund" style="border: #40b6f9;text-transform: uppercase;"> Refund </button>
                  </div>
              </div>
            </form>
          </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

