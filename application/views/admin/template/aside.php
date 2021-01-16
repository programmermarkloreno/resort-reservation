  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4" style="box-shadow: -8px -6px 19px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link pull-left">
      <img src="<?php echo base_url(); ?>assets/img/icon/<?php echo $profile[0]->company_icon; ?>"
           alt=""
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><small><?php echo $profile[0]->company_name; ?></small></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <!--  <div class="image">
          <img src="<?php echo base_url(); ?>assets/img/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="pull-left image">
         <?php 
              if($this->session->userdata('islogged')){
                echo '<img id="pic-A" src="'.base_url().'assets/img/'.$_SESSION["user_photo"].'" class="img-circle" alt="User Image">';
              }
          ?>
        </div>
        <div class="pull-left info">
          <h5 style="margin:0px;font-weight: bolder;font-size: 17px">
            <?php
              if($this->session->userdata('islogged')){
                echo '<a href="#" class="d-block" >'.$this->session->userdata('user_fname').' '.$this->session->userdata('user_lname').'</a>';
              }
            ?>
          </h5>
          <h6><a style="text-decoration:none;"><i class="fa fa-circle text-success"></i>&nbsp;<?php
            if($this->session->userdata('islogged')){
                if($this->session->userdata('user_type') == 1){
                  echo 'Administrator';
                }elseif($this->session->userdata('user_type') == 2){
                  echo 'User';
                }
              }
            ?></a></h6>
          <!-- <a href="#" class="d-block" >Raymark Loreno</a> -->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 d-flex" style="">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p class="sidebar-time"></p>
            </a>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- <li class="nav-item">
            <a href="<?php //echo base_url()?>Admin/test/HETR202012054TAEFA">
              <i class="nav-icon fas fa-home"></i>
              <p>test</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url()?>home/index" class="nav-link <?php if($dataArr['actv'] == 1){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview <?php if($dataArr['drpActv'] == 2.0){ echo 'menu-open';}else{ echo '';} ?>">
            <a class="nav-link <?php if($dataArr['drpActv'] == 2.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>Reservation<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/reservation/walk-in" class="nav-link <?php if($dataArr['actv'] == 2.1){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-walking nav-icon"></i>
                  <p>Walk-in</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/reservation/family" class="nav-link <?php if($dataArr['actv'] == 2.2){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Family</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/reservation/group" class="nav-link <?php if($dataArr['actv'] == 2.3){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Group</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview <?php if($dataArr['drpActv'] == 3.0){ echo 'menu-open';}else{ echo '';} ?>">
            <a class="nav-link <?php if($dataArr['drpActv'] == 3.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Reservation<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()?>Home/reservation/pending" class="nav-link <?php if($dataArr['actv'] == 3.1){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-calendar-times nav-icon"></i>
                  <p>Pending Reservation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/reservation/confirmed" class="nav-link <?php if($dataArr['actv'] == 3.2){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-calendar-check nav-icon"></i>
                  <p>Confirmed Reservation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/reservation/check-in" class="nav-link <?php if($dataArr['actv'] == 3.3){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-calendar-plus nav-icon"></i>
                  <p>Check-in Reservation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/reservation/finished" class="nav-link <?php if($dataArr['actv'] == 3.4){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-calendar-alt nav-icon"></i>
                  <p>Finished Reservation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/reservation/cancelled" class="nav-link <?php if($dataArr['actv'] == 3.5){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-calendar-times nav-icon"></i>
                  <p>Cancelled Reservation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/reservation/all" class="nav-link <?php if($dataArr['actv'] == 3.6){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-calendar-times nav-icon"></i>
                  <p>All Reservation</p>
                </a>
              </li>
            </ul>
          </li>
         <!--  <li class="nav-item">
            <a href="<?php echo base_url()?>home/cottages" class="nav-link <?php if($dataArr['actv'] == 4.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-hotel"></i>
              <p>Cottages</p>
            </a>
          </li> -->
         <!--  <li class="nav-item">
            <a href="<?php echo base_url()?>home/amenities" class="nav-link <?php if($dataArr['actv'] == 5.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-umbrella-beach"></i>
              <p>Amenities</p>
            </a>
          </li> -->
          <!-- <li class="nav-item has-treeview <?php if($dataArr['drpActv'] == 6.0){ echo 'menu-open';}else{ echo '';} ?>">
            <a class="nav-link <?php if($dataArr['drpActv'] == 6.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-folder"></i>
              <p>Packages<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/packages/tour-packages" class="nav-link <?php if($dataArr['actv'] == 6.1){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-biking nav-icon"></i>
                  <p>Tour Package</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/packages/day-tour" class="nav-link <?php if($dataArr['actv'] == 6.2){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-cloud-sun nav-icon"></i>
                  <p>Day Tour</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>home/packages/overnight" class="nav-link <?php if($dataArr['actv'] == 6.3){ echo 'active';}else{ echo '';} ?>">
                  <i class="fas fa-cloud-moon nav-icon"></i>
                  <p>Overnight</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url()?>home/notifications" class="nav-link <?php if($dataArr['actv'] == 13.0){ echo 'active';}else{ echo '';} ?>">
               
               <i class="nav-icon far fa-bell fa-pulse"></i>
               <p>
                Notification
               <!-- <span class="badge badge-warning navbar-badge">100</span> -->
               <span class="badge badge-warning right notifications"></span>
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo base_url()?>home/customer" class="nav-link <?php if($dataArr['actv'] == 7.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>Customer</p>
            </a>
          </li>
           <!-- <li class="nav-item">
            <a href="<?php echo base_url()?>home/billing" class="nav-link <?php if($dataArr['actv'] == 8.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>Billing</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url()?>home/reports" class="nav-link <?php if($dataArr['actv'] == 9.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>Reports</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?php //echo base_url()?>home/audit_logs" class="nav-link <?php //if($dataArr['actv'] == 11.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>Audit Logs</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url()?>home/user_management" class="nav-link <?php if($dataArr['actv'] == 12.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>User Management</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo base_url()?>home/maintenance/index" class="nav-link <?php if($dataArr['actv'] == 10.0){ echo 'active';}else{ echo '';} ?>">
              <i class="nav-icon fas fa-screwdriver"></i>
              <p>Maintenance</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php if($this->uri->segment(3) != 'invoice'): ?>
  <script type="text/javascript">


          var base = $('#base_url').val();
          var url = base+'Admin/notifications/is_read/0';

          function refresh_notif(){
           var refresh = 10000;
           mytime = setTimeout('ref_notif()', refresh);
         }

         function ref_notif(){

           $.getJSON(url,  function(data, status, xhr){
                if (xhr.status == 200) {
                    if(data.success){
                      $('.notifications').html(data.data.length);
                    }
                }else{
                  console.log('Server Error: '+xhr.statusText);
                }
           });

           refresh_notif();
         }

    $(document).ready(function(){

         refresh_notif();
     })

  </script>
  <?php endif; ?>