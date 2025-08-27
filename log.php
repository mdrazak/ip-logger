<?php
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$time = date("Y-m-d H:i:s");

$log = "Time: $time\nIP: $ip\nUser Agent: $agent\n------------------\n";

file_put_contents("logs.txt", $log, FILE_APPEND);
?>