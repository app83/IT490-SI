<?php

    require_once('../RabbitMQ/path.inc');
    require_once('../RabbitMQ/get_host_info.inc');
    require_once('../RabbitMQ/rabbitMQLib.inc');

    //  creates rabbitMq client instance for Database server
    function createClientForDb($request){
        $client = new rabbitMQClient("../RabbitMQ/testRabbitMQ.ini", "testServer");
        
        if(isset($argv[1])){
            $msg = $argv[1];
            
        } else{
            $msg = "client";
        }
        
        $response = $client->send_request($request);
        
        return $response;
    }
    
?>
