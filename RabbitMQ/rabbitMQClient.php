#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

    //  creates rabbitMq client instance for Database server
    function createClientForDb($request){
        $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");
        
        if(isset($argv[1])){
            $msg = $argv[1];
            
        } else{
            $msg = "client";
        }
        
        $response = $client->send_request($request);
        
        return $response;
    }
    
?>
