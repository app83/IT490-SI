#!/usr/bin/php

<?php
/*
If not on our router, hostname should be 127.0.0.1
Change username/project/password to yours as well, if different. 
*/

$dbname = 'IT490';
$dbuser = 'test';
$dbpass = 'password';
$dbhost = '25.2.139.140';

$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");

?>

