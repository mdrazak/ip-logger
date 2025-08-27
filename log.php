<?php
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$time = date("Y-m-d H:i:s");
$location = file_get_contents("https://ipapi.co/{$ip}/json");

$log = "Time: $time\nIP: $ip\nUser Agent: $agent\nLocation: $location\n------------------\n";
file_put_contents("logs.txt", $log, FILE_APPEND);

// Email alert
$to = "qadrikhan1030@gmail.com"; // <-- CHANGE THIS TO YOUR EMAIL
$subject = "New Visitor Logged";
$headers = "From: logger@yourdomain.com";
mail($to, $subject, $log, $headers);
?>