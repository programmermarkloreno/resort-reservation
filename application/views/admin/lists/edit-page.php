 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fas fa-pencil-alt""></i>&nbsp <?php echo $mode; ?></h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Lists</li>
               <li class="breadcrumb-item active"><?php echo $mode; ?></li>
               <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
        
      </div> 
      <div class='alert alert-danger alert-dismissible' style="display: none;">
      </div>     
    </section>

    <!-- Main content -->
  <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">
                <form id="edit-accomodation" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
                <div class="row">
                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <h4 style="border-bottom: 1px solid #dee2e8;padding-bottom:10px ">Accomodation Details</h4>
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
                <div class="row" style="padding-top: 50px;">
                  <div class="col-lg-2 col-md-2 "> </div>
                  <div class="col-lg-2 col-md-1 "> </div>
                  <div class="col-lg-2 col-md-1 "> </div>
                  <div class="col-lg-1 col-md-2 "> </div>

                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 "> 
                    <button type="submit" class="btn btn-block btn-primary bg-primary"style="border-color: #40b6f9;color: #ffffff;text-transform: uppercase;">SAVE</button>
                  </div>
                  <div class="col-lg-1 col-md-2" style="padding-top: 6px;"> </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 "> 
                    <button type="button" class="btn btn-block btn-primary btn-cancel" style="background-color: transparent;border-color: #343b41;color: #343b41;text-transform: uppercase;">CANCEL</button>
                  </div>

                </div>
               </form>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->