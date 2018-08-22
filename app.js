$(document).ready(function(){



let $register = $('#register');
let err = $('<div>', {class: 'err'}).text('u are not doing it right... try again');

// switch login/register fields visibility 
(function(){
let active = true;
$('.switch').on('click', function(){
	if(active){
		$('#login').css('display', 'none');
		$register.css('display', 'block');
	}else{
		$('#login').css('display', 'block');
		$register.css('display', 'none');
		if($register.css('display', 'none')) {
			$('.forms input').val('');
		}
	}
	active = !active;
})
})();





//validate email with regex
 function validateEmail(email) {
  var emailReturn = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReturn.test(email);
}

//check if mail fields are properly field up
function checkMail(email1, email2){
	if((email1 === '' || email2 === '') || !checkIfEqual(email1, email2) || !validateEmail(email1)) {
		return false;
	}else {
		return true;
	}
}

//check if password(s) contains proper length and number inside
function checkPassString(input1, input2){
	if(input1.length > 6 && checkIfEqual(input1, input2)){
		for(let i = 0; i < input1.length; i++){
			if(!isNaN(parseInt(input1[i]))) {
				return true;
				break;
			}
		}
	}
	return false;
}

//check uname length
function checkUname(input){
	if(input.length < 6 || input.length > 20) return false;
	return true;
}

//check if pass and email are equal with their confirmation
function checkIfEqual(input1, input2){
	if(input1 !== input2){
		return false;
	}
	return true;
}





// validate register form on click
$("#regButton").on('click', function(e){
	if(		!checkMail($('#email').val(), $('#emailConfirm').val()) ||
			!checkPassString($('#pass').val(), $('#passConfirm').val()) ||
			!checkUname($('#uname').val())
		){
		e.preventDefault();
		$register.append(err);
	}
});

//reveal password in input field on mousehold
$('.reveal').on('mousedown', function(){
	$(this).parent()
	.find('input[name="pass"], input[name="passConfirm"]')
	.attr('type', 'text');
	$(this).text('hide');
}).on('mouseup', function(){
	$(this).parent()
	.find('input[name="pass"], input[name="passConfirm"]')
	.attr('type', 'password');
	$(this).text('reveal');
});

// login form  check
$('#loginButton').on('click', function(e){
	if( !checkUname($('#logUname').val()) ||
		!checkPassString($('#logPass').val(), $('#logPass').val())
		){
		e.preventDefault();
		$login.append(err);
	}
});









})
