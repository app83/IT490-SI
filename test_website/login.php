#!/usr/bin/php

<?php
include ( "account.php" );
include ( "myfns.php" ) ;


$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
#echo "Successfully Connected";
mysqli_select_db($db, $dbname);


$user = $_GET["user"];
$pass = $_GET["pass"];


if ( ! auth ( $user, $pass ) ) {
	header("Location: login.html");
	exit (); 
} 
else {
	global $db;
	$s = "SELECT * FROM accounts WHERE user = '$user' AND pass = '$pass'";
	$t = mysqli_query($db, $s) or die(mysqli_error());
	$r = mysqli_fetch_array($t,MYSQLI_ASSOC);
	#echo "Successful Login.";
	header("refresh: 1; url=mainpage.html");

};
?>

