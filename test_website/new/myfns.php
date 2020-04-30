<?php

include ("account.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors',1);

$db = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");


function auth ($email, $pass ) {
	global $db;

	$pass = sha1($pass);
	
	$s = "SELECT * FROM users WHERE email='$email' AND password='$pass' " ;
	( $t = mysqli_query($db, $s) ) or die ( mysqli_error( $db ) );

	$num = mysqli_num_rows($t) ;
	
	if ( $num > 0 ) {
		return true ;
	}
	else {
		return false ;
	} ;
};

function redirect($message, $target, $delay) {
	echo "<br>$message<br>";
        header("refresh:$delay; url=".$target);
	exit();
    

};

function gatekeeper() {
	if ( ! isset($_SESSION["logged"]) ) {
		redirect ("You must be logged in to view this page!", "login.html", "3");
 	}
};





?>
