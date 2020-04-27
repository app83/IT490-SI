#!/usr/bin/php
<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('25.5.178.51', 5672, 'admin', 'admin');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";
};


$channel->basic_consume('q1', 'e1', false, true, false, false, $callback);


while ($channel->is_consuming()) {
    $channel->wait();
}


$ar = array($msg);


$channel->close();
$connection->close();
?>
