<?php
include '../lib/config.php';

// print_r($_POST);
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["inputGroupFile01"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["inputGroupFile01"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// Check file size
// if ($_FILES["inputGroupFile01"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["inputGroupFile01"]["tmp_name"], $target_file)) {
        Update($target_file, $conn2);
        echo "The file " . htmlspecialchars(basename($_FILES["inputGroupFile01"]["name"])) . " has been uploaded." . $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

function Update($H, $conn2)
{
    $sql = "UPDATE `images` SET `file_path`='$H' WHERE 1";
    if (mysqli_query($conn2, $sql)) {
        echo "Record updated successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error updating record: " . mysqli_error($conn2);
    }

    mysqli_close($conn2);
}
