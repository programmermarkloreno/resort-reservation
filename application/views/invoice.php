<?php if(!isset($_SESSION["token"])){  redirect('Client/signout'); } ?>
<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
     <title><?php echo $title; ?></title>
     <link rel="shortcut icon" type='image/x-icon' href="<?php echo $_SERVER['DOCUMENT_ROOT']."/assets/img/icon/".$sectionD[0]->company_icon; ?>">

   <!--  <link href="<?php //echo base_url();?>assets/bootstrap-3.4.1/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" /> -->
    <link href="<?php echo $_SERVER['DOCUMENT_ROOT']."/assets/bootstrap-3.4.1/dist/css/bootstrap.min.css"; ?>" type="text/css" rel="stylesheet" />
    <!-- jQuery --> 
 <!--  <script src="<?php //echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
  <script src="<?php //echo base_url();?>assets/template/plugins/jquery-ui/jquery-ui.min.js"></script> -->
 <!--  <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/template/plugins/jquery-ui/jquery-ui.min.css"> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="<?php //echo $_SERVER['DOCUMENT_ROOT']."/assets/template/plugins/fontawesome-free/css/all.min.css"; ?>"> -->
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="<?php //echo $_SERVER['DOCUMENT_ROOT']."/assets/template/plugins/Ionicons/css/ionicons.min.css"; ?>"> -->
  <!-- DataTables -->
 <!--  <link rel="stylesheet" href="<?php //echo $_SERVER['DOCUMENT_ROOT']."/assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"; ?>">
  <link rel="stylesheet" href="<?php //echo $_SERVER['DOCUMENT_ROOT']."/assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"; ?>"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="<?php //echo base_url(); ?><?php //echo $_SERVER['DOCUMENT_ROOT']."/assets/template/dist/css/adminlte.min.css"; ?>" > -->
</head>
<body>

<section class="invoice">
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
                            <i class="fas fa-money-check"></i><?php echo $secD->company_name; ?><br><br>
                            <small>Datetime Process : <?php echo $res_details[0]->datetime; ?></small><br>
                            <small>Reserve Date : <?php echo $res_details[0]->CheckIn; ?></small><br>
                            <small>Occasion : <?php echo $res_details[0]->RType; ?></small><br>
                            <small>Arrival : <?php echo $res_details[0]->TimeIn; ?></small><br>
                            <small>Guests : <?php echo $res_details[0]->NPerson; ?></small><br>
                            <small>Status : <?php echo $res_details[0]->Status; ?></small><br>
                          </h4>
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
                        </div><br>
                        <div class="col-sm-4 invoice-col">
                            To:
                          <address>
                            <strong><?php echo $clientDetails[0]->Lastname.', '.$clientDetails[0]->Firstname.' '.$clientDetails[0]->Middlename; ?></strong><br>
                            Address: <?php if($clientDetails[0]->Address!=''){echo $clientDetails[0]->Address;}else{echo 'N/A';} ?><br>
                            Phone: <?php if($clientDetails[0]->Mobile!=''){echo $clientDetails[0]->Mobile;}else{echo 'N/A';} ?><br>
                            Tel: <?php if($clientDetails[0]->TelNo!=''){ echo $clientDetails[0]->TelNo; }else{ echo 'N/A';} ?><br>
                            Email: <?php echo $clientDetails[0]->Email; ?>
                          </address>
                        </div><br>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Invoice:
                          <address>
                          <b>Invoice #<?php echo $invoice[0]->invoice; ?></b><br>
                          <b>Payment Due:</b> <?php echo $invoice[0]->dueDate; ?><br>
                         </address>
                        </div>
                        <!-- /.col -->
                      </div><br><br>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-striped">
                            <thead>
                            <tr>
                              <th>Reservation Code</th>
                              <th>Days</th>
                              <th>Type</th>
                              <th style="width: auto;">Description</th>
                              <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php foreach ($packagesDetails as $key => $value): ?>
                            <tr>
                              <td><?php echo $value->RCode; ?></td>
                              <td><?php echo $value->rs_days; ?></td>
                              <td><?php echo $value->rs_package; ?></td>
                              <td class="d-inline-block text-truncate" style="max-width: 600px;"><?php echo $value->rs_description; ?></td>
                              <td><?php echo 'PHP '.number_format($value->rs_price, 2); ?></td>
                            </tr>
                          <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div><br><br>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <!-- <div class="col-6">
                          <p class="lead">Payment Methods:</p>
                          <img src="<?php echo base_url();?>assets/template/dist/img/credit/visa.png" alt="Visa">
                          <img src="<?php echo base_url();?>assets/template/dist/img/credit/mastercard.png" alt="Mastercard">
                          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                          </p>
                        </div> -->
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

                    </div>
                    <!-- /.invoice -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
           </div><!-- /.container-fluid -->
  </section>

</body>
</html>