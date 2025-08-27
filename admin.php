<?php
$admin_password = "raza123"; // Change this password

if (!isset($_GET['pass']) || $_GET['pass'] !== $admin_password) {
    echo "Access Denied. Use ?pass=yourpassword in the URL.";
    exit;
}

$logs = file("logs.txt");
echo "<h2>Visitor Log Viewer with Maps</h2>";
echo "<table border='1' cellpadding='5'><tr><th>Time</th><th>IP</th><th>User Agent</th><th>City</th><th>Region</th><th>Country</th><th>Map</th></tr>";

foreach ($logs as $line) {
    $parts = explode(" | ", trim($line));
    if (count($parts) >= 7) {
        list($time, $ip, $agent, $city, $region, $country, $latlng) = $parts;
        $mapLink = "https://www.google.com/maps?q=$latlng";
        echo "<tr><td>$time</td><td>$ip</td><td style='max-width:300px'>$agent</td><td>$city</td><td>$region</td><td>$country</td><td><a href='$mapLink' target='_blank'>View</a></td></tr>";
    }
}
echo "</table>";
?>