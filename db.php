<?php 


$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'account_storage';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$conn){
		die('Something is  wrong with db connection!!! ' . mysqli_connect_error());
	}




