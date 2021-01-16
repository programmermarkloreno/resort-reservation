function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
  	// display false if regex is not present
     return false;
  }else{
  	// display true if regex it is present
     return true;
  }
}

function IsNumber(num) {
  var regex = /([_])/;
  if(!regex.test(num)) {
  	// display false if regex is not present
     return false;
  }else{
  	// display true if regex it is present
     return true;
  }
}

