<?php

include ("account.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors',1);

$db = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");


function auth ($user, $pass ) {
	global $db;
	
	$s = "SELECT * FROM users WHERE username='$user' AND password='$pass' " ;
	( $t = mysqli_query($db, $s) ) or die ( mysqli_error( $db ) );

	$num = mysqli_num_rows($t) ;
	
	if ( $num > 0 ) {
		return true ;
	}
	else {
		return false ;
	} ;
}


function register ($first_name, $last_name, $email, $username, $password, $age, $gender, $height, $weight, $zipcode) {

	global $db;

	$s = "INSERT INTO users (first_name, last_name, email, username, password, age, gender, height, weight, zipcode ) VALUES ('$first_name','$last_name','$email','$username',
'$password','$age','$gender','$height','$weight','$zipcode')";
	($t = mysqli_query( $db, $s )) or die(mysqli_error($db));

}

?>
