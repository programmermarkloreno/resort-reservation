
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

     <section class="content-header">
      <div class="callout" style="background: white;color: #343B41;border-left: 5px solid #343B41;margin-bottom: 5px; box-shadow: 8px 5px 19px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h4 style="margin:0px;font-size: 19px"><i class="fa fa-user"></i>&nbsp; Reports</h4>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/index">Home</a></li>
               <li class="breadcrumb-item active">Reports</li>
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
                  <div class="toolbar form-inline">
                    <div class="input-group">
                      <button type="button" class="btn btn-primary float-right" id="daterange-btn">
                        <i class="far fa-calendar-alt"></i> Select Date Range
                        <i class="fas fa-caret-down"></i>
                      </button>
                    </div>
                    <div class="input-group" style="margin-left: 20px; width: 400px;">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="reservation-range" disabled="">
                    </div>
                  </div>
                  <table
                    id="table"
                    data-toggle="table"
                    data-toolbar=".toolbar"
                    data-search-time-out="1000"
                    data-show-footer="true"
                    data-show-toggle="true"
                    data-show-columns="true"
                    data-show-export="true"
                    data-detail-formatter="detailFormatter"
                    data-minimum-count-columns="2"
                    data-pagination="true"
                    data-show-footer="true"
                    data-show-print="true"
                    data-mobile-responsive="true"
                    data-locale= "en-US"
                    data-response-handler="responseHandler">
                    <thead class="thead-dark">
                      <tr>
                        <th data-field="cus_id" data-footer-formatter="totalTextFormatter">Customer ID</th>
                        <th data-field="cus_rs" data-footer-formatter="totalNameFormatter">Reservation Code</th>
                        <th data-field="cus_company" data-footer-formatter="totalincome">Company</th>
                        <th data-field="cus_bill" data-formatter="TotalbillFormatter" data-footer-formatter="totalbill_Formatter">Total Bill</th>
                        <th data-field="cus_date">Created Date</th>
                      </tr>
                    </thead>
                  </table>
                  <!-- date-range-picker -->
                <script src="<?php echo base_url();?>assets/template/plugins/moment/moment.min.js"></script>
                <!-- <script src="assets/template/plugins/daterangepicker/daterangepicker.js"></script> -->
                <script src="<?php echo base_url();?>assets/template/plugins/daterangepicker-0.1.0/dist/knockout.js"></script>
                <script src="<?php echo base_url();?>assets/template/plugins/daterangepicker-0.1.0/dist/daterangepicker.js"></script>
                <script type="text/javascript">


                       var $table = $('#table')
                       var $remove = $('#remove')
                       var selections = []

                       const formatter = new Intl.NumberFormat('en-US', {
                              style: 'currency',
                              currency: 'PHP',
                              minimumFractionDigits: 2
                            });

                       function getIdSelections() {
                         return $.map($table.bootstrapTable('getSelections'), function (row) {
                           return row.statusCode
                         })
                       }

                       function responseHandler(res) {
                         return res;
                       }

                     function totalNameFormatter(data) {
                       return data.length
                     }

                     function totalincome(data) {
                       return 'Total Income';
                     }

                     function totalTextFormatter(data) {
                       return 'Total Reservation';
                     }

                    function totalbill_Formatter(data) {
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

                       function detailFormatter(index, row) {
                         var html = []
                         $.each(row, function (key, value) {
                           html.push('<p><b>' + key + ':</b> ' + value + '</p>')
                         })
                         return html.join('')
                       }

                  function load_reports(start, end){

                      var base = $('#base_url').val();
                      var url = base+'admin/crud/reservation/read-reports-data/strt/'+start+'/end/'+end;
                     $.getJSON(url, function (data, status, xhr) {
                           $table.bootstrapTable('load', data);
                     })
                  }

                $(function(){

                   $('#daterange-btn').daterangepicker(
                        {
                          forceUpdate: true,
                          callback: function(startDate, endDate, period){
                            //var title = startDate.format('L')+ ' - ' + endDate.format('L')
                            //$(this).val(title);
                            $('#reservation-range').val(startDate.format('MMMM D, YYYY') + ' - ' + endDate.format('MMMM D, YYYY'));
                             load_reports(startDate.format('MM-DD-YYYY'), endDate.format('MM-DD-YYYY'))
                          }

                      })

                        // $('#daterange-btn').daterangepicker(
                        //   {
                        //     period: ('day' | 'week' | 'month' | 'quarter' | 'year'),
                        //     ranges   : {
                        //       'Today'       : [moment(), moment()],
                        //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                        //       'Last Year' : [moment().subtract(1, 'year'), moment()]
                        //     },
                        //     startDate: moment().subtract(29, 'days'),
                        //     endDate  : moment()
                        //   },
                        //   function (start, end) {
                        //        $('#reservation-range').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                        //        load_reports(start.format('MM-DD-YYYY'), end.format('MM-DD-YYYY'))
                        //   }
                        // )
              
                    });

           </script>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

