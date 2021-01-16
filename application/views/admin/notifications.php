
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-user"></i>&nbsp; Notifications</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Notifications</li>
            </ol>
          </div>
        </div>
        
      </div>      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Notifications</h3>

              <!-- <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
               <!--  <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div> -->
                <!-- /.btn-group -->
                <!-- <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                  </div> -->
                  <!-- /.btn-group -->
                <!-- </div> -->
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <caption id="tbl-notif-caption" style="text-align: center;"></caption>
                  <tbody id="tbl-notif">
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
               <!--  <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div> -->
                <!-- /.btn-group -->
               <!--  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                  </div> -->
                  <!-- /.btn-group -->
                <!-- </div> -->
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
     
     $(function(){

          var base = $('#base_url').val();
          var url = base+'Admin/notifications_read';
          $.getJSON(url,  function(data, status, xhr){
                if (xhr.status == 200) {
                    if(data.success){
                      var tbl = '';
                        for(var i = 0; i < data.data.length; i++){
                            tbl += '<tr>'+
                                   '<td class="mailbox-name">'+data.data[i].name+'</td>'+
                                   '<td class="mailbox-subject"><b>'+data.data[i].subject+'</b> - '+data.data[i].message+'</td>'+
                                  '<td class="mailbox-date">'+data.data[i].date_created+'</td>'+
                              '</tr>';
                        }
                      $('#tbl-notif').html(tbl);
                    }else{
                       $('#tbl-notif-caption').html("No notifications found.");
                    }
                }else{
                  console.log('Server Error: '+xhr.statusText);
                }
           });
     });
  </script>

