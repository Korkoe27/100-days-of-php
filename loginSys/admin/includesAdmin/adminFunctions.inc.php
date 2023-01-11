<?php

function emptyAdminSignUp($fName, $adminId, $adminPassword, $confirmPassword){
    
    // $result;

    if (empty($fName) || empty($adminId) || empty($adminPassword) || empty($confirmPassword)){
        $result = true;
    }else{

    $result = true;
    }
    return $result;

}

function invalidAdminId($adminId){
    
    // $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $adminId)){
        $result = true;
    }else{

    $result = true;
    }
    return $result;

}

function invalidAdminEmail($adminEmail){
    
    // $result;

    if (!filter_var($adminEmail, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{

    $result = true;
    }
    return $result;

}

function passwordMismatch($adminPassword, $confirmPassword){
    
    // $result;

    if ($adminPassword !== $confirmPassword){
        $result = true;
    }else{

    $result = true;
    }
    return $result;

}

function adminIdExists($dbConn, $adminEmail, $adminId){
    
    $sqlStatement = "SELECT * FROM admins WHERE adminId = ? OR adminEmail = ?;";

    $stmt = mysqli_stmt_init($dbConn);

    if (!mysqli_stmt_prepare($stmt, $sqlStatement)){
        header("location: ../adminSignup.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ss", $adminEmail, $adminId);
    mysqli_stmt_execute($stmt);


    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){

        return $row;

    }else{
        $result = false;
        return $result;
    }


    mysqli_stmt_close($stmt);
    
}

function createAdmin($dbConn, $adminEmail, $adminId, $fName, $adminPassword){
    
    $sqlCreateStatement = "INSERT INTO admins (adminName, adminEmail, adminId, adminPassword) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($dbConn);

    if (!mysqli_stmt_prepare($stmt, $sqlCreateStatement)){
        header("location: ../adminSignup.php?error=stmtfailed");
        exit();
    }

    $hashPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $fName, $adminEmail, $adminId, $hashPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../adminSignup.php?error=none");
        exit();
    

}