<?php
include '../lib/config.php';

// print_r($_POST);

if (isset($_POST['heading']) && $_POST['sub_heading']) {
    $H = base64_encode($_POST['heading']);
    $S = base64_encode($_POST['sub_heading']);

    Update($H, $S, $conn2);
} else {
    echo "Error: Field mandatory";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function Update($H, $S, $conn2)
{
    $sql = "UPDATE `header` SET `headerText`='$H',`belowHeaderText`='$S' WHERE 1";
    if (mysqli_query($conn2, $sql)) {
        echo "Record updated successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error updating record: " . mysqli_error($conn2);
    }

    mysqli_close($conn2);
}
