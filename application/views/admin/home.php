
  <div class="content-wrapper">
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-home"></i>&nbsp; Home</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div>
        </div>
        
      </div> 
      <div class='alert alert-danger alert-dismissible' style="display: none;"></div>        
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
              <div class="row">
                  <div class="col-sm-12">
                    <div class="info-box bg-info">
                      <div class="inner">
                        <h3><?php echo $pending; ?></h3>
                        <p><h6>Pending Reservation</h6></p>
                      </div>
                      <div class="info-box-content"></div>
                      <a href="<?php echo base_url()?>home/reservation/pending">More info <i class="fas fa-arrow-circle-right ic"></i></a>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="info-box bg-lightblue">
                      <div class="inner">
                        <h3><?php echo $approved; ?></h3>
                        <p><h6>Confirmed Reservation</h6></p>
                      </div>
                      <div class="info-box-content"></div>
                      <a href="<?php echo base_url()?>home/reservation/confirmed">More info <i class="fas fa-arrow-circle-right ic"></i></a>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="info-box bg-warning">
                      <div class="inner">
                         <h3><?php echo $check_in; ?></h3>
                        <p><h6>Check-In</h6></p>
                      </div>
                      <div class="info-box-content"></div>
                      <a href="<?php echo base_url()?>home/reservation/check-in">More info <i class="fas fa-arrow-circle-right ic"></i></a>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="info-box bg-success">
                      <div class="inner">
                        <h3><?php echo $finished; ?></h3>
                        <p><h6>Finished Reservation</h6></p>
                      </div>
                      <div class="info-box-content"></div>
                      <a href="<?php echo base_url()?>home/reservation/finished">More info <i class="fas fa-arrow-circle-right ic"></i></a>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="info-box bg-danger">
                      <div class="inner">
                        <h3><?php echo $cancelled; ?></h3>
                        <p><h6>Cancelled Reservation</h6></p>
                      </div>
                      <div class="info-box-content"></div>
                      <a href="<?php echo base_url()?>home/reservation/cancelled">More info <i class="fas fa-arrow-circle-right ic"></i></a>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card card-primary">
              <div class="card-body p-0">
                <div id="calendar"></div>
              </div>
            </div>
          </div>
        </div>
      
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

