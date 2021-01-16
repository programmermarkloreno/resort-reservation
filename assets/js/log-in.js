$(document).ready(function(){
	$('#login-form').on('submit', function(e){
		e.preventDefault();
		window.top.location = 'http://localhost/Hoyoland/admin/home/index';
	});
	// $("#homepage_banner").css("height","calc(100vh - "+header+"px)");
	// var boxheight = $("#homepage_form").height() - (header/2);
 //    var topmargin = ($("#homepage_banner").height()/2)-boxheight;
 //    if(topmargin > 0){
	//     $('#homepage_form').css({ 
	//         "margin-top" : topmargin
	//     });
	// }else
	// 	$("#homepage_banner").css("height","100%");
});