#!/usr/bin/php
<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;


$connection = new AMQPStreamConnection('25.143.171.73', 5672, 'admin', 'admin');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";



$callback = function ($msg) {
    
    //Database Connection
	$dbname = 'IT490A';
	$dbuser = 'test1';
	$dbpass = 'password';
	$dbhost = '25.5.139.140';

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
	mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");


    echo ' [x] Message Received ', $msg->body, "\n";
    
    //Converts msg to string & decodes
    $aMsg = $msg->body;
    $newMsg = "[{$aMsg}]";
    $arr = json_decode($newMsg, true);

    //Stores information into vars
    $name = $arr[0]["name"];
    $email = $arr[0]["email"];
    $pass = $arr[0]["pass"];
    $type = $arr[0]["type"];

    //Prints separated vars
    echo 'name: ',$name, "\n";
    echo 'email: ',$email, "\n";
    echo 'pass: ',$pass, "\n";
    echo 'type: ',$type, "\n";

    $pass = sha1($pass);	
	
    //Insert account into users table
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name','$email','$pass')";
    ($t = mysqli_query( $connect, $sql )) or die(mysqli_error($connect));
};



$channel->basic_consume('q1', 'e1', false, true, false, false, $callback);


while ($channel->is_consuming()) {
    $channel->wait();
}


$ar = array($msg);



$channel->close();
$connection->close();
?>

while ($channel->is_consuming()) {
    $channel->wait();
}

$ar = array($msg);


$channel->close();
$connection->close();
?>
