<?php



if (isset($_POST["submit"])){
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $midName = $_POST["otherName"];
    $indexNum = $_POST["studentId"];
    $program = $_POST["programOfStudy"];
    $gender = $_POST["user_gender"];
    $user_email = $_POST["student_email"];
    $dob = $_POST["dateOfBirth"];
    $first_password = $_POST["create_passwrd"];
    $second_password = $_POST["confirm_passwrd"];
    $submit_button = $_POST["submit"];



    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

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
    if (invalidName($fName, $lName, $midName) !==false) {
        header("location: ../signup.php?error=namemustcontainonlyletters");
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

    createUser($conn, $fName, $lName, $indexNum, $program, $gender, $user_email, $dob, $first_password);

} else {
    header("location: ../signup.php");
    exit();
}


if ($first_password == $second_password) {
    $user_password = $second_password;
} else {
    echo "passwords do not match";
}