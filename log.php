<?php
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$time = date("Y-m-d H:i:s");
$locationData = json_decode(file_get_contents("https://ipapi.co/{$ip}/json"));

$city = $locationData->city ?? 'Unknown';
$region = $locationData->region ?? 'Unknown';
$country = $locationData->country_name ?? 'Unknown';
$latitude = $locationData->latitude ?? '0';
$longitude = $locationData->longitude ?? '0';

$log = "$time | $ip | $agent | $city | $region | $country | $latitude,$longitude\n";
file_put_contents("logs.txt", $log, FILE_APPEND);

// Send email
$to = "qadrikhan1030@gmail.com";  // <--- Change this to your email
$subject = "New Visitor Logged";
$message = $log;
$headers = "From: logger@yourdomain.com";

mail($to, $subject, $message, $headers);
?>