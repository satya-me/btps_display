<?php
include '../lib/config.php';
$sql = "SELECT * FROM `images`";

$queryResult = mysqli_query($conn2, $sql);

$json = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
echo json_encode($json);
