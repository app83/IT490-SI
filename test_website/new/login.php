<?php
session_set_cookie_params(0,"/web/");
session_start();


include ( "account.php" );
include ( "myfns.php" ) ;
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
#echo "Successfully Connected";
mysqli_select_db($db, $dbname);


$email = $_GET["email"];
$pass = $_GET["pass"];


if ( ! auth ( $email, $pass ) ) {
	header("Location: login.html");
	exit (); 
} 
else {
	global $db;
	$s = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
	$t = mysqli_query($db, $s) or die(mysqli_error());
	$r = mysqli_fetch_array($t,MYSQLI_ASSOC);
 
	$_SESSION["logged"] = true;
	$_SESSION["email"] = $email;
	#echo "Successful Login.";
	redirect("Login Successful. Please wait... redirecting","mainpage.php","0");
        //header("refresh: 0; url=mainpage.html");

};
?>

