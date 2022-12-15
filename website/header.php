<?php
    include_once 'includes/dbh.inc.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css?v=1" type="text/css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul class="navLinks">
                <li><a href="home.php">Home</a></li>
                <li><a href="branches.php">Branches</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>




    <?php
    $sql = "SELECT * FROM posts;";
    $result = mysqli_query($conn, $sql);
    $resultChecker = mysqli_num_rows($result);


    if ($resultChecker > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row["subject"] . "<br>";
        }
    }
    
    ?>