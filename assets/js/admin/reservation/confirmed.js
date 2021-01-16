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
   const url = base+'admin/crud/read-settings/re_sched';
  
   function response_alerts(res, bol, stat, msg){

      switch(res){
               case 'checkin':
                      JSON.parse(uriCon) ? $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp Successfully check-in.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') :  $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp Can't check-in because it`s not day for check-in.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');
                break;
            case 'resched':
                    JSON.parse(uriCon) ? $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp Successfully Re-Schedule this reservation.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') :  $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp Can't Re-Schedule this reservation.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');
                break;
            case 'cancel':
                  JSON.parse(uriCon) ?  $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp Successfully cancelled reservation.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') : $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp Can't cancelled this reservation. Please try again.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');
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

    Date.prototype.couldNotResched = function(getdays) {
         this.setDate(this.getDate() - parseInt(getdays));
         return this;
      };

  var settings = [];

  function findSettings(key){

     //  var value = [];
     //  $.getJSON(url,
     //  function(responseJSON){
     //      results.push({
     //        'isRe_sched': responseJSON.data[0].slug_name,
     //        'isValueOf': responseJSON.data[0].value
     //      });
     //     var result = results.find(obj => { return obj.isRe_sched ===  key});
     //      value.push({
     //        'getVal': result.isValueOf
     //      });
     //      //console.log(value.isValueOf);
     //    }
     //  );
     // return value.findIndex(obj => obj.getVal === 0);
      // let obj = {
      //   length: 0,
      //   addElem: function addElem(elem){
      //     console.log(elem);
      //     [].push.call(this.elem)
      //   }
      // }

     $.ajax({
          type: 'ajax',
          url: url,
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          cache: false,
          async: true,
          dataType: 'json',
          success: function(response){
                localStorage.clear();
                settings.push({
                'isRe_sched': response.data[0].slug_name,
                'isValueOf': response.data[0].value
              });

             const res = settings.find( ({isRe_sched}) => isRe_sched === key);
              if(res != undefined){
                  localStorage.setItem('valueOfsettings', res.isValueOf);
              }
          },
          error: function(xhr){
            response_alerts('server-err', false, xhr.status, xhr.statusText);
          }
     });
    
  }

  findSettings('re_sched');

  var confirmInformation;
  function loadrequests(){

      confirmInformation = new Array();
      
      var daysForReSched = localStorage.getItem('valueOfsettings');

    	$.ajax({
    		type: 'ajax',
          url: base+'admin/crud/reservation/read/confirmed',
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          cache: false,
          async: true,
	        dataType: 'json',
	        success: function(response){
              if(response.success){
                var dNone = '';
                var badge = '';
              	var html = '';
    		        var i;
                let today = new Date();
    		        for(i=0; i<response.data.length; i++){

                      let datecouldNotResched = new Date(response.data[i].CheckIn);
                           datecouldNotResched = datecouldNotResched.couldNotResched(Number(daysForReSched));
                         
                         var percent = response.data[i].Totalbill * .50;
                         var paid = response.data[i].Totalbill - response.data[i].Balance;
                          paid >= percent ? badge = 'badge-success': badge = 'badge-danger';

                         datecouldNotResched <= today ? dNone = 'd-none' : dNone = '';

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
                        '<td class="project-actions text-right"><div class="btn-group"><button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button><div class="dropdown-menu dropdown-menu-right">'+
                        '<button type="button" class="btn bg-warning check-in-btn dropdown-item" data-id="'+response.data[i].RCode+'" data-rel="'+response.data[i].CheckIn+'" value="'+response.data[i].TimeIn+'"><i class="fas fa-check-square"></i> Check-In </button>'+
                        //'<button type="button" class="btn bg-primary resched-btn dropdown-item '+dNone+'" data-toggle="modal" data-id="'+response.data[i].RCode+'" value="'+response.data[i].CheckIn+'"><i class="fas fa-pencil-alt"></i> Re-Schedule </button>'+
                        '<button type="button" data-id="'+response.data[i].CustomerId+'" class="btn bg-info dropdown-item view"><i class="fa fa-search"></i>View</button>'+
                        // '<button href="#cancel-btn" type="button" class="btn bg-danger cancel-btn dropdown-item" data-toggle="modal" data-id="'+response.data[i].RCode+'"><i class="fas fa-times-circle"></i> Cancel </button>'+
                        '</div></div></td>'+
                      '</tr>';

                      confirmInformation.push({
                          'CustomerId': response.data[i].CustomerId,
                          'RCode': response.data[i].RCode,
                          'Totalbill': response.data[i].Totalbill,
                          'Balance': response.data[i].Balance,
                          'Mobile': response.data[i].Mobile,
                          'CheckIn': response.data[i].CheckIn,
                          'NDays': response.data[i].NDays,
                          'RType': response.data[i].RType,
                      });
    			          }

    			         $('#table').html(html);
                  }else{
                     // response_alerts('no-data', false, '', 'No confirmed reservation found!');
                     $('#tbl-caption').text("No confirmed reservation found.");
                  }
                },
                error: function(xhr){
                  response_alerts('server-err', false, xhr.status, xhr.statusText);
                }
            });
		 }

     loadrequests();

     function check_in(){

       var id = $('#rs-checkin-id').val();
       var data = $('#check-in-accomodation').serialize();

        $.ajax({
        type: 'ajax',
          url: base+'Admin/crud/reservation/confirmed-update/'+id,
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          data: data,
          async: true,
          cache: false,
          dataType: 'json',
          success: function(response){
              if(response.success){
                 window.top.location = base+"home/reservation/confirmed/checkin/true";
              }
            },
            error: function(xhr){
              response_alerts('server-err', false, xhr.status, xhr.statusText);
            }
        });

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
                window.top.location = base+"home/reservation/confirmed/resched/true";
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
         var att2 = document.createAttribute("min");
         var id = $('#resched-id').val();
         var result = confirmInformation.find(obj => { return obj.RCode === id });

         for(i = 0; i < disabledDates.length; i++){
             let getDates = new Date(disabledDates[i]);
             if(startDate < getDates){
              var endtime = getDates.getTime();
              var diffTime = endtime - strtTime;
              var diffdays = diffTime / (1000 * 3600 * 24);
              var maxDays = diffdays; 
              if(maxDays != 0){
                 att.value = maxDays;
                 att2.value = Number(result.NDays);
                 field.setAttributeNode(att);
                 field.setAttributeNode(att2);
               }else{
                 att.value = Number(result.NDays);
                 att2.value = Number(result.NDays);
                 field.setAttributeNode(att);
                 field.setAttributeNode(att2);
               }
               return;
             }else {
               att.value = Number(result.NDays);
                 att2.value = Number(result.NDays);
                 field.setAttributeNode(att);
                 field.setAttributeNode(att2);
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

     $('#cancel-accomodation').on('submit', function(){
         
         var code = $('#cancel-code').val();
         $.ajax({
          type: 'ajax',
          url: base+'Admin/crud/reservation/cancel-accomodation/'+code,
          headers: {'X-Requested-With':'XMLHttpRequest'},
          async: true,
          cache: false,
          dataType: 'json',
          success: function(response){
              if(response.success){
                 window.top.location = base+"home/reservation/confirmed/cancel/true";
              }
            },
            error: function(xhr){
             response_alerts('server-err', false, xhr.status, xhr.statusText);
            }
        });
     });

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
              console.log(false);
               return false;
            }else{
              console.log(true);
               return true;
            }
     }

      var mode = 0;
     $('#table').on('click', '.check-in-btn', function(){
        var timein = $(this).attr('value');
        var RSid = $(this).attr('data-id');
        var datein = $(this).attr('data-rel');

        cant_checkin(datein) ? (
         $('#check-in-btn').modal('show'),
         $('#confirmed_time').val(timein),
         $('#rs-checkin-id').val(RSid),
           mode = 1
          ) : 
         window.top.location = base+"home/reservation/confirmed/checkin/false";

        
     });

      $('#table').on('click', '.cancel-btn', function(){
          var html = $(this).attr('data-id');
          $('#code').html('<h3>'+html+'</h3>');
          $('#cancel-code').val(html);
      });

      $('#table').on('click', '.view', function(){
          var id = $(this).attr('data-id');
           window.top.location = base+'home/reservation/view-info/'+id;
      });

      $('#table').on('click', '.resched-btn', function(){
          var dateIn = $(this).attr('value');
          var html = $(this).attr('data-id');

          cant_resched(dateIn) ? (

            reserve_dates(html),
          $("#resched-btn").modal('show'),
          $('#rsCode').html('<h3>'+html+'</h3>'),
          $('#resched-id').val(html),
          $('#resched-accomodation')[0].reset(),
           mode = 2
          ) : 
        window.top.location = base+"home/reservation/confirmed/resched/false";
         
      });

      $.validator.setDefaults({
        submitHandler: function () {
          switch(mode){
              case 1:
                 check_in();
                break;
              case 2:
                 resched_reservation();
                break;
              case 3:
                alert(mode);
                break;
              case 4:
                alert(mode);
                break;
          }
        }
     });

     $('#check-in-accomodation').validate({
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
