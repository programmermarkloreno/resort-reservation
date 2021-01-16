
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-calendar-check"></i>&nbsp; All Reservations</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Reservation</li>
               <li class="breadcrumb-item active">All Reservations</li>
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
            <!-- <div class="callout" style="background: white;color: #343B41;border-left: 5px solid transparent">
              <div class="row" style="padding-top: 20px; padding-bottom: 10px;">
                  
                </div>
               <div class="box-body table-responsive"> -->
                                     
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
                    <select id="selectfilter" class="form-control" name="filterAlgorithm">
                      <option value="" selected>All</option>
                      <option value="0">Pending</option>
                      <option value="1">Confirmed</option>
                      <option value="2">Check-in</option>
                      <option value="3">For-Reschedule</option>
                      <option value="4">Cancelled</option>
                      <option value="5">Finished</option>
                    </select>
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
                    data-row-style="rowStyle"
                    data-response-handler="responseHandler">
                    <thead class="thead-dark">
                      <tr>
                        <th data-field="CustomerId" data-footer-formatter="totalTextFormatter">Customer ID</th>
                        <th data-field="RCode" data-footer-formatter="totalNameFormatter">Reservation Code</th>
                        <th data-field="Status">Status</th>
                        <th data-field="name">Name</th>
                        <th data-field="Company">Company</th>
                        <th data-field="Mobile">Mobile</th>
                        <th data-field="Email">Email Address</th>
                        <th data-field="CheckIn" data-formatter="checkInFormatter">Check-in Datetime</th>
                        <!-- <th data-field="" data-sortable="true">Expected Departure</th> -->
                        <th data-field="RType">Type</th>
                        <th data-field="Totalbill" data-formatter="TotalbillFormatter" data-footer-formatter="totalbill_Formatter">Total Bill</th>
                        <th data-field="Balance" data-formatter="BalanceFormatter" data-footer-formatter="totalbal_Formatter">Balance</th>
                        <th data-field="dateCreated">Date Created</th>
                        <!-- <th data-field="action" data-events="operateEvents" data-formatter="operateFormatter">Action</th> -->
                       
                      </tr>
                    </thead>
                  </table>

                <script type="text/javascript">

                        const formatter = new Intl.NumberFormat('en-US', {
                              style: 'currency',
                              currency: 'PHP',
                              minimumFractionDigits: 2
                            });


                       var $table = $('#table')
                       var $remove = $('#remove')
                       var selections = []

                       function getIdSelections() {
                         return $.map($table.bootstrapTable('getSelections'), function (row) {
                           return row.statusCode
                         })
                       }

                       function responseHandler(res) {
                         selections = new Array();
                         selections = res;
                         return selections;
                       }

                       function rowStyle(row, index) {
                             
                            var classes = [
                              'bg-red',
                              'bg-green',
                              'bg-orange',
                              'bg-blue',
                              'bg-aqua',
                              'bg-yellow',
                            ]
                              
                             if (row.statusCode == 0) {  
                           return { classes: classes[0] }// Pending = 0
                        }else if(row.statusCode == 1){
                           return { classes: classes[1] }// Confirmed = 1
                        }else if(row.statusCode == 2){
                           return { classes: classes[2] }// Check-in = 2
                        }else if(row.statusCode == 3){
                           return { classes: classes[3] }// For- ReSched = 3
                        }else if(row.statusCode == 4){
                           return { classes: classes[4] }// Cancelled = 4
                        }else if(row.statusCode == 5){
                           return { classes: classes[5] } // Finished = 5
                        }else{
                          return {
                          css: {
                            color: 'blue'
                          }
                        }
                      }
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
                          switch(Number(row.statusCode)){
                            case 0:
                               actions += '<a class="btn btn-primary" href="javascript:void(0)" title="Pay">Pay</a>';
                              break;
                            case 1:
                                actions += '<a class="btn bg-dark" href="javascript:void(0)" title="Check-in">Check-in</a>';
                              break;
                            case 2:
                              break;
                            case 3:
                              break;
                            case 4:
                              break;
                          }

                          // console.log()
                        return actions;
                       //   return [
                       //     '<a class="like" href="javascript:void(0)" title="Check-in">',
                       //     '<i class="fa fa-heart"></i>',
                       //     '</a>  ',
                       //     '<a class="remove" href="javascript:void(0)" title="Cancel">',
                       //   '<i class="fa fa-trash"></i>',
                       //   '</a>'
                       // ].join('')
                     }

                     window.operateEvents = {
                       'click .like': function (e, value, row, index) {
                         alert('You click like action, row: ' + JSON.stringify(row))
                      },
                       'click .remove': function (e, value, row, index) {
                         $table.bootstrapTable('remove', {
                           field: 'RCode',
                           values: [row.Rsid]
                         })
                       }
                     }

                     function totalTextFormatter(data) {
                       return 'Total'
                     }

                     function totalNameFormatter(data) {
                       return data.length
                     }

                     function totalbill_Formatter(data) {
                       var field = this.field
                       return formatter.format(data.map(function (row) {
                         return +row[field].substring(0)
                       }).reduce(function (sum, i) {
                         return sum + i
                       }, 0))
                     }

                     function totalbal_Formatter(data) {
                       var field = this.field
                       return formatter.format(data.map(function (row) {
                         return +row[field].substring(0)
                       }).reduce(function (sum, i) {
                         return sum + i
                       }, 0))
                     }

                     function TotalbillFormatter(data){
                          return formatter.format(data);
                     }

                     function BalanceFormatter(data){
                          return formatter.format(data);
                     }

                    Date.prototype.checkDateOut = function(getdays) {
                           this.setDate(this.getDate() - parseInt(getdays));
                           return this;
                   };

                   Date.prototype.addDays = function(getdays) {
                           this.setDate(this.getDate() + parseInt(getdays));
                           return this;
                   };

                   function checkInFormatter(data){
                      let dateIn = new Date(data);
                       return dateIn.toDateString();
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
                    var url = base+'admin/crud/reservation/read-allData';
                    $.getJSON(url + '/' + params.data.mode + '/' + params.data.val).then(function (res) {
                      params.success(res)
                      //console.log(res)
                    })
                    //  console.log(params.data.search)
                    //  $.getJSON(url, function(responseJSON){
                    //     params.success(responseJSON)
                       // console.log(params)
                    // })

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
             <!--  </div>
            </div>  -->
         </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





