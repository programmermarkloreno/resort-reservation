
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-calendar-alt"></i>&nbsp; Finished</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Reservation</li>
               <li class="breadcrumb-item active">Finished</li>
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
                 <!--  <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-block btn-primary btn-new">New Reservation</button>
                  </div> -->
                  <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12"></div>
                  <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                   <!--  <div class="form-group">
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

