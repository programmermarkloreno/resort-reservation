<section class="contact-section spad wow fadeInUp" style="padding-bottom: 50px;">
    <div class="container intro-text">
<!-- SUCCESSFULL PAGE  -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- <div class="info-box"> -->
                        <div class="card card-default">
                          <div class="card-header">
                            <h3 class="card-title">
                              <i class="fas fa-bullhorn"></i>
                              Today's Event
                            </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <?php echo $event_today; ?>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    <!-- </div> -->
                </div>
                <div class="col-lg-6">
                    <!-- <div class="info-box"> -->
                       <div class="card card-default">
                          <div class="card-header">
                            <h3 class="card-title">
                              <i class="fas fa-bullhorn"></i>
                              Upcoming Event's
                            </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <?php echo $upcoming_events; ?>
                          </div>
                          <!-- /.card-body -->
                        </div> 
                    <!-- </div> -->
                </div>
            </div>
        <!-- END SUCCESSFULL PAGE  -->
    </div>
</section>