<?php
include '../lib/config.php';

// print_r($_POST);

if (isset($_POST['name']) && isset($_POST['designation']) && isset($_POST['room_no'])) {
    $loop = $_POST['loop'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $room_no = $_POST['room_no'];

    Update($loop, $name, $designation, $room_no, $conn2);
} else {
    echo "Error: Field mandatory";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function Update($loop, $name, $designation, $room_no, $conn2)
{
    for ($i = 0; $i < count($loop); $i++) {
        # code...
        $sql = "INSERT INTO `user_list`(`name`, `designation`, `room_no`)
            VALUES ('$name[$i]','$designation[$i]','$room_no[$i]')";

        mysqli_query($conn2, $sql);
    }

    // print_r($name);
    // echo "<br>";
    // print_r($designation);
    // echo "<br>";
    // print_r($room_no);
    // if (mysqli_query($conn2, $sql)) {
    //     echo "Record updated successfully";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    // } else {
    //     echo "Error updating record: " . mysqli_error($conn2);
    // }

    // mysqli_close($conn2);
}
