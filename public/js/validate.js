function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function checkEmail(tmp){
	var email = $(tmp).val();
	if(isEmail(email)){
		$(tmp).next().hide();
	}else{
		$(tmp).next().show();	
	}
}

function checkSameEmail(tmp){
	var email = $(tmp).val();
	if(isEmail(email)){
		if($('#email').val() != email){
			$(tmp).next().next().show();		
		}else{
			$(tmp).next().next().hide();	
		}
	}
}