<?php

if (isset($_POST["submit"])){

    $fName = $_POST["fullName"];
    $adminId = $_POST["adminId"];
    $adminEmail = $_POST["admin_email"];
    $adminPassword = $_POST["admin_passwrd"];
    $confirmPassword = $_POST["confrim_passwrd"];

    require_once 'adminDbh.inc.php';
    require_once 'adminFunctions.inc.php';

    // error handlers to handle signup errors the admin can face when creating their account.


    if(emptyAdminSignUp($fName, $adminId, $adminEmail, $adminPassword, $confirmPassword) !==false){
        header("location: ../adminSignup.php?error=emptyinput");
        exit();
    }

    if(invalidAdminId($adminId) !==false){
        header("location: ../adminSignup.php?error=invalidadminID");
        exit();
    }

    if(invalidAdminEmail($adminEmail) !==false){
        header("location: ../adminSignup.php?error=adminEmail");
        exit();
    }

    if(passwordMismatch($adminPassword, $confirmPassword) !==false){
        header("location: ../adminSignup.php?error=passwordMismatch");
        exit();
    }

    if(adminIdExists($dbConn, $adminEmail, $adminId) !==false){
        header("location: ../adminSignup.php?error=adminalreadyexists");
        exit();
    }

    createAdmin($dbConn, $fName, $adminId, $adminEmail, $adminPassword);

} else {
    header("location: ../adminSignup.php");
}
