
<section class="invoice" style="padding-top: 190px;">
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
            <?php foreach ($sectionD as $secD): ?>
                <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  <?php echo $secD->invoice_note; ?>
                </div>
             <?php endforeach; ?>
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                      <!-- title row -->
                    <?php foreach ($sectionD as $secD): ?>
                      <div class="row">
                        <div class="col-12">
                          <h4>
                            <i class="fas fa-money-check"></i><?php echo $secD->company_name; ?>
                            <small class="float-right">Date Gererated:&nbsp;<?php echo $res_details[0]->datetime; ?></small>
                          </h4><br/><br/>
                        </div>
                        <!-- /.col -->
                      </div>
                   <?php endforeach; ?>
                      <!-- info row -->
                      <div class="row">
                        <div class="col-sm-4 invoice-col">
                            From:
                        <?php foreach ($sectionD as $secD): ?>
                          <address>
                            <strong><?php echo $secD->company_name; ?></strong><br>
                            <?php echo $secD->company_address; ?><br>
                            Phone: <?php echo $secD->company_no; ?><br>
                            Tel: <?php echo $secD->company_tel; ?><br>
                            Email: <?php echo $secD->company_email; ?>
                          </address>
                        <?php endforeach; ?>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            To:
                          <address>
                            <strong><?php echo $clientDetails[0]->Lastname.', '.$clientDetails[0]->Firstname.' '.$clientDetails[0]->Middlename; ?></strong><br>
                            Address: <?php if($clientDetails[0]->Address!=''){echo $clientDetails[0]->Address;}else{echo 'N/A';} ?><br>
                            Phone: <?php if($clientDetails[0]->Mobile!=''){echo $clientDetails[0]->Mobile;}else{echo 'N/A';} ?><br>
                            Tel: <?php if($clientDetails[0]->TelNo!=''){ echo $clientDetails[0]->TelNo; }else{ echo 'N/A';} ?><br>
                            Email: <?php echo $clientDetails[0]->Email; ?>
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Invoice:
                          <address>
                          <b>Invoice #<?php echo $invoice[0]->invoice; ?></b><br>
                          <b>Payment Due:</b> <?php echo $invoice[0]->dueDate; ?><br>
                          <?php if(isset($_SESSION["isAdmin"])){ echo '<b>Process by: </b> '.$_SESSION["user_fname"].' '.$_SESSION["user_lname"]; } ?><br>
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
                              <th>Type</th>
                              <th style="width: auto;">Description</th>
                              <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php foreach ($packagesDetails as $key => $value): ?>
                            <tr>
                              <td><?php echo $value->RCode; ?></td>
                              <td><?php echo $value->rs_package; ?></td>
                              <td class="d-inline-block text-truncate" style="max-width: 600px;"><?php echo $value->rs_description; ?></td>
                              <td><?php echo 'PHP '.number_format($value->rs_price, 2); ?></td>
                            </tr>
                          <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                          <p class="lead">Payment Methods:</p>
                          <img src="<?php echo base_url();?>assets/template/dist/img/credit/visa.png" alt="Visa">
                          <img src="<?php echo base_url();?>assets/template/dist/img/credit/mastercard.png" alt="Mastercard">
                          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                          </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                          <p class="lead">Amount Due of 50% Downpayment: <?php echo $invoice[0]->dueDate;?></p>

                          <div class="table-responsive">
                            <table class="table">
                              <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><?php echo 'PHP '.number_format($invoice[0]->Totalbill, 2);?></td>
                              </tr>
                              <tr>
                                <th>Downpayment (50%)</th>
                                <td><?php $amount = $invoice[0]->Totalbill; $down = $amount * .50; echo 'PHP '.number_format($down, 2); ?></td>
                              </tr>
                              <tr>
                                <th>Total:</th>
                                <td><?php echo 'PHP '.number_format($invoice[0]->Totalbill, 2);?></td>
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
                          <a href="<?php echo base_url(); ?>Client/generatepdf" class="btn btn-success float-right"><i class="fas fa-download"></i> Download
                          </a>
                          <button id="generate" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
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
