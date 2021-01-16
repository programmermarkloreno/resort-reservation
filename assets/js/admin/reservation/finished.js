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


   loadrequests();

  function loadrequests(){

    	$.ajax({
    		type: 'ajax',
          url: base+'admin/crud/reservation/read/finished',
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          async: true,
	        dataType: 'json',
	        success: function(response){
              if(response.success){
                var badge = '';
              	var html = '';
    		        var i;
    		        for(i=0; i<response.data.length; i++){

                         var percent = response.data[i].Totalbill * .50;
                         var paid = response.data[i].Totalbill - response.data[i].Balance;
                          paid >= percent ? badge = 'badge-success': badge = 'badge-danger';

    	                  html += '<tr>'+
    	           				'<td><center>'+response.data[i].CustomerId+'</td></center>'+
                        '<td><center>'+response.data[i].RCode+'</td></center>'+
                        '<td><center>'+response.data[i].LastName+'</td></center>'+
                        '<td><center>'+response.data[i].FirstName+'</td></center>'+
                        '<td><center>'+response.data[i].Mobile+'</td></center>'+
                        '<td><center>'+response.data[i].CheckIn+'</td></center>'+
                        '<td><center>'+response.data[i].RType+'</td></center>'+
    	           				'<td class="project-actions text-right"><center>'+
                        '<a href="'+base+'home/reservation/view-info/'+response.data[i].CustomerId+'" class="btn btn-info"><i class="fa fa-search"></i></a>'+
    	             			'</td></center>'+
    	           			'</tr>';
    			          }
    			         $('#table').html(html);
                  }else{
                     // $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp No finished reservation found!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
                     $('#tbl-caption').text("No finished reservation found.");
                  }
                },
                error: function(xhr){
                  $('.alert-danger').html("<h4><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h4><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
                }
            });
		 }
})(jQuery)