function playSoundSuccess(file,sound,ismute){

	if(ismute==1){
		var file_loc = '';

		if(sound=='1'){
		     file_loc = file+"assets/client-side/sound/done-for-you.ogg";	
		}
		if(sound=='2'){
		     file_loc = file+"assets/client-side/sound/got-it-done.ogg";
		}
		if(sound=='3'){
		     file_loc = file+"assets/client-side/sound/hasty-ba-dum-tss.ogg";
		}
		if(sound=='4'){
		     file_loc = file+"assets/client-side/sound/juntos.ogg";	
		}
		if(sound=='5'){
		     file_loc= file+"assets/client-side/sound/pristine.ogg";
		}
		if(sound=='6'){
		     file_loc = file+"assets/client-side/sound/that-was-quick.ogg";	
		}
		if(sound=='7'){
		     file_loc = file+"assets/client-side/sound/system-fault.ogg";	
		}
		var oggSource = '<source src="'+file_loc+'" type="audio/ogg">';
		document.getElementById("sound").innerHTML='<audio autoplay="autoplay">' + oggSource + '</audio>';
	}
	
}
