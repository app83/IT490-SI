
<?php


include ( "accounts.php" );
include ( "myfns.php" ) ;
-------------------------------

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);
-------------------------------
Connect to Database

$db = mysqli_connect($hostname, $username, $password, $project);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}
mysqli_select_db( $db, $project );

$user = $_GET["user"];
$pass = $_GET["pass"];

/ Authenticate User Information and redirect appropriately /
if ( ! authenticate ( $user, $pass ) ) {
redirect ( "<br /><center><h1>You have entered invalid login information. Please try again. <br />Redirecting...</h1></center>", "login.html", "$delay" ) ;
}
else {
global $db;
$s = "select * from A where user = '$user' and pass = '$pass'";
$t = mysqli_query($db,$s) or die(mysqli_error());
$r = mysqli_fetch_array($t,MYSQLI_ASSOC);


redirect ( "<br /><center><h1>You have successfully logged in." ) ;

}

?>

