// // (function($){
// // 	'use strict'

// var base = $('#base_url').val();

// // function settings_reader(slug_name){

// // 	$.ajax({
// //       type: 'ajax',
// //       url: base+'admin/crud/read-settings/'+slug_name,
// //       headers: {'X-Requested-With':'XMLHttpRequest'},
// //       method: 'GET',
// //       cache: false,
// //       async: true,
// // 	  dataType: 'json',
// // 	  success: function(response){
// // 	  	  	return response.data;
// // 	  },
// // 	  error: function(xhr){
// // 	      //response_alerts('server-err', false, xhr.status, xhr.statusText);
// // 	    }
// // 	});
// // }

// function settings(){

// 	const url = base+'admin/crud/read-settings/re_sched';
// 	var settings;
// 	$.get(url,
// 		function(responseJSON){
// 			// settings.push({
// 			// 	'success': responseJSON.success,
// 			// 	'values': responseJSON.data
// 			// });
// 			settings = responseJSON.data;
// 		 },
// 		 'JSON'
// 	  );
//    return settings;
// 	// this.result = '';
// 	// this.day = '';
// 	//const settings = [];

// 	// var getData = $.ajax({
//  //      url: base+'admin/crud/read-settings/re_sched',
//  //      headers: {'X-Requested-With':'XMLHttpRequest'},
// 	//   dataType: 'json',
// 	//   success: function(response){
// 	//   	return this.response;
// 	  	 // settings.push({
// 	  	  	//result = response.success;
// 	  	  	//day = response.data[0].value;
	  	  	
// 			// const settings = {
// 		 //       'result':  response.success,
// 			//    'day': response.data[0].value
// 			// };

// 			// return settings[0].day;
// 	  	  //});
// 	  // },
// 	  // error: function(xhr){
// 	      //response_alerts('server-err', false, xhr.status, xhr.statusText);
// 	     //  settings.push({
// 	  	  // 	result: xhr.status,
// 	  	  // 	day: xhr.statusText
// 	  	  // });
// 	//     }
// 	// });
//  // return getData['responseJSON'];
// 	//console.log(getData)

// }

// // })(jQuery)

