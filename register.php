<?php 
include 'functions.php';
include 'db.php';

if( isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['passConfirm']) && 
	isset($_POST['email']) && isset($_POST['confirmEmail']) ){

	$uname = secureInput($_POST['uname']);
	$pass1 = secureInput($_POST['pass']);
	$pass2 = secureInput($_POST['passConfirm']);
	$email1 = secureInput($_POST['email']);
	$email2 = secureInput($_POST['confirmEmail']);

}

if( checkEmail($email1, $email2) && passCheck($pass1, $pass2) !== false && checkUname($uname) ){
	if(insert($uname, $email1, $pass1, $conn)){
		echo "<div class='phpErr'>You are registered now. Login to continue!</div>";
		include 'index.html';
	}
}else{
	echo 'Something went wrong, please try again later!';
}