<?php
// Database Variables (edit with your own server information)
$server = 'localhost';
$user = 'urcscon3_seoul';
$pass = 'DannyAronson';
$db = 'urcscon3_seoul';

// Connect to Database
// Connect to Database
$connection = mysqli_connect($server,$user,$pass,$db);
if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>