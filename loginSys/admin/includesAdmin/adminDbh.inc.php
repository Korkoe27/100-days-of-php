<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginSys";

$dbConn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);


if(!$dbConn) {
    die("Connection Failed: " . mysqli_connect_error());
}