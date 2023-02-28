<?php

ini_set ('display_errors', 'on');
ini_set ('log_errors', 'on');
ini_set ('display_startup_errors', 'on');
ini_set ('error_reporting', E_ALL);

// $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);

// include "$rootDir/logIn.inc.php";

    if (isset($_POST["login_button"])){
    // if (1){
        $user_email = $_POST["stud_email"];
        $password = $_POST["login_password"];

        // echo "studId";



      include 'dbh.inc.php';
      include 'functions.inc.php';



        loginUser($conn, $user_email, $password);
    } else {
        header("location: ../login.php");
        exit();
    }


