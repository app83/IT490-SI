#!/usr/bin/php
<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

//$connection = new AMQPStreamConnection('localhost', 5672, 'admin', 'admin');
$connection = new AMQPStreamConnection('25.5.178.51', 5672, 'admin', 'admin');
$channel = $connection->channel();

// We dont need that
//$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, 'e1', 'hello');   // ( ,exchange, routing key)

echo " [x] Sent 'Hello World!'\n";

$channel->close();
$connection->close();
?>
