<?php

    function connection(){
        $hostname = ""; 		
        $username = "";   
        $project  = "";  
        $password = "";  
        
        $connection = mysqli_connect($hostname, $username, $password, $project);
        
        if (!$connection){
            echo "Error Connecting to Database: " . $connection->connect_errno.PHP_EOL;
            exit();
        }
        
        echo "Connection Established to Database" . PHP_EOL;
        return $connection;
    }

?>
