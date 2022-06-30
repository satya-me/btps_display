<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {
    // should do a check here to match $_SERVER['HTTP_ORIGIN'] to a
    // whitelist of safe domains
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

}


$servername = "localhost";
 $username = "";
 $password = "";
 $dbname = "btpsStand";

$conn = mysqli_connect("localhost", "root", "", "btpsStand");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$res = $conn->query('SELECT * FROM header ');
// $headerInfo = $res->fetch_all(MYSQLI_ASSOC);
// echo $headerInfo[0];
// while ($headerInfo = $res->fetch_assoc()) {
//     print_r($headerInfo['headerText']);
// }
// echo json_encode($headerInfo);
?>