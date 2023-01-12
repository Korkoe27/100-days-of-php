<?php



function emptyAdminSignUp($fName, $adminId, $adminPassword, $confirmPassword){

    if (empty($fName) || empty($adminId) || empty($adminPassword) || empty($confirmPassword)){
        $result = true;
    }else{

    $result = false;
    }
    return $result;

}

function invalidAdminId($adminId){
    

    //this function checks and validates the admin ID to prevent them from using special characters. 
    //Regular expressions gave the range for the values that validate the input.

    if (!preg_match("/^[a-zA-Z0-9]*$/", $adminId)){
        $result = true;
    }else{

    $result = false;
    }
    return $result;

}

function invalidAdminEmail($adminEmail){
    

    //This function validates the admin's email. the filter_var function checks that the email is accurate .

    if (!filter_var($adminEmail, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{

    $result = false;
    }
    return $result;

}

function passwordMismatch($adminPassword, $confirmPassword){
    

    if ($adminPassword !== $confirmPassword){
        $result = false;
    }else{

    $result = true;
    }
    return $result;

}

function adminIdExists($dbConn, $adminEmail, $adminId){
    
    $sqlStatement = "SELECT * FROM admins WHERE adminId = ? OR adminEmail = ?;";

    //this function determines if the admin is already in the system.

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

function createAdmin($dbConn, $fName, $adminEmail,  $adminId, $adminPassword){
    
    $sqlCreateStatement = "INSERT INTO admins (adminName, adminEmail, adminId, adminPassword) VALUES (?, ?, ?, ?);";

    // this function takes all the values taken from the user and cretes the admin.

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