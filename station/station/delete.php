<?php
include '../includes/db.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `pumpe` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location:../station.php');
    } else {
        die(mysqli_error($conn));
    }
}
