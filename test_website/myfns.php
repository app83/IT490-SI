<?php
#[AUTH FUNCTION] - Check for correct User and Pass
function authenticate ( $user, $pass, $db ) {
    global $db ;
    global $t;

    $s = "SELECT * FROM accounts WHERE user='$user' AND pass='$pass' " ;
    echo "<br>SQL statement is $s<br />" ;
    
    ( $t = mysqli_query($db, $s) ) or die ( mysqli_error( $db ) );

    
    $num = mysqli_num_rows($t) ;
    echo "There was $num row retrieved.<br /><br />" ;    
    
    if ( $num > 0 ) { 
        return true ; 
    } 
    else {
        return false ;
    } ;   
}

function redirect($message, $target) {
	echo "<br?$message<br>";
	header( "refresh:3; url=".$target);
	exit();
}

?>
