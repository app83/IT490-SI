<?php
include ( "account.php" );
include ( "myfns.php" ) ;


$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
echo "Successfully Connected";
mysqli_select_db($db, $dbname);

$first_name = $_GET["first_name"];
$last_name = $_GET["last_name"];
$email = $_GET["email"];
$username = $_GET["username"];
$password = $_GET["password"];
$age = $_GET["age"];
$gender = $_GET["gender"];
$height = $_GET["height"];
$weight = $_GET["weight"];
$zipcode = $_GET["zipcode"];



register(
$first_name, $last_name, $email, $username, $password, $age, $gender, $height, $weight, $zipcode);

?>

