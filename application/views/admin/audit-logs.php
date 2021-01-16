
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-book"></i>&nbsp; Audit Logs</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Audit Logs</li>
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
                   <!--  <button id="remove" class="btn btn-danger">
                      <i class="fa fa-trash"></i> Pending
                    </button> -->
                  </div>
                  <table
                    id="table"
                    data-toggle="table"
                    data-toolbar="#toolbar"
                    data-query-params="queryParams"
                    data-ajax="ajaxRequest"
                    data-search="true"
                    data-search-time-out="1000"
                    data-trim-on-search="false"
                    data-show-refresh="true"
                    data-show-footer="true"
                    data-show-toggle="true"
                    data-show-fullscreen="true"
                    data-show-columns="true"
                    data-show-columns-toggle-all="true"
                    data-show-export="true"
                    data-click-to-select="true"
                    data-detail-formatter="detailFormatter"
                    data-minimum-count-columns="2"
                    data-show-pagination-switch="true"
                    data-pagination="true"
                    data-side-pagination="server"
                    data-page-list="[10, 25, 50, 100, all]"
                    data-show-footer="true"
                    data-show-print="true"
                    data-filter-control="true"
                    data-mobile-responsive="true"
                    data-locale= "en-US"
                    data-response-handler="responseHandler">
                    <thead class="thead-dark">
                      <tr>
                        <th data-field="audit_id">ID</th>
                        <th data-field="audit_action">Action</th>
                        <th data-field="audit_module">Module</th>
                        <th data-field="audit_description">Description</th>
                        <th data-field="user_id">User Id</th>
                        <th data-field="ip">IP Address</th>
                        <th data-field="audit_date">Date</th>
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
                       
                     //initTable();
                        
                    //   function initTable() {
                    //     $table.bootstrapTable({
                    //       locale: 'en-US'
                    //   })

                    //   $table.on('check.bs.table uncheck.bs.table ' +
                    //     'check-all.bs.table uncheck-all.bs.table',
                    //   function () {
                    //     $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)

                    //     // save your data, here just save the current page
                    //     selections = getIdSelections()
                    //     // push or splice the selections if you want to save all data selections
                    //   })
                    //   $table.on('all.bs.table', function (e, name, args) {
                    //     //console.log(name, args)
                    //   })
                    //   $remove.click(function () {
                    //     var ids = getIdSelections()
                    //     console.log(ids)
                    //     $table.bootstrapTable('remove', {
                    //       field: 'RCode',
                    //       values: ids
                    //     })
                    //     $remove.prop('disabled', true)
                    //   })
                    // }
                var querymode = 'search';
                var queryval = '';

                function queryParams(params) {
                            // //params.search = 8
                    params = {mode: querymode, val: queryval, sort: undefined, order: undefined, offset: 0, limit: 10 };
                      return params
                  }

                 var base = $('#base_url').val();
                function ajaxRequest(params) {
                    var url = base+'admin/crud/reservation/read-audit-logs';
                    $.getJSON(url + '/' + params.data.mode + '/' + params.data.val).then(function (res) {
                      params.success(res)
                    })

                  }

          $(function(){
              
              $('#selectfilter').change(function(){
                 var filterAlgorithm = $('[name="filterAlgorithm"').val();

                 querymode = "filter";
                 queryval = filterAlgorithm;
                 $('.search-input').val('');

                 $table.bootstrapTable('refresh')
                 
                //console.log(queryParams(params))

                 // $table.bootstrapTable('filterBy', {
                 //        Status: 'Pending'
                 //   });

              });

              $('.search-input').on('keyup', function(){
                  querymode = "search"; 
                  queryval = $('.search-input').val();

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

