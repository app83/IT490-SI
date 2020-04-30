<?php
session_set_cookie_params(0,"/web/");
session_start();

include ("account.php");
include ("myfns.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors',1);

$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
mysqli_select_db($db, $dbname);

gatekeeper();

$email = $_SESSION['email'];

?>


  <head>
    <meta charset="UTF-8">
    <title> Home Page </title>
    <link rel= "stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class= "main">
      <nav>
        <div class= "logo">
          <img src= "logo.png" alt="" width="200" height="100">
        </div>
        <ul class= "nav-bar">
          <li><a href="mainpage.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact Us</a></li>
          <li><a href="login.html">Login</a></li>
        </ul>
      </nav>
    </div>
    <div class="bg-image"> </div> 
    <div class="bg-text">
      Main Page
    </div>
  </body>

