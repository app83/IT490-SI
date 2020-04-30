
<?php

    function connection(){
        $hostname = "25.5.178.51"; 		
        $username = "test";   
        $project  = "IT490";  
        $password = "password";  
        
        $connection = mysqli_connect($hostname, $username, $password, $project);
        
        if (!$connection){
            echo "Error Connecting to Database: " . $connection->connect_errno.PHP_EOL;
            exit();
        }
        
        echo "Connection Established to Database" . PHP_EOL;
        return $connection;
    }

?>
