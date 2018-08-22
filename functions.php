<?php 


/* FORM HANDLING */


// secure form inputs
function secureInput($input){
	$input = trim($input);
	$input = stripcslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

// check match
function checkMatch($input1, $input2){
	return ($input1 === $input2) ? true : false;
}

// check username length
function checkUname($uname){
	$uname_len = strlen($uname);
	return ($uname_len >= 6 || $uname_len < 20) ? true : false;
}

// validate and check email
function checkEmail($email1, $email2){
	$email1 = filter_var($email1, FILTER_SANITIZE_EMAIL);
	$email2 = filter_var($email2, FILTER_SANITIZE_EMAIL);
	return (checkMatch($email1, $email2)) ? true : false;
}

// password checking
function passCheck($pass1, $pass2){
	if(checkMatch($pass1, $pass2) && strlen($pass1) >= 6){
		$pass = password_hash($pass1, PASSWORD_DEFAULT);
		return $pass;
	}else{

		return false;
	}
}




/* USER DATABASE COMUNICATION */

// register user into database
function insert($uname, $email, $pass, $conn){
	$uname = mysqli_real_escape_string($conn, $uname);
	$email = mysqli_real_escape_string($conn, $email);
	$pass = mysqli_real_escape_string($conn, $pass);

	$selectCheckQuery = "SELECT * FROM users WHERE uname = '$uname'";
	$resSelect = mysqli_query($conn, $selectCheckQuery);

	if(mysqli_num_rows($resSelect) != 0){
		echo "<div class='phpErr'>Error. That username allready exists! Try again!</div>";
		include 'index.html';
		return false;
	}else{
		$insertQuery = "INSERT INTO users (uname, email, password) VALUES ('$uname', '$email', '$pass')";
		if(mysqli_query($conn, $insertQuery)){
			return true;
		}else{
			echo "<div class='phpErr'>Something went wrong with inserting you into database. Try again later.</div>";
			include 'index.html';
			return false;
		}
	}

}

// user login 
function login($uname, $pass, $conn){
	$uname = mysqli_real_escape_string($conn, $uname);
	$pass = mysqli_real_escape_string($conn, $pass);

	$query = "SELECT * FROM users WHERE uname='$uname' AND password='$pass'";
	$res = mysqli_query($conn, $query);

	if(mysqli_num_rows($res) == 1){
		return true;
	}else{
		echo "<div class='phpErr'>Incorrect username or password!</div>";
		include 'index.html';
		return false;
	}
}




