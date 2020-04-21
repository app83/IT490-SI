<!--<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylecheet" href="style.css">
</head>

<body>
<div class="square">-->

<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


#POST Data	
$content = array(
	"firstName" => $_POST['fname'],
	"lastName" => $_POST['lname'],
	"email" => $_POST['email'],
	"user" => $_POST['user'],
	"pass" => $_POST['pass']
);

#encode POST data to JSON
$msgJson = json_encode($content);

#AMQP Connection
$connection = new AMQPStreamConnection('25.5.178.51', 5672, 'admin', 'admin'); //change ip address
$channel = $connection->channel();

#RabbitMQ Message data as JSON
$msg = new AMQPMessage($msgJson);

#Declare Exchange and routing key
$channel->basic_publish($msg, 'e1', 'hello');

#Echo result
#echo "Account was registered. Return to previous page to login.";
echo $response;
header("refresh: 0; url=mainpage.html");

#Close connection
$channel->close();
$connection->close();

?>
