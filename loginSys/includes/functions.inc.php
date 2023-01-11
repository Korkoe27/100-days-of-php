<?php

function emptyInputSignUp($fName, $lName, $indexNum, $program, $gender, $user_email, $dob, $first_password, $second_password) {
    
    $result;
    
    if(empty($fName) || empty($lName) || empty($indexNum) || empty($program) || empty($gender) || empty($user_email) || empty($dob) || empty($first_password) || empty($second_password)){

        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function invalidStudId($indexNum) {

    $result;
    
    $studIdpattern = '/^[A-Za-z0-9\/]+$/';

    if (!preg_match($studIdpattern, $indexNum)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    
    return $result;
}


function invalidEmail($user_email) {

    $result;

    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    
    return $result;
}


function passwordStrength($first_password) {

    $result;


    $uppercase = preg_match('@[A-Z]@', $first_password);
    $lowercase = preg_match('@[a-z]@', $first_password);
    $numbers = preg_match('@[0-9]@', $first_password);
    $specialChars = preg_match('@[^\w]@', $first_password);

    if(strlen($first_password) < 8 || !$numbers || !$uppercase || !$lowercase || !$specialChars) {
        $result = true;
      } else {
        $result = false;
      }
    
    return $result;
}


function passwordMatch($first_password, $second_password) {

    $result;

    if ($first_password !== $second_password) {
        $result = true;
    } 
    else {
        $result = false;
    }
    
    return $result;
}

function invalidName($fName, $lName, $midName) {

    $result;

    if (preg_match('/[0-9]/', $fName, $lName, $midName)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    
    return $result;
}



function userAlreadyExists($conn, $indexNum, $user_email){
    $sqlUserCheck = "SELECT * FROM users WHERE studentId = ? OR studentEmail = ?;";


    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sqlUserCheck)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $indexNum, $user_email);
    mysqli_stmt_execute($stmt);


    $resultData = mysqli_stmt_get_result($stmt);

    if ( $row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else {
        $result =false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function createUser($conn, $fName, $lName, $indexNum, $program, $gender, $user_email, $dob, $first_password){

    $sqlCreateUser = "INSERT INTO users (firstName, lastName, otherName, studentId, programOfStudy, phoneNumber, gender, studentEmail, dateOfBirth, user_password) VALUES (?,?,?,?,?,?,?,?,?,?);";

    $createUserStmt = mysqli_stmt_init($conn);


    if (!mysqli_stmt_prepare($createUserStmt, $sqlCreateUser)){
        header("location: ../signup.php?error=signupfailed");
        exit();
    }

    $hashedPassword = password_hash($first_password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($createUserStmt, "ssssssssss", $fName, $lName, $indexNum, $program, $gender, $user_email, $dob, $hashedPassword);


    mysqli_stmt_execute($createUserStmt);

    mysqli_stmt_close($createUserStmt);


    header("location: ../signup.php?error=signupsuccess");
        exit();


}