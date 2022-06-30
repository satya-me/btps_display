<?php
include '../lib/config.php';
if ($_GET['type'] == 'delete') {

    $id = $_GET['id'];
    $sql = "DELETE FROM `user_list` WHERE `id` = '$id'";
    mysqli_query($conn2, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);

} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
