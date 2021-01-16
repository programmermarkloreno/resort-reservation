(function ($) {
    'use strict';

    var base = $('#base_url').val();
    var segment = $('#segment').val();
    var rs_mode = $('#reservation_mode').val();

    Date.prototype.addDays = function(getdays) {
           this.setDate(this.getDate() + parseInt(getdays));
           return this;
        };

    var disabledDates = new Array();
    function reserve_dates(){
       $.ajax({
            url: base+'client/crud_func/client/reserved_dates',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            async: true,
            dataType: 'json',
            success: function(response){
              if(response.success){
                var i, j;
                for(i=0; i<response.data.length; i++){
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
            },
            error: function(xhr){
               $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
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
              var maxDays = diffdays - 1; 
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

    var pckgsStorage = [];

    function reservation_accommodation(){

        $('#next-btn').attr('disabled', 'disabled');
        
    	  var token = $('#e_code').val();
        var data = $('#reservation_form').serializeArray();
        
        pckgsStorage = new Array();
     	var categid = $('#rs_id').val();
     	 $.ajax({
	            url: base+'client/crud_func/client/additional/'+categid,
	            headers: {'X-Requested-With':'XMLHttpRequest'},
              cache: true,
	            async: true,
	            dataType: 'json',
	            success: function(response){
	              if(response.success){

                  $('#next-btn').removeAttr('disabled', 'disabled');

	                var cost = response.data[0].price;
	                var addNdays = $('#rs_days').val();
	              
	                 pckgsStorage.push({
	                 	mode: 'A',
	                    id: response.data[0].sub_category_id,
	                    days: addNdays,
	                    package: response.data[0].Category_title,
	                    desc: response.data[0].Category_desc,
	                    price: cost,
	                 });

	                localStorage.setItem('data', JSON.stringify(data));
	                localStorage.setItem('pckgs', JSON.stringify(pckgsStorage));
	                window.top.location = base+'Client/reservation_summary/'+token+'/'+addNdays;
	               }else{
                    $(".loader").fadeOut();
                    $("#preloder").delay(200).fadeOut("slow");
                    $('#next-btn').removeAttr('disabled', 'disabled');
	               		$('.alert-danger').html("<h6><i class='fas fa fa-times'></i>&nbsp Can't proceed please try again.</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>").fadeIn().delay(5000).fadeOut('slow');
	               }
	            },
	            error: function(xhr){
                 $(".loader").fadeOut();
                 $("#preloder").delay(200).fadeOut("slow");
                 $('#next-btn').removeAttr('disabled', 'disabled');
	               $('.alert-danger').html("<h6><i class='fas fa fa-check'></i>&nbsp Server error found - "+xhr.status + " " + xhr.statusText+" </h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>").fadeIn().delay(5000).fadeOut('slow');
	          }
        });
       
       $('#next-btn').removeAttr('disabled', 'disabled');
    }

   	function reservation_additional(){

   		pckgsStorage = new Array();
   		var getPckgs = localStorage.getItem('pckgs');
        var packages = JSON.parse(getPckgs);
       
         for(var i = 0; i < packages.length; i++){
         	pckgsStorage.push({
         		mode: packages[i].mode,
	            id: packages[i].id,
	            days: packages[i].days,
	            package: packages[i].package,
	            desc: packages[i].desc,
	            price: packages[i].price
	         });
         }

   		var token = $('#e_code').val();
     	var categid = $('#rs_id').val();

     	 $.ajax({
	            url: base+'client/crud_func/client/additional/'+categid,
	            headers: {'X-Requested-With':'XMLHttpRequest'},
	            method: 'GET',
	            async: true,
	            dataType: 'json',
	            success: function(response){
	              if(response.success){

	                var cost = response.data[0].price;
	                var addNdays = $('#rs_parent_days').val();
	                var days = $('#rs_days').val();

	                 pckgsStorage.push({
	                 	mode: 'B',
	                    id: response.data[0].sub_category_id,
	                    days: days,
	                    package: response.data[0].Category_title,
	                    desc: response.data[0].Category_desc,
	                    price: cost,
	                 });

	                localStorage.setItem('pckgs', JSON.stringify(pckgsStorage));
	                window.top.location = base+'Client/reservation_summary/'+token+'/'+addNdays;
	               }else{
	               		$('.alert-danger').html("<h6><i class='fas fa fa-times'></i>&nbsp Can't proceed please try again.</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>").fadeIn().delay(5000).fadeOut('slow');
	               }
	            },
	            error: function(xhr){
	               $('.alert-danger').html("<h6><i class='fas fa fa-check'></i>&nbsp Server error found - "+xhr.status + " " + xhr.statusText+" </h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>").fadeIn().delay(5000).fadeOut('slow');
	          }
           });
   	} 

     // rs_mode == 'accommodation' ? reserve_dates() : false;
     // const reservationdays = $('#days_reservation');

     $('#rs_date').datepicker({
          showAnim: 'fold',
          minDate: '+15d',
          maxDate: '+3m +15d',
          dateFormat: 'mm-dd-yy',
          beforeShowDay: _reservedDates
     });

     $('#rs_time').timepicker({
       timeFormat: 'H:mm',
       interval: 30,
       minTime: '08:00',
       maxTime: '18:00',
       defaultTime: '08:00',
       startTime: '08:00',
       dynamic: false,
       dropdown: true,
       scrollbar: true
     })

     $.validator.setDefaults({
        submitHandler: function () {
           $(".loader").fadeIn();
           $("#preloder").show();
           reservation_accommodation();
          // rs_mode == 'accommodation' ? reservation_accommodation() : reservation_additional();
        
         }
     });

     $('#reservation_form').validate({
       rules: {  
                rs_date: { required: true},
                rs_guest: { required: true }
              },
    messages: {
             rs_date: {
                  required: "Please enter date of reservation!"
               },
             rs_guest: {
                  required: "Please determine the total of guests!",
               },
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

     $('#additional_form').validate({
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

})(jQuery);