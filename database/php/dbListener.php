<?php



    require_once('/path.inc');

    require_once('/get_host_info.inc');

    require_once('/rabbitMQLib.inc'); 



    include('dbServer.php');

    

    //Error logging

    error_reporting(E_ALL);

    

   // ini_set('display_errors', 'On');         //Comment it as of right now

   // ini_set('log_errors', 'On');             //Comment it as of right now

   // ini_set('error_log', dirname(__FILE__). '/../logging/log.txt');       //Comment it as of right now.

    

    function requestProcessor($request)

    {

//        echo "received request".PHP_EOL;

//        echo "<br> type = " . $request['type'];

//        echo "<br> email = " . $request["email"];

//        echo "<br> pass = " . md5($request["pass"]);

        //var_dump($request);

        



      if(!isset($request['type']))

      {

        return "ERROR: unsupported message type";

      }

        

      switch ($request['type'])

      {

          case "login":

              echo "Login Case";

              $response = login($request['email'],$request['pass']);

              break;

          

          case "register":

              echo "Register Case";

              $response = register($request['flname'],$request['email'],$request['pass'], $request['heightInInches'], $request['weightInPound']);

              break;

              

          case "UserBMI":         //Comment the case as of right now

              echo "BMI Case";

              $response = UserBMI($request['email']);

              break;

          

          case "allergy":        //Comment the case of right now 

              echo "alergy Case";

              $response = allergy($request['email'], $request['A1'],$request['A2'],$request['A3'],$request['A4'],$request['A5'],$request['A6'],$request['A7'],$request['A8'],$request['A9']);

              break;

      }

        echo $response;

        return $response;

    }



    $server = new rabbitMQServer("../RabbitMQ/testRabbitMQ.ini","testServer");



    //echo "testRabbitMQServer BEGIN".PHP_EOL;

    $server->process_requests('requestProcessor');

    //exit();

?>
