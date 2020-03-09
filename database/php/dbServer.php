#!/usr/bin/php
<?php

    require_once('../path.inc');

    require_once('../get_host_info.inc');

    require_once('../rabbitMQLib.inc');

    //require_once('../rabbitMQClient.php');

    include('connections.php');

    

    //Error logging

    //error_reporting(E_ALL);           //comment it as ofright now

    

    //ini_set('display_errors', 'On');               //Comment it out as of right now

    //ini_set('log_errors', 'On');                   //Comment it out as of right now

    //ini_set('error_log', dirname(__FILE__). '/../logging/log.txt');            //Comment it out as of right now



    function auth ($user, $pass ) {
	global $db;
	
	$s = "SELECT * FROM accounts WHERE user='$user' AND pass='$pass' " ;
	( $t = mysqli_query($db, $s) ) or die ( mysqli_error( $db ) );

	$num = mysqli_num_rows($t) ;
	
	if ( $num > 0 ) {
		return true ;
	}
	else {
		return false ;
	} ;
    }

    function login($email, $password){

        $connection = connection();

        $password_hash = md5($password);

        $s = "select * from users where email='$email' and password='$password_hash'";

        $result = mysqli_query($connection, $s) OR die(mysqli_error());

        $num = mysqli_num_rows($result);

        if ($num > 0){

            $userEmail = $_SESSION["email"] = $email;

            //header('location: ../php/homepage.php');

            echo "Login successful: return value ";

            return true;

        } else {

            //header('location: ../php/login.php');

            echo "Login failed";

            return false;

        }

    }

    // This function registers a new user 

    function register($flname, $email, $password, $heightInInches, $weightInPound){

        //Makes connection to database

        $connection = connection();

        //Hashes password

        $password_hash = md5($password);

        

        $UserBMI = (703 * ($weightInPound / pow($heightInInches, 2)));

        

        //Query for a new user

        $newuser_query = "INSERT INTO users (flname, email, password, heightInInches, weightInPound, UserBMI) VALUES ('$flname', '$email', '$password_hash', '$heightInInches', '$weightInPound', '$UserBMI')";

        

        $resultInsert = mysqli_query($connection, $newuser_query) OR die(mysqli_error());

        //$numResult = mysqli_num_rows($resultInsert);

        

        if ($resultInsert == 1){

            $userEmail = $_SESSION["email"] = $email;

            return true;

        } else {

            return false;

        }

        

    }

    // This function checks if email is valid
    
    
    //Comment this function checkEmail as of right now.
    /*

    function checkEmail($email){

        $connection = connection();

        

        //Query to check if the email is email

        $check_email = "SELECT * FROM users WHERE email = '$email'";

        $check_result = $connection->query($check_email);

        

        if($check_result){

            if($check_result->num_rows == 0){

                return true;

            } elseif($check_result->num_rows == 1){

                return false;

            }

        }

    }
    
    */



    function UserBMI($email){

        $connection = connection();

        

        //Query to get the BMI info

        $check_BMI = "SELECT UserBMI FROM users WHERE email = '$email'";

        $check_result = $connection->query($check_BMI);

        

        echo $check_BMI . " ";

        $obj = $check_result->fetch_assoc();

           

        $BMI = $obj["UserBMI"];

        return $BMI;

            

            

    }


// Comment this whole function as of right now. 
/*
    function allergy($email, $egg, $soy, $milk, $peanuts, $shellfish, $wheat, $gluten, $treenut, $fish)

    {

        //Makes connection to database

        $connection = connection();

    

        

        //Query for a new user

        $newuser_query = "INSERT INTO allergy

                            (

                                `Email`,

                                `Egg`,

                                `Soy`,

                                `Milk`,

                                `Peanuts`,

                                `Shellfish`,

                                `Wheat`,

                                `Gluten`,

                                `Treenut`,

                                `Fish`

                            )

                            VALUES('$email','$egg','$soy','$milk','$peanuts','$shellfish','$wheat','$gluten','$treenut','$fish')";

        

        $resultInsert = mysqli_query($connection, $newuser_query) OR die(mysqli_error());

        //$numResult = mysqli_num_rows($resultInsert);

        

        if ($resultInsert == 1){

            $userEmail = $_SESSION["email"] = $email;

            return true;

        } else {

            return false;

        }

        

    }
    
    */



?>
