function isEmail(email) {
	 if(email == "") return false;
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
		if($('#email1').val() != email){
			$(tmp).next().next().show();		
		}else{
			$(tmp).next().next().hide();	
		}
	}
}

function isSameEmail(e1, e2){
	 return e1 == e2;
}

function isPhone(phone){
	 /*var regex = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
	 return regex.test(phone);*/
	 if(phone == "") return false;
	 return (phone.match(/\d/g).length===10 || phone.match(/\d/g).length===11);
}

function checkPhone(tmp){
	var phone = $(tmp).val();
	if(isPhone(phone)){
		$(tmp).next().hide();
	}else{
		$(tmp).next().show();	
	}
}

function isText (arg) {
	return arg != "";
}

function checkText (tmp) {
	var arg = $(tmp).val();
	if(isText(arg)){
		$(tmp).next().hide();
	}else{
		$(tmp).next().show();	
	}
}

function hasCheckin(tmp){
	var arg = $(tmp).val();
	if(isText(arg)){
		$(tmp).parent().next().hide();
	}else{
		$(tmp).parent().next().show();	
	}
}
function hasCheckout(tmp){
	var arg = $(tmp).val();
	if(isText(arg)){
		$(tmp).parent().next().hide();
	}else{
		$(tmp).parent().next().show();	
	}
}
