<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "gasstation";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Your connection has fail");
}
