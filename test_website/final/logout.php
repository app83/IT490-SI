<?php

session_set_cookie_params(0,"/");
include ("myfns.php");

session_start();
session_destroy();
redirect("Successfully logged out. Redirecting...","login.html","1");
exit;
?>
