
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="nav-icon fas fa-user"></i>&nbsp; User Management</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">User Management</li>
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
        <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
            <form id="modal-edit-form" class="form-horizontal" method="post" enctype="multipart/form-data" validate>
               <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h4 class="modal-title" style="color: white"> Edit </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="callout" style="background: white;color: #3a3232;border-left: none;padding: 15px">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label for="user_status">Status:</label>
                               <!--  <select class="custom-select" id="user_status" name="user_status">
                                    <option selected disabled>--Choose--</option>
                                    <option value="Active">Acive</option>
                                    <option value="Inactive">Inactive</option>
                                </select> -->
                                <input type="text" class="form-control" id="user_status" name="user_status" readonly="">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for="user_role">Role:</label>
                                <select class="custom-select" id="user_role" name="user_role">
                                    <option selected disabled>--Choose--</option>
                                    <option value="1">Administrator</option>
                                    <!-- <option value="2">User</option> -->
                                </select>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label for="user_email">Email Address:</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  title="Please enter a valid email address." placeholder="Email Address" required="">
                             </div>
                             <div class="col-lg-4 form-group">
                                <label for="user_fname">Firstname:</label>
                                <input type="text" class="form-control" id="user_fname" name="user_fname" pattern="([a-zA-Z \'\.\-]){2,50}" title="Please enter your real name." placeholder="Enter firstname" required="">
                              </div>
                              <div class="col-lg-4 form-group">
                                <label for="user_lname">Lastname:</label>
                                <input type="text" class="form-control" id="user_lname" name="user_lname" pattern="([a-zA-Z \'\.\-]){2,50}" title="Please enter your real surname." placeholder="Enter lastname" required="">
                              </div>
                              <div class="col-lg-4 form-group">
                                <label for="user_mname">Middlename:</label>
                                <input type="text" class="form-control" id="user_mname" name="user_mname" pattern="([a-zA-Z \'\.\-]){1,2}" title="Please enter a valid middle initial only." placeholder="Optional">
                              </div>
                              <div class="col-lg-6 form-group">
                                <label for="user_pass">New Password:</label>
                                <input type="password" class="form-control" id="user_pass" name="user_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters." placeholder="New Password">
                              </div>
                              <div class="col-lg-6 form-group">
                                <label for="user_confirm_pass">Confirm Password:</label>
                                <input type="password" class="form-control" id="user_confirm_pass" name="user_confirm_pass" placeholder="Confirm Password">
                              </div>
                        </div> 
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background: transparent;border-color: #343B41;color: #343B41;text-transform: uppercase;"> Cancel </button>
                    <button type="submit" class="btn btn-primary" style="border: #40b6f9;text-transform: uppercase;"> Update </button>
                  </div>
              </div>
            </form>
          </div>
       </div>

        <div class="row">
          <div class="col-12">
            <style>
                    .select,
                    #locale {
                      width: 100%;
                    }
                    .like {
                      margin-right: 10px;
                    }
                    #select{
                      width: 250px;
                      display: inline-block;
                    }
                  </style>

                  <div id="toolbar">
                   <!--  <select id="selectfilter" class="form-control" name="filterAlgorithm">
                      <option value="" selected>All</option>
                      <option value="0">Pending</option>
                      <option value="1">Confirmed</option>
                      <option value="2">Check-in</option>
                      <option value="3">Finished</option>
                      <option value="4">Cancelled</option>
                    </select> -->
                   <!--  <button id="remove" class="btn btn-primary">
                      <i class="fa fa-plus"></i> Add User
                    </button> -->
                  </div>
                  <table
                    id="table"
                    data-toggle="table"
                    data-toolbar="#toolbar"
                    data-query-params="queryParams"
                    data-ajax="ajaxRequest"
                    data-show-refresh="true"
                    data-show-toggle="true"
                    data-show-columns="true"
                    data-click-to-select="true"
                    data-detail-formatter="detailFormatter"
                    data-minimum-count-columns="2"
                    data-pagination="true"
                    data-side-pagination="server"
                    data-mobile-responsive="true"
                    data-locale= "en-US"
                    data-response-handler="responseHandler">
                    <thead class="thead-dark">
                      <tr>
                        <th data-field="acc_no">User ID</th>
                        <th data-field="name">Name</th>
                        <th data-field="email">Email Address</th>
                        <th data-field="acc_type">Role</th>
                        <th data-field="status">Status</th>
                        <th data-field="date_created">Date Created</th>
                        <th data-field="date_updated">Date Updated</th>
                        <th data-field="action" data-events="operateEvents" data-formatter="operateFormatter">Action</th>
                      </tr>
                    </thead>
                  </table>

                <script type="text/javascript">

                       var $table = $('#table')
                       var $remove = $('#remove')
                       var selections = []

                       function getIdSelections() {
                         return $.map($table.bootstrapTable('getSelections'), function (row) {
                           return row.statusCode
                         })
                       }

                       function responseHandler(res) {
                         // selections = new Array();
                         // selections = res;
                         // return selections;
                         return res;
                       }

                       function detailFormatter(index, row) {
                         var html = []
                         $.each(row, function (key, value) {
                           html.push('<p><b>' + key + ':</b> ' + value + '</p>')
                         })
                         return html.join('')
                       }


                    function operateFormatter(value, row, index) {
                         
                          var actions = '';
                          switch(row.acc_type){
                            case 'Administrator':
                               actions += '<a class="btn btn-primary edit" href="javascript:void(0)" title="Edit"><i class="fa fa-pencil-alt"></i></a>';
                              break;
                            case 'User':
                                actions += '<a class="btn bg-dark" href="javascript:void(0)" title="Check-in">Check-in</a>';
                              break;
                          }
                        return actions;
                     }

                     window.operateEvents = {
                       'click .edit': function (e, value, row, index) {

                         $('#user_status').val(row.status);
                         $('#user_role').val(row.role);
                         $('#user_email').val(row.email);
                         $('#user_fname').val(row.fname);
                         $('#user_lname').val(row.lname);
                         $('#user_mname').val(row.mname);
                         $('#modal-edit').modal('show');
                      },
                       'click .remove': function (e, value, row, index) {
                         $table.bootstrapTable('remove', {
                           field: 'RCode',
                           values: [row.Rsid]
                         })
                       }
                     }

                var querymode = 'search';
                var queryval = '';

                function queryParams(params) {
                            // //params.search = 8
                    params = {mode: querymode, val: queryval, sort: undefined, order: undefined, offset: 0, limit: 10 };
                      return params
                  }

                 var base = $('#base_url').val();
                function ajaxRequest(params) {
                    var url = base+'admin/crud/reservation/read-user-mgmt';
                    $.getJSON(url + '/' + params.data.mode + '/' + params.data.val).then(function (res) {
                      params.success(res)
                    })

                  }

          $(function(){

              $.validator.setDefaults({
                 submitHandler: function () { 

                      var $table = $('#table');
                      var base = $('#base_url').val();
                      var data = $('#modal-edit-form').serialize();
                      const url = base+'admin/crud/reservation/update-user-mgmt';
                      $.post(url, data, function (data, status, xhr) {

                            if(xhr.status == 200){
                                 if(data.success){
                                    $('#modal-edit').modal('hide');
                                    $table.bootstrapTable('refresh');
                                    $('.alert-success').html("<h6><i class='fas fa fa-warning'></i>&nbsp; "+data.message+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');

                                 }else{
                                     $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp; Can`t update please try again. </h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
                                 }
                            }else{
                               $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
                            }

                      },'JSON'
                    );
                 }
              })

              $('#modal-edit-form').validate({
                  rules: { 
                      user_confirm_pass:  { 
                        equalTo: "#user_pass" }
                      },
           messages: {
                      user_confirm_pass: {
                       equalTo: "Please check password. Must match as you've create a password."
                      }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                  error.addClass('invalid-feedback');
                  element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                  $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                  $(element).removeClass('is-invalid');
                }
             });
          });

           </script>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

