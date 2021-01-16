<!-- <?php //if(!isset($_SESSION["token"])){  redirect('Client/signout'); } ?> -->
<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
     <title><?php echo $title; ?></title>
     <link rel="shortcut icon" type='image/x-icon' href="<?php echo $_SERVER['DOCUMENT_ROOT']."/assets/img/icon/".$sectionD[0]->company_icon; ?>">

    <link href="<?php echo $_SERVER['DOCUMENT_ROOT']."/assets/bootstrap-3.4.1/dist/css/bootstrap.min.css"; ?>" type="text/css" rel="stylesheet" />
   
</head>
<body>

<section class="invoice" style="padding-top: 50px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
               <div class="contact-title">
                  <div class="section-title">
                     <center><span><h4><?php echo $sectionD[0]->company_name; ?></h4></span></center>
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
                            <i class="fas fa-money-check"></i>INVOICE SUMMARY
                          </h4><br/>
                          <small class="float-right">Date Process: <?php echo $issue_invoice["date_created"]; ?></small>
                        </div>
                        <!-- /.col -->
                      </div><br><br>
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
                        </div><br>
                        <div class="col-sm-4 invoice-col">
                            To:
                          <address>
                            <strong><?php echo $client_info["Lastname"].', '.$client_info["Firstname"].' '.$client_info["Middlename"]; ?></strong><br>
                            Address: <?php if($client_info["Address"]!=''){echo $client_info["Address"];}else{echo 'N/A';} ?><br>
                            Phone: <?php if($client_info["Mobile"]!=''){echo $client_info["Mobile"];}else{echo 'N/A';} ?><br>
                            Tel: <?php if($client_info["TelNo"]!=''){ echo $client_info["TelNo"]; }else{ echo 'N/A';} ?><br>
                            Email: <?php echo $client_info["Email"]; ?>
                          </address>
                        </div><br>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Invoice:
                          <address>
                          <b>Invoice #<?php echo $issue_invoice["invoice"]; ?></b><br>
                          <!-- <b>Payment Due:</b> <?php //echo $issue_invoice["dueDate"]; ?><br> -->
                          <?php if(isset($_SESSION["islogged"])){ echo '<b>Process by: </b> '.$_SESSION["user_fname"].' '.$_SESSION["user_lname"]; } ?><br>
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
                      </div><br><br>
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
                        </div><br><br>
                        <!-- /.col -->
                        <div class="col-6">
                         <!--  <p class="lead">As of: <?php //echo $issue_invoice["dueDate"];?></p> -->

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
                    </div>
                    <!-- /.invoice -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
           </div><!-- /.container-fluid -->
      </section>
  </body>
</html>