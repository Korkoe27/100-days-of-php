<?php
//this line ini set codes display errors ecountered in this script. they are ignored if there are no errors
 ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);



if (isset($_POST["submit"])){
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $midName = $_POST["otherName"];
    $indexNum = $_POST["studentId"];
    $program = $_POST["programOfStudy"];
    $telephone = $_POST["phoneNumber"];
    $gender = $_POST["user_gender"];
    $user_email = $_POST["student_email"];
    $dob = $_POST["dateOfBirth"];
    $first_password = $_POST["create_passwrd"];
    $second_password = $_POST["confirm_passwrd"];



    include 'dbh.inc.php';
    include 'functions.inc.php';

    if (emptyInputSignUp($fName, $lName, $indexNum, $program, $gender, $user_email, $dob, $first_password, $second_password) !==false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($user_email) !==false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (invalidStudId($indexNum) !==false) {
        header("location: ../signup.php?error=invalidStudId");
        exit();
    }
    if (passwordMatch($first_password, $second_password) !==false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (userAlreadyExists($conn, $indexNum, $user_email) !==false) {
        header("location: ../signup.php?error=useralreadyexists");
        exit();
    }
    if (passwordStrength($first_password) !==false) {
        header("location: ../signup.php?error=weakpasssword");
        exit();
    }

    createUser($conn, $fName, $lName, $midName, $indexNum, $program, $telephone, $gender, $user_email, $dob, $first_password);

} else {
    header("location: ../signup.php");
    exit();
}
