<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "btpsStand";


date_default_timezone_set('Asia/Kolkata');
try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);
    // // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn2 = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
    // echo "Connected successfully";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
}

