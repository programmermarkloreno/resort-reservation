 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fas fa-pencil-alt""></i>&nbsp; Invoice</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
        
      </div> 
      <div class='alert alert-danger alert-dismissible' style="display: none;">
      </div>     
    </section>

    <!-- Main content -->  
  <section class="invoice" style="padding-top: 50px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
               <div class="contact-title">
                  <div class="section-title">
                     <center><span><h4>Payment Details</h4></span></center>
                  </div>
                </div>
             </div>
         </div>
          <div class="row invoice-info">
              <div class="col-12">
                <!-- <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  <?php echo $secD->invoice_note; ?>
                </div> -->
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-12">
                          <h4>
                            <i class="fas fa-money-check"></i><?php echo $sectionD[0]->company_name; ?>
                            <small class="float-right">Generated Date:&nbsp;<?php echo $issue_invoice["date_created"]; ?></small>
                          </h4><br/><br/>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row">
                        <div class="col-sm-4 invoice-col">
                            From:
                          <address>
                          <strong><?php echo $sectionD[0]->company_name; ?></strong><br>
                            <?php echo $sectionD[0]->company_address; ?><br>
                            TIN #: 090-123-456-789<br>
                            Phone: <?php echo $sectionD[0]->company_no; ?><br>
                            Tel: <?php echo $sectionD[0]->company_tel; ?><br>
                            Email: <?php echo $sectionD[0]->company_email; ?>
                          </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            To:
                          <address>
                            <strong><?php echo $client_info["Lastname"].', '.$client_info["Firstname"].' '.$client_info["Middlename"]; ?></strong><br>
                            Address: <?php if($client_info["Address"]!=''){echo $client_info["Address"];}else{echo 'N/A';} ?><br>
                            Phone: <?php if($client_info["Mobile"]!=''){echo $client_info["Mobile"];}else{echo 'N/A';} ?><br>
                            Tel: <?php if($client_info["TelNo"]!=''){ echo $client_info["TelNo"]; }else{ echo 'N/A';} ?><br>
                            Email: <?php echo $client_info["Email"]; ?>
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Invoice:
                          <address>
                          <b>Invoice #<?php echo $issue_invoice["invoice"]; ?></b><br>
                         
                         </address>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-striped">
                            <thead>
                            <tr>
                              <th>Reservation Code</th>
                              <th>Day(s)</th>
                              <th>Package</th>
                              <th style="width: auto;">Description</th>
                              <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if($res_details){ foreach ($res_details as $key => $value){
                                   echo '<tr>
                                    <td>'.$value->RCode.'</td>
                                    <td>'.$value->rs_days.'</td>
                                    <td>'.$value->rs_package.'</td>
                                    <td class="d-inline-block text-truncate" style="max-width: 600px;">'.$value->rs_description.'</td>
                                    <td>PHP '.number_format($value->rs_price, 2).'</td>
                                  </tr>';
                                } 
                              }?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                       <div class="col-6">
                          <p class="lead">Mode Of Payment:</p>
                           <?php 
                              if($issue_invoice["mop"] == 1){
                                echo '<div class="table-responsive">
                                  <table class="table">
                                    <tr>
                                      <th style="width:50%">Bank Name:</th>
                                      <td>'.$issue_invoice["bank_name"].'</td>
                                    </tr>
                                    <tr>
                                      <th>Account Number</th>
                                      <td>'.$issue_invoice["acc_number"].'</td>
                                    </tr>
                                    <tr>
                                      <th>Account Name</th>
                                      <td>'.$issue_invoice["acc_name"].'</td>
                                    </tr>
                                  </table>
                                </div>';
                              }else{
                                echo '<p class="lead">Cash Payment</p>';
                              }
                           ?>
                          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                          </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                          <div class="table-responsive">
                            <table class="table">
                              <tr>
                                <th style="width:50%">Total due:</th>
                                <td><?php echo 'PHP '.number_format($issue_invoice["Totalbill"], 2);?></td>
                              </tr>
                              <tr>
                                <th>Amount Pay</th>
                                <td><?php echo 'PHP '.number_format($issue_invoice["Cash"], 2); ?></td>
                              </tr>
                              <tr>
                                <th>Change</th>
                                <td><?php echo 'PHP '.number_format($issue_invoice["_Change"], 2); ?></td>
                              </tr>
                              <tr>
                                <th>New Balance:</th>
                                <td><?php echo 'PHP '.number_format($issue_invoice["Balance"], 2);?></td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row no-print">
                        <div class="col-12">
                          <!-- <a href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                         <!--  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                            Payment
                          </button> -->
                          <!--  <a href="<?php echo base_url(); ?>Client/index" class="btn btn-success float-right" download> Go to Home
                          </a> -->
                          <a href="<?php echo base_url()."Admin/generatepdf/".$issue_invoice["invoice"]; ?>" class="btn btn-success float-right"><i class="fas fa-download"></i> Send via Email
                          </a>
                          <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" onclick="window.print();">
                            <i class="fas fa-print"></i> Generate PDF/ Print
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- /.invoice -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
           </div><!-- /.container-fluid -->
      </section>


  </div>
  <!-- /.content-wrapper -->