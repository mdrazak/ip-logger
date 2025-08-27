<?php
echo "<h2>Visitor Log Viewer</h2>";
echo "<pre>" . htmlspecialchars(file_get_contents("logs.txt")) . "</pre>";
?>