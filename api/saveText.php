<?php
include '../lib/config.php';

// print_r($_POST);

if (isset($_POST['text'])) {
    $H = base64_encode($_POST['text']);

    Update($H, $conn2);
} else {
    echo "Error: Field mandatory";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function Update($H, $conn2)
{
    $sql = "UPDATE `simple_txt` SET `text_body`='$H' WHERE 1";
    if (mysqli_query($conn2, $sql)) {
        echo "Record updated successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error updating record: " . mysqli_error($conn2);
    }

    mysqli_close($conn2);
}
