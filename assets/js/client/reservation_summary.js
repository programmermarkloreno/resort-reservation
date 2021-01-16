(function ($) {
    'use strict';

    var base = $('#base_url').val();
    var segment = $('#segment').val();

    var storage = [];

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
        minimumFractionDigits: 2
      });

    var seg, guest, exGuest, dates, days, time, price, duedate;
    function retrievedData(){

    	var getData = localStorage.getItem('data');
        var data = JSON.parse(getData);

    	var i;
    	for(i = 0; i < data.length; i++){
	    		if(data[i].name == 'e_code'){ seg = data[i].value; }
	       else if(data[i].name == 'rs_guest'){ guest = data[i].value; }
	       else if(data[i].name == 'rs_excess'){ exGuest = data[i].value; }
	       else if(data[i].name == 'rs_date'){ dates = data[i].value; }
	       else if(data[i].name == 'rs_time'){ time = data[i].value; }
	       else if(data[i].name == 'rs_days'){ days = data[i].value; }
	       // else if(data[i].name == 'rs_days'){ data[i].value > 0 ? days = data[i].value : days = 1; console.log(data[i].value);}
    	
    	}

    	$('#guest').html(guest);
        $('#exGuest').html(exGuest);
        $('#days').html(days);
        $('#arrival').html(time);

        Date.prototype.addDays = function(getdays) {
           this.setDate(this.getDate() + parseInt(getdays));
           return this;
        };

        Date.prototype.duedates = function(getdays) {
           this.setDate(this.getDate() - parseInt(getdays));
           return this;
        };

        let date = new Date(dates);
        $('#dateFrom').html(date.toDateString());

        var tillDate = date.addDays(days);
        $('#dateTo').html(tillDate.toDateString());
        
         let dateDue = new Date(dates);
         duedate = dateDue.duedates(7);
         duedate = duedate.toDateString();
    }

     var totalAmount = 0;
     var exGuestRates = 0;
    function computeRates(mode, getdays, getprice){

	      var totComp;
	      var compute;
	     if(mode == 'A') {
	           parseInt(exGuest) > 0 ? exGuestRates = (parseFloat(getprice) / parseInt(guest) * parseInt(exGuest)) * parseInt(getdays) : false;
	           totComp = (parseFloat(getprice) * parseInt(getdays)) + parseFloat(exGuestRates);
	           compute = parseFloat(totComp) + parseFloat(totalAmount);
	           totalAmount = parseFloat(compute);
           }else if(mode == 'B'){
           	   totComp = parseFloat(getprice) * parseInt(getdays);
           	   compute = parseFloat(totComp) + parseFloat(totalAmount);
	           totalAmount = parseFloat(compute);
           }
           $('#exRates').html(formatter.format(exGuestRates));
           $('#totalAmount').html(formatter.format(totalAmount));
    }

    function summary(){
    	 var getPckgs = localStorage.getItem('pckgs');
    	 var packages = JSON.parse(getPckgs);

    	 var html = '';
    	 for(var i = 0; i < packages.length; i++){
            html +='<tr>'+
                    '<td>'+packages[i].package+'</td>'+
                    '<td>'+packages[i].days+'</td>'+
                    '<td>'+packages[i].desc+'</td>'+
                    '<td>'+formatter.format(packages[i].price)+'</td>'+
                  '</tr>';
               computeRates(packages[i].mode, packages[i].days, packages[i].price);
            }
            //console.log(packages);
        $('#tbl-summary').html(html);
    }
    
    retrievedData();
    summary();

    var token = $('#token').val();

     $.validator.setDefaults({
        submitHandler: function () {

	          $(".loader").fadeIn();
	          $("#preloder").show(); 

	         // var JSONObj = JSON.stringify(storage);
             $('#reservation-submit').attr('disabled', 'disabled');

	         var JSONObj = localStorage.getItem('pckgs');
	         var data = JSON.parse(localStorage.getItem('data'));
	         var modeOfPayment = $('#rs_modeofpayment').val();
	         var dateCreated = $('#datetime_val').val();
	         
	         $.ajax({
	            url: base+'client/crud_func/client/reservation',
	            headers: {'X-Requested-With':'XMLHttpRequest'},
	            method: 'GET',
	            data: {dataA: data, dataB: JSONObj, amount: parseFloat(totalAmount), date: duedate, modeOfPay: modeOfPayment, createdDate: dateCreated},
	            cache: false,
	            async: true,
	            dataType: 'json',
	            success: function(response){ 
	               if(response.success){
	                 localStorage.clear();
	                 window.top.location = base+'Client/reserved/'+token+'/reservation?true';
	               }else{

	                 $(".loader").fadeOut();
	                 $("#preloder").delay(200).fadeOut("slow");
	                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't reserve at this moment. Please try again.</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
	              }
	            },
	            error: function(xhr){
	              $(".loader").fadeOut();
	              $("#preloder").delay(200).fadeOut("slow");
	              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
	            }
	        });

            $('#reservation-submit').removeAttr('disabled', 'disabled');
         }
     });

     $('#reservation_form_summary').validate({
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

     $('.btn-danger').on('click', function(){
     	localStorage.clear();
	    window.top.location = base+'Client/reservation/'+token;
     });

     
})(jQuery);