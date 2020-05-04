<?php

$dbname = 'IT490A';
$dbuser = 'test1';
$dbpass = 'password';
$dbhost = '25.5.139.140';

$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");

?>

