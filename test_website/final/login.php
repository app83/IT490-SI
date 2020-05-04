<?php
session_set_cookie_params(0,"/");
session_start();


include ( "account.php" );
include ( "myfns.php" ) ;

//Establish Database Connection
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
mysqli_select_db($db, $dbname);



//Get Email & Pass from Login Form
$email = $_GET["email"];
$pass = $_GET["pass"];


if ( ! auth ( $email, $pass ) ) {
	//authentication fails, redirect to login page
	header("Location: login.html");
	exit (); 
} 
else {
	//authentication successful
	global $db;
	$s = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
	$t = mysqli_query($db, $s) or die(mysqli_error());
	$r = mysqli_fetch_array($t,MYSQLI_ASSOC);
 
	$_SESSION["logged"] = true;
	$_SESSION["email"] = $email;
	
	//redirects to API page
	redirect("Login Successful. Please wait... redirecting","nutritionapi.php","0");
        

};
?>

