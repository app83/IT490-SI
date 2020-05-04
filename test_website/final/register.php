<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


#POST Data	
$content = array(
	"name" => $_POST['name'],
	"email" => $_POST['email'],
	"pass" => $_POST['pass'],
	"type" => "register"
);

#encode POST data to JSON
$msgJson = json_encode($content);

#AMQP Connection
$connection = new AMQPStreamConnection('25.143.171.73', 5672, 'admin', 'admin'); //change ip address
$channel = $connection->channel();

#RabbitMQ Message data as JSON
$msg = new AMQPMessage($msgJson);

#Declare Exchange and routing key
$channel->basic_publish($msg, 'e1', 'hello');

#Echo result
#echo "Account was registered. Return to previous page to login.";
echo $response;
header("refresh: 0; url=login.html");

#Close connection
$channel->close();
$connection->close();

?>
