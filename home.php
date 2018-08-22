<?php 

include 'db.php';
include 'functions.php';

if(isset($_POST['uname']) && isset($_POST['pass'])){
	$uname = secureInput($_POST['uname']);
	$pass = secureInput($_POST['pass']);

	if(login($uname, $pass, $conn)){
		session_start();
		$_SESSION['logged_user'] = $uname;
		$uname = $_SESSION['logged_user'];
		echo "Hello <b>$uname</b>! <br>";
		echo 'You are now logged in! <br>';
		echo "You can <a href='logout.php'>logout here</a>...";
	}

}else {
	echo "<div style='text-align: center; color:white; background: black; font-size:2.4em; margin-top: 150px; padding: 30px;'>";
	echo "THIS IS RESTRICTED AREA! <br>";
	echo "Here, we developing Yugoslavian nuke program! <br>";
	echo "<img style='width:400px; margin:0 auto;' src='https://bit.ly/2Na4B01' ><br>";
	echo "<a href='index.html'>Get out!</a><br>";
	echo "</div>";
}




