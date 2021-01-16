(function($){
	'use strict'

   const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
        minimumFractionDigits: 2
      });

   var base = $('#base_url').val();
   var uriMode = $('#response_mode').val();
   var uriCon = $('#response_con').val();

   function response_alerts(res, bol, stat, msg){

      switch(res){
               case 'resched':
                    JSON.parse(uriCon) ? $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp Successfully Re-Schedule this reservation.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') :  $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp Can't Re-Schedule this reservation.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');
                break;
            case 'refund':
                  JSON.parse(uriCon) ?  $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp Successfully refund reservation fee.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') : $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp Can't refund this reservation. Because it`s event is almost near or haven`t fees to be refund.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');
                break;
              case 'no-data':
                    bol ? true : $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp "+msg+"</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(3000).fadeOut('slow');
                break;
              case 'msg-failed-res':
                    bol ? true: $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp "+msg+" </h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(6000).fadeOut('slow');
                break;
              case 'server-err':
                    bol ? true :  $('.alert-danger').html("<h4><i class='fas fa fa-warning'></i>&nbsp Server error found- "+stat+ " " +msg+"</h4><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
                break;
            }
     }

   response_alerts(uriMode, uriCon, '', '');

   var storedata = [];

  function loadrequests(){

    	$.ajax({
    		type: 'ajax',
          url: base+'admin/crud/reservation/read/cancelled',
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          async: true,
	        dataType: 'json',
	        success: function(response){
              if(response.success){
                var ref;
                var badge = '';
              	var html = '';
    		        var i;
    		        for(i=0; i<response.data.length; i++){

                        var percent = response.data[i].Totalbill * .50;
                        var paid = response.data[i].Totalbill - response.data[i].Balance;
                          paid >= percent ? badge = 'badge-success': badge = 'badge-danger';

                          paid > 0 ? ref = true : ref = false;
                        
    	                  html += '<tr>'+
    	           				'<td><center>'+response.data[i].CustomerId+'</td></center>'+
                        '<td><center>'+response.data[i].RCode+'</td></center>'+
                        '<td><center>'+response.data[i].LastName+'</td></center>'+
                        '<td><center>'+response.data[i].FirstName+'</td></center>'+
                        '<td><center>'+response.data[i].Mobile+'</td></center>'+
                        '<td><center>'+response.data[i].CheckIn+'</td></center>'+
                        '<td><center>'+response.data[i].RType+'</td></center>'+
                        '<td><center>'+formatter.format(response.data[i].Totalbill)+'</td></center>'+
                        '<td><center><span class="badge '+badge+'">'+formatter.format(response.data[i].Balance)+'</span></td></center>'+
    	             			'<td class="project-actions text-right">'+
                        '<button type="button" class="btn bg-warning refund-btn dropdown-item" data-toggle="modal" data-id="'+response.data[i].RCode+'" data-rel="'+ref+'" value="'+response.data[i].CheckIn+'"><i class="fas fa-check-square"></i> Refund </button>'+
                           '</td>'+
                          '</tr>';

                          storedata.push({
                              'CustomerId': response.data[i].CustomerId,
                              'RCode': response.data[i].RCode,
                              'Totalbill': response.data[i].Totalbill,
                              'Balance': response.data[i].Balance
                          });
                        // <div class="btn-group"><button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button><div class="dropdown-menu dropdown-menu-right">'+
                        // '<input type="hidden" id="'+response.data[i].RCode+'" value="'+paid+'">'+
                        // '<button type="button" class="btn bg-warning refund-btn dropdown-item" data-toggle="modal" data-id="'+response.data[i].RCode+'" data-rel="'+ref+'" value="'+response.data[i].CheckIn+'"><i class="fas fa-check-square"></i> Refund </button>'+
                       // '<button type="button" class="btn bg-primary resched-btn dropdown-item" data-toggle="modal" data-id="'+response.data[i].RCode+'" value="'+response.data[i].CheckIn+'"><i class="fas fa-pencil-alt"></i> Re-Schedule </button>'+
                        // '</div></div></td>'+
    	           			// '</tr>';
    			          }
    			         $('#table').html(html);
                  }else{
                      // response_alerts('no-data', false, '', 'No cancelled reservation found!');
                       $('#tbl-caption').text("No cancelled reservation found.");
                  }
                },
                error: function(xhr){
                    response_alerts('server-err', false, xhr.status, xhr.statusText);
                }
            });
		 }

   loadrequests();

      function cant_checkin(d){

        let checkinDate = new Date(d);

        let today = new Date();
        var dDate = today.getDate(), 
            dMonth = today.getMonth(),
            dYear = today.getFullYear();
        var newDay = new Date(dYear, dMonth, dDate);

            if(newDay >= checkinDate && checkinDate >= newDay){
               return true;
            }else{
               return false;
            }
     }

     function cant_resched(d){

        let today = new Date();
        let checkinDate = new Date(d);

        var dDate = (today.getDate() + 14), 
            dMonth = today.getMonth(),
            dYear = today.getFullYear();
        var newDay = new Date(dYear, dMonth, dDate);
            if(newDay >= checkinDate){
               return false;
            }else{
               return true;
            }
     }

     function cant_refund(d, con){

        let today = new Date();
        let checkinDate = new Date(d);
          //console.log(JSON.parse(con));
        var dDate = (today.getDate() + 14), 
            dMonth = today.getMonth(),
            dYear = today.getFullYear();
        var newDay = new Date(dYear, dMonth, dDate);
            if(newDay >= checkinDate || JSON.parse(con) != true){
               return false;
            }
            else{
               return true;
            }
     }

      Date.prototype.addDays = function(getdays) {
           this.setDate(this.getDate() + parseInt(getdays));
           return this;
        };

      var disabledDates = [];
    function reserve_dates(rs){
       $.ajax({
            url: base+'admin/crud/client/reserved_dates',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            async: true,
            dataType: 'json',
            success: function(response){
              if(response.success){
                disabledDates = new Array();
                var i, j;
                for(i=0; i<response.data.length; i++){

                     if(response.data[i].RCode != rs){
                       for(j=0; j<=response.data[i].NDays; j++){
                          let dates = new Date(response.data[i].CheckIn);
                          var getDatesTodisabled = dates.addDays(j);

                          var month = getDatesTodisabled.getMonth() + 1, 
                              date = getDatesTodisabled.getDate(),
                              year = getDatesTodisabled.getFullYear();

                            disabledDates.push(month+"-"+date+"-"+year);
                       }
                    }
                 }
                 //console.log(disabledDates)
               }
            },
            error: function(xhr){
               response_alerts('server-err', false, xhr.status, xhr.statusText);
            }
        });
    }

    function resched_reservation(){

       var id = $('#resched-id').val();
       var data = $('#resched-accomodation').serialize();

        $.ajax({
        type: 'ajax',
          url: base+'Admin/crud/reservation/resched-reservation/'+id,
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          data: data,
          async: true,
          cache: false,
          dataType: 'json',
          success: function(response){
              if(response.success){
                window.top.location = base+"home/reservation/cancelled/resched/true";
              }
            },
            error: function(xhr){
               response_alerts('server-err', false, xhr.status, xhr.statusText);
            }
        });

     }


    $('#rs_date').change(function(){

         var startDate = $(this).datepicker('getDate');
         var strtTime = startDate.getTime();
         var i;
         var getDisabled;
         var field = document.getElementById('rs_days');
         var att = document.createAttribute("max");

         for(i = 0; i < disabledDates.length; i++){
             let getDates = new Date(disabledDates[i]);
             if(startDate < getDates){
              var endtime = getDates.getTime();
              var diffTime = endtime - strtTime;
              var diffdays = diffTime / (1000 * 3600 * 24);
              var maxDays = diffdays; 
              if(maxDays != 0){
                 att.value = maxDays;
                 field.setAttributeNode(att);
               }else{
                 att.value = 1;
                 field.setAttributeNode(att);
               }
               return;
             }else {
               att.value = 15;
               field.setAttributeNode(att);
             }
         }
    });

    function _reservedDates(date){
        date =  (date.getMonth() + 1) + '-' + date.getDate() + '-' + date.getFullYear();
        if(disabledDates.indexOf(date) >= 0){ 
          return [false, "notav", "Not Available"];
        }else {
          return [true, "av", "Available"];
        }
    }  

     $('#rs_date').datepicker({
          showAnim: 'fold',
          minDate: '+15d',
          maxDate: '+3m +15d',
          dateFormat: 'mm-dd-yy',
          beforeShowDay: _reservedDates
     });

      var mode = 0;
    $('#table').on('click', '.resched-btn', function(){
          var dateIn = $(this).attr('value');
          var html = $(this).attr('data-id');

          cant_resched(dateIn) ? (

            reserve_dates(html),
          $("#resched-btn").modal('show'),
          $('#rsCode').html('<h3>'+html+'</h3>'),
          $('#resched-id').val(html),
          $('#resched-accomodation')[0].reset(),
           mode = 1
          ) : 
        window.top.location = base+"home/reservation/cancelled/resched/false";
         
      });

     $('#table').on('click', '.refund-btn', function(){
          var dateIn = $(this).attr('value');
          var RSid = $(this).attr('data-id');
          var isRef = $(this).attr('data-rel');

          var result = storedata.find(obj => { return obj.RCode === RSid });

           cant_refund(dateIn, isRef) ? (
                $("#refund-btn").modal('show'),
                $('#down-code').html('<h3>'+RSid+'</h3>'),
                $('#rs-refund-id').val(RSid),
                $('#refund_amount').val(formatter.format(result.Balance, 2))
            ) : 
           window.top.location = base+"home/reservation/cancelled/refund/false";
         
      });

     $('#refund-accomodation').on('submit', function(){

          var RSid = $('#rs-refund-id').val();
          var result = storedata.find(obj => { return obj.RCode === RSid });
          const url  = base+"Admin/crud/reservation/refund-payment";
          const data = {};
                data.rID = result.RCode;
                data.totbill = result.Totalbill;

          $.post(url, data, function(data, status, xhr){
                if(xhr.status == 200){
                    if(data.success){
                        console.log(data)
                    }else{
                        console.log(data)
                    }
                }else{
                 response_alerts('server-err', false, xhr.status, xhr.statusText);
                }
          }, 'JSON');

     });

     $.validator.setDefaults({
        submitHandler: function () {
          switch(mode){
              case 1:
                 resched_reservation();
                break;
              case 2:
                   alert(mode);
                break;
          }
        }
     });

     $('#resched-accomodation').validate({
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

})(jQuery)