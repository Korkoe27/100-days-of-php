<?php

function emptyInputSignUp($fName, $lName, $indexNum, $program, $gender, $user_email, $dob, $first_password, $second_password) {
    
    
    if(empty($fName) || empty($lName) || empty($indexNum) || empty($program) || empty($gender) || empty($user_email) || empty($dob) || empty($first_password) || empty($second_password)){

        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function invalidStudId($indexNum) {

    
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


    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    
    return $result;
}


function passwordStrength($first_password) {

    //this function validates the users password by checking the strength and ensures that the passsword is not less than 8, contains numbers, uppercase letters, lowercase letters and special characters.
    //this is done with a preg_match function with regular expressions.

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

    //this function checks that the user's passwords match and returns an error message if they dont
    if ($first_password !== $second_password) {
        $result = true;
    } 
    else {
        $result = false;
    }
    
    return $result;
}

// function invalidName($fName, $lName, $midName) {

    //this function validates the name fields. it prevents the user from input numbers and special characters in the names.

//     if (!preg_match("/^[a-zA-Z ]*$/", $fName, $lName, $midName)) {
//         $result = true;
//     } 
//     else {
//         $result = false;
//     }
    
//     return $result;
// }



function userAlreadyExists($conn, $indexNum, $user_email, $telephone){
    $sqlUserCheck = "SELECT * FROM users WHERE studentId = ? OR studentEmail = ? OR phoneNumber = ?;";


    //this function checks if user already exists. it uses the email, index number and telephone number as parameters to check

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sqlUserCheck)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $indexNum, $user_email, $telephone);
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


function createUser($conn, $fName, $lName, $midName, $indexNum, $program, $telephone, $gender, $user_email, $dob, $first_password){

    $sqlCreateUser = "INSERT INTO users (firstName, lastName, otherName, studentId, programOfStudy, phoneNumber, gender, studentEmail, dateOfBirth, user_password) VALUES (?,?,?,?,?,?,?,?,?,?);";

    $createUserStmt = mysqli_stmt_init($conn);


    //this function creates the user after taking all the values from the sign up form.
    // and inserts the data into the database.


    if (!mysqli_stmt_prepare($createUserStmt, $sqlCreateUser)){
        header("location: ../signup.php?error=signupfailed");
        exit();
    }

    $hashedPassword = password_hash($first_password, PASSWORD_DEFAULT);//hashes the original password from the user and stores it in a variable called hashedPassword.

    mysqli_stmt_bind_param($createUserStmt, "ssssssssss", $fName, $lName, $midName, $indexNum, $program, $telephone, $gender, $user_email, $dob, $hashedPassword);//binds the sql fields to the php variables.


    mysqli_stmt_execute($createUserStmt);

    mysqli_stmt_close($createUserStmt);


    header("location: ../signup.php?error=signupsuccess");
        exit();


}