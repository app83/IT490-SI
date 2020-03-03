<?php
$results = shell_exec('GET http://api.football-data.org/alpha/soccerseasons/354');
$arrayCode = json_decode($results);
var_dump($arrayCode);
?>
© 2020 GitHub, Inc.
