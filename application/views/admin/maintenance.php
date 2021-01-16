
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-screwdriver"></i>&nbsp; Maintenance</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Maintenance</li>
            </ol>
          </div>
        </div>
        
      </div>      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                <!-- /.card -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-screwdriver"></i>
                   Customer Page Maintenance
                </h3>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                  <!-- <li class="nav-item">
                    <a class="nav-link <?php //if($dataArr["navTab"] == 1){ echo 'active'; }else{ echo ''; } ?>" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="<?php //if($dataArr["navTab"] == 1){ echo 'true'; }else{ echo 'false'; } ?>">Home Page</a>
                  </li> -->
                  <li class="nav-item">
                    <a class="nav-link <?php if($dataArr["navTab"] == 2){ echo 'active'; }else{ echo ''; } ?>" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="<?php if($dataArr["navTab"] == 2){ echo 'true'; }else{ echo 'false'; } ?>">Company Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php if($dataArr["navTab"] == 3){ echo 'active'; }else{ echo ''; } ?>" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="<?php if($dataArr["navTab"] == 3){ echo 'active'; }else{ echo ''; } ?>">Contact Information's</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php if($dataArr["navTab"] == 4){ echo 'active'; }else{ echo ''; } ?>" id="custom-content-below-accommodation-tab" data-toggle="pill" href="#custom-content-below-accommodation" role="tab" aria-controls="custom-content-below-accommodation" aria-selected="<?php if($dataArr["navTab"] == 4){ echo 'active'; }else{ echo ''; } ?>">Accomodations</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php if($dataArr["navTab"] == 5){ echo 'active'; }else{ echo ''; } ?>" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="<?php if($dataArr["navTab"] == 5){ echo 'active'; }else{ echo ''; } ?>">Settings</a>
                  </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">

                  <div class="tab-pane fade <?php if($dataArr["navTab"] == 1){ echo 'show active'; }else{ echo ''; } ?>" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
      
                    <!--  -->

                  </div>
               <div class="tab-pane fade <?php if($dataArr["navTab"] == 2){ echo 'show active'; }else{ echo ''; } ?>" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                                      <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title">Company Profile</h3>

                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                  </button>
                                </div>
                              </div>
                              <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-logo" class="nav-link <?php if($dataArr["mode"] == '2A'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-paint-brush"></i> Company Logo
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-icon" class="nav-link <?php if($dataArr["mode"] == '2B'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-icons"></i> Company Icon
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-name" class="nav-link <?php if($dataArr["mode"] == '2C'){echo 'active';}else{echo '';}?>">
                                      <i class="far fa-file-alt"></i> Company Name
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-mission" class="nav-link <?php if($dataArr["mode"] == '2D'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-bullseye"></i> Company Mission
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-vision" class="nav-link <?php if($dataArr["mode"] == '2E'){echo 'active';}else{echo '';}?>">
                                      <i class="far fa-eye"></i> Company Vision
                                    </a>
                                  </li>
                                   <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-about" class="nav-link <?php if($dataArr["mode"] == '2F'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-info-circle"></i> About Company
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-history" class="nav-link <?php if($dataArr["mode"] == '2G'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-history"></i> Company History
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-footertext" class="nav-link <?php if($dataArr["mode"] == '2H'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-envelope-open-text"></i> Company Footer Text
                                    </a>
                                  </li>
                                   <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-address" class="nav-link <?php if($dataArr["mode"] == '2I'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-address-card"></i> Company Address
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-terms-and-conditions" class="nav-link <?php if($dataArr["mode"] == '2J'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-lock"></i> Payment Terms and Conditions
                                    </a>
                                  </li>
                                </ul>
                              </div>
                              <!-- /.card-body -->
                            </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-md-9">
              <?php if($dataArr["mode"] == ''): echo '';?>

              <?php elseif($dataArr["mode"] == '2A' && $dataArr["navTab"] == 2): ?>
                      <form id="company-logo-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-logo" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-paint-brush"></i> Company Logo</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update company logo.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                <div class="row">
                                   <div class="col-lg-12 table-responsive form-group">
                                     <center><img class="bg-dark" id="imagepreview1" src="<?php echo base_url() ?>assets/img/logo/<?php echo $profile[0]->company_logo; ?>" width="300" height="300"/></center>
                                   </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12 form-group">
                                      <center>
                                        <div class="btn btn-default btn-file">
                                        <i class="fas fa-cloud-upload-alt"></i> Upload Logo
                                        <input class="form-control" type="file" name="attachment1" id="attachment1" required>
                                      </div>
                                      <p class="help-block">Max. 1MB</p>
                                    </center>
                                    </div>
                                  </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                <div class="float-right">
                                  <!-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> -->
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                              <!-- /.card-footer -->
                            </div>
                          </form>
              <?php elseif($dataArr["mode"] == '2B' && $dataArr["navTab"] == 2): ?>
                          <!-- /.card -->
                       <form id="company-icon-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-icon" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-icons"></i> Company Icon</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update company icon.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="row">
                                   <div class="col-lg-12 table-responsive form-group">
                                     <center><img id="imagepreview" src="<?php echo base_url() ?>assets/img/icon/<?php echo $profile[0]->company_icon; ?>" width="300" height="300"/></center>
                                   </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12 form-group">
                                      <center>
                                        <div class="btn btn-default btn-file">
                                        <i class="fas fa-cloud-upload-alt"></i> Upload Icon
                                        <input class="form-control" type="file" name="attachment" id="attachment" required>
                                      </div>
                                      <p class="help-block">Max. 1MB</p>
                                    </center>
                                    </div>
                                  </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                          </form>
                            <!-- /. endcard -->
              <?php elseif($dataArr["mode"] == '2C' && $dataArr["navTab"] == 2): ?>
                            <!-- /.card -->
                   <form id="company-name-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-name" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="far fa-file-alt"></i> Company Name</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update company name.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                  <input class="form-control" name="company_name" placeholder="Company Name" value="<?php echo $profile[0]->company_name; ?>" required>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>
                            <!-- /. endcard -->
              <?php elseif($dataArr["mode"] == '2D' && $dataArr["navTab"] == 2): ?>
                            <!-- /.card -->
                      <form id="company-mission-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-mission" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-bullseye"></i> Company Mission</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update company mission.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                <div class="form-group">
                                    <textarea id="compose" class="form-control" name="company_mission" style="height: 300px" required>
                                      <?php echo $profile[0]->company_mission; ?>
                                    </textarea>
                                 </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>
                            <!-- /. endcard -->
              <?php elseif($dataArr["mode"] == '2E' && $dataArr["navTab"] == 2): ?>
                            <!-- /.card -->
                       <form id="company-vision-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-vision" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="far fa-eye"></i> Company Vision</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update company vision.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                <div class="form-group">
                                    <textarea id="compose" name="compose_vision" class="form-control" style="height: 300px" required>
                                      <?php echo $profile[0]->company_vision; ?>
                                    </textarea>
                                 </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                          </form>
                            <!-- /. endcard -->
              <?php elseif($dataArr["mode"] == '2F' && $dataArr["navTab"] == 2): ?>
                            <!-- /.card -->
                        <form id="company-about-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-about" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-info-circle"></i> About Company</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update about company.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                    <textarea id="compose" name="company_about" class="form-control" style="height: 300px" required>
                                      <?php echo $profile[0]->company_about; ?>
                                    </textarea>
                                 </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                          </form>
                            <!-- /. endcard -->
              <?php elseif($dataArr["mode"] == '2G' && $dataArr["navTab"] == 2): ?>
                            <!-- /.card -->
                        <form id="company-history-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-history" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-history"></i> Company History</h3>
                              </div>
                              <div class="card-body">
                                 <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update company history.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                <div class="form-group">
                                    <textarea id="compose" name="company_history" class="form-control" style="height: 300px" required>
                                      <?php echo $profile[0]->company_history; ?>
                                    </textarea>
                                 </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                          </form>
                            <!-- /. endcard -->
              <?php elseif($dataArr["mode"] == '2H' && $dataArr["navTab"] == 2): ?>
                              <!-- /.card -->
                      <form id="company-footertext-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-footertext" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-envelope-open-text"></i> Company Footer Text</h3>
                              </div>
                              <div class="card-body">
                                 <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update company footer text.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                <div class="form-group">
                                    <textarea id="compose" name="company_footertxt" class="form-control" style="height: 300px" required="">
                                      <?php echo $profile[0]->company_footertxt; ?>
                                    </textarea>
                                 </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                          </form>
                            <!-- /. endcard -->
            <?php elseif($dataArr["mode"] == '2I' && $dataArr["navTab"] == 2): ?>
                            <!-- /.card -->
                   <form id="company-address-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-address" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-address-card"></i> Company Address</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update company address.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                  <input class="form-control" name="company_address" placeholder="Company Address" value="<?php echo $profile[0]->company_address; ?>" required>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>
                            <!-- /. endcard -->
           <?php elseif($dataArr["mode"] == '2J' && $dataArr["navTab"] == 2): ?>
                            <!-- /.card -->
                   <form id="company-terms-and-conditions-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-terms-and-conditions" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"> <i class="fas fa-lock"></i> Payment Terms and Conditions</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update payment terms and conditions.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                  <textarea id="compose" class="form-control" name="company_terms_conditions" style="height: 300px" required>
                                      <?php echo $profile[0]->company_termsAndconditions; ?>
                                    </textarea>
                                 </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>
                            <!-- /. endcard -->
                  <?php endif; ?>

                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->

             </div>

              <div class="tab-pane fade <?php if($dataArr["navTab"] == 3){ echo 'show active'; }else{ echo ''; } ?>" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">

                   <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title">Contact Information's</h3>

                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                  </button>
                                </div>
                              </div>
                              <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                  
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-mobile" class="nav-link <?php if($dataArr["mode"] == '3A'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-mobile-alt"></i> Company Mobile No.
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-telephone" class="nav-link <?php if($dataArr["mode"] == '3B'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-phone-alt"></i> Company Telephone No.
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-email" class="nav-link <?php if($dataArr["mode"] == '3C'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-mail-bulk"></i> Company Email Address
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-fbpage" class="nav-link <?php if($dataArr["mode"] == '3D'){echo 'active';}else{echo '';}?>">
                                      <i class="ion-social-facebook fa-lg"></i>&nbsp; Company Facebook Page
                                    </a>
                                  </li>
                                   <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-fbaccount" class="nav-link <?php if($dataArr["mode"] == '3E'){echo 'active';}else{echo '';}?>">
                                      <i class="ion-social-facebook fa-lg"></i> Company Facebook Account
                                    </a>
                                  </li>
                                </ul>
                              </div>
                              <!-- /.card-body -->
                            </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-md-9">

        <?php if($dataArr["mode"] == ''): echo '';?>

        <?php elseif($dataArr["mode"] == '3A' && $dataArr["navTab"] == 3): ?>

                 <form id="company-mobile-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-mobile" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-mobile-alt"></i> Companies Mobile Number</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update companies mobile number.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                   <label for="company_tel">Mobile Number:</label>
                                  <input type="text" class="form-control" name="company_no" placeholder="Company Mobile Number" data-mask="(+63)00-0000-0000" value="<?php echo $profile[0]->company_no; ?>" required>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>
          <?php elseif($dataArr["mode"] == '3B' && $dataArr["navTab"] == 3): ?>
                      <form id="company-telephone-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-telephone" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-phone-alt"></i> Companies Telephone Number</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update companies telephone number.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                  <label for="company_tel">Telephone Number:</label>
                                  <input type="text" class="form-control" name="company_tel" data-mask="(00)0000-0000" placeholder="Company Telephone Number" value="<?php echo $profile[0]->company_tel; ?>" required>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>
          <?php elseif($dataArr["mode"] == '3C' && $dataArr["navTab"] == 3): ?>
                        <form id="company-email-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-email" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-mail-bulk"></i> Companies Email Address</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update companies email address.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                   <label for="company_email">Email Address:</label>
                                  <input type="email" class="form-control" name="company_email" placeholder="sample@gmail.com" value="<?php echo $profile[0]->company_email; ?>" required>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>
          <?php elseif($dataArr["mode"] == '3D' && $dataArr["navTab"] == 3): ?>
                        <form id="company-fbpage-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-fbpage" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="ion-social-facebook fa-lg"></i> Company Facebook Page</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update your Facebook page.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                  <label for="company_fbpage">Paste your Facebook page link here:</label>
                                  <input type="url" class="form-control" name="company_fbpage" placeholder="https://www.sample.com" value="<?php echo $profile[0]->company_fbpage; ?>" required>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>
          <?php elseif($dataArr["mode"] == '3E' && $dataArr["navTab"] == 3): ?>
                        <form id="company-fbaccount-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-fbaccount" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="ion-social-facebook fa-lg"></i> Company Facebook Account</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Successfully update your Facebook Account.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                   <label for="company_fbpage">Paste your Facebook Account link here:</label>
                                  <input type="url" class="form-control" name="company_fb" placeholder="https://www.sample.com" value="<?php echo $profile[0]->company_fb; ?>" required>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>
           <?php endif; ?>

                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

            </div>
              <div class="tab-pane fade <?php if($dataArr["navTab"] == 4){ echo 'show active'; }else{ echo ''; } ?>" id="custom-content-below-accommodation" role="tabpanel" aria-labelledby="custom-content-below-accommodation-tab">
                     <!-- Accomodations -->
                   <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title">Accomodations</h3>

                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                  </button>
                                </div>
                              </div>
                              <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                  
                                  <li class="nav-item has-treeview">
                                    <a href="<?php echo base_url();?>home/maintenance/company-create-category" class="nav-link <?php if($dataArr["mode"] == '4A'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-clipboard-list fa-lg"></i> Category
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url();?>home/maintenance/company-create-sub-category" class="nav-link <?php if($dataArr["mode"] == '4B'){echo 'active';}else{echo '';}?>">
                                      <i class="fas fa-clipboard-list fa-lg"></i> Create Sub-category
                                    </a>
                                  </li>
                                </ul>
                              </div>
                              <!-- /.card-body -->
                            </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-md-9">

         <?php if($dataArr["mode"] == ''): echo '';?>

        <?php elseif($dataArr["mode"] == '4A' && $dataArr["navTab"] == 4): ?>
                        <input type="hidden" name="categ_actions" id="categ_actions" value="<?php echo $categ_actions; ?>">
                        <form id="company-create-category-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-create-category" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-clipboard-list fa-lg"></i> <?php echo $categ_mode; ?></h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(5) == 'true'){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp; Category successfully <?php if($categ_actions == 'edit'){ echo "edited."; }elseif ($categ_actions == 'create') {
                                   echo "created."; } ?>.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <?php echo $statement; ?>
                              </div>
                              <div class="card-footer <?php echo $footershow; ?>">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default category-discard"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>

        <?php elseif($dataArr["mode"] == '4B' && $dataArr["navTab"] == 4): ?>

                <form id="company-create-sub-category-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-create-sub-category" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-clipboard-list fa-lg"></i> Create Sub-Category</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp Sub-category successfully created.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                  <label for="category_id">Category:</label>
                                   <select id="category_id" class="form-control" name="category_id" required>
                                     <option selected disabled>Select Category..</option>
                                     <?php foreach ($categories as $category) {
                                        echo '<option value="'.$category->id.'">'.$category->Category_title.'</option>';
                                     } ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <input type="hidden" name="sub_cat_id" value="<?php echo $subcategories; ?>"/>
                                 <label for="company_sub_cat_title">Sub-category title:</label>
                                  <input type="text" class="form-control" name="company_sub_cat_title" placeholder="Sub-category title" required>
                                </div>
                                <div class="form-group row">
                                  <div class="col-sm-6">
                                     <label for="company_sub_cat_price">Price:</label>
                                     <input type="number" min="1" class="form-control" name="company_sub_cat_price" placeholder="Price" required>
                                  </div>
                                  <div class="col-sm-6">
                                      <label for="company_sub_cat_cap">Capacity:</label>
                                     <input type="number" min="1" class="form-control" name="company_sub_cat_cap" placeholder="Capacity" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="company_sub_cat_desc">Description / Includes:</label>
                                  <textarea id="compose" class="form-control" name="company_sub_cat_desc" style="height: 300px" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                      <i class="fas fa-cloud-upload-alt"></i> Upload Photo
                                      <input class="form-control" type="file" name="file_upload[]" id="file_upload" multiple required>
                                    </div>
                                     <!--  <p class="help-block">Max. </p> -->
                                </div>
                                <div class="form-group">
                                  <center><div id="file_preview" class="col-md-12 row">
                                  </div></center>
                                </div>
                              </div> 
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>
            <?php endif; ?> 

                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
              
               </div>

               <div class="tab-pane fade <?php if($dataArr["navTab"] == 5){ echo 'show active'; }else{ echo ''; } ?>" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                     <!--Settings-->
                       <section class="content">
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-3">
                                <div class="card card-primary card-outline">
                                  <div class="card-header">
                                    <h3 class="card-title">Settings</h3>

                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                    </div>
                                  </div>
                                  <div class="card-body p-0">
                                    <ul class="nav nav-pills flex-column">
                                      
                                      <li class="nav-item has-treeview">
                                        <a href="<?php echo base_url();?>home/maintenance/company-reservation-days" class="nav-link <?php if($dataArr["mode"] == '5A'){echo 'active';}else{echo '';}?>">
                                          <i class="fas fa-clipboard-list fa-lg"></i> Reservation Days
                                        </a>
                                      </li>
                                     <li class="nav-item">
                                        <a href="<?php echo base_url();?>home/maintenance/company-event-types" class="nav-link <?php if($dataArr["mode"] == '5B'){echo 'active';}else{echo '';}?>">
                                          <i class="fas fa-clipboard-list fa-lg"></i> Events
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <!-- /.card-body -->
                                </div>
                              </div>
                              <!-- /.col -->
                              <div class="col-md-9">

            <?php if($dataArr["mode"] == ''): echo '';?>

            <?php elseif($dataArr["mode"] == '5A' && $dataArr["navTab"] == 5): ?>
                    
                    <form id="company-reservation-days-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                            <div id="company-reservation-days" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-clipboard-list fa-lg"></i> Reservation Days</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp; Successfully update your reservation days.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group">
                                    <div class="row">
                                      <div class="d-flex justify-content-center my-4 col-lg-12">
                                        <div class="w-100">
                                          <input type="range" class="custom-range" id="reservationDaysRange" name="reservationDaysRange" min="8" max="15" value="<?php echo $days_reservation; ?>">
                                        </div>
                                        <span class="font-weight-bold text-primary ml-2 valueSpan"><?php echo $days_reservation."days"; ?></span>
                                      </div>
                                    </div>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                              </div>
                            </div>
                        </form>    

            <?php elseif($dataArr["mode"] == '5B' && $dataArr["navTab"] == 5): ?>
                          <div id="company-reservation-days" class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-clipboard-list fa-lg"></i> Event types</h3>
                              </div>
                              <div class="card-body">
                                <?php if($this->uri->segment(4)){ ?>
                                 <div class="alert alert-success alert-dismissible"><h6><i class='fas fa-check-circle'></i>&nbsp; Successfully update your reservation days.</h6><button type='button' class='close text-danger' data-dismiss='alert' aria-hidden='true'><h6><i class='fas fa-window-close'></i></h6></button></div>
                                 <?php } ?>
                                 <div class="alert alert-danger alert-dismissible" style="display: none;"></div>
                                 <div class="form-group col-lg-12 col-sm-12">
                                    
                                <?php foreach ($events as $key => $value) {
                                         $isActive = '';
                                         if($value->occasion_status == 'Active'){
                                             $isActive = 'checked';
                                         }
                               echo '<div class="custom-control custom-switch">
                                        <input type="checkbox" name="status" class="custom-control-input" id="'.$value->occasion_id.'" '.$isActive.'>
                                        <label class="custom-control-label ml-5" for="'.$value->occasion_id.'">'.$value->type.'</label>
                                      </div>';
                                } ?>
                                  <!-- <input type="checkbox" data-toggle="switchbutton" checked data-onlabel="Active" data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger" name=""> -->
                                </div>
                              </div>
                              <div class="card-footer">
                              </div>
                            </div>
            <?php endif; ?> 

                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
              
               </div>
            </div>
          </div>
              <!-- /.card -->
        </div>
            <!-- /.card -->
      </div>
    </div>
  </div>
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

