<?php

ini_set ('display_errors', 'on');
ini_set ('log_errors', 'on');
ini_set ('display_startup_errors', 'on');
ini_set ('error_reporting', E_ALL);

function emptyInputSignUp($fName, $lName, $indexNum, $program, $gender, $user_email, $dob, $first_password, $second_password)
{


    if (empty($fName) || empty($lName) || empty($indexNum) || empty($program) || empty($gender) || empty($user_email) || empty($dob) || empty($first_password) || empty($second_password)) {

        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidStudId($indexNum)
{

    //this function validates the student's index number and allows numbers, alphabets and slashes

    $studIdpattern = '/^[A-Za-z0-9\/]+$/';

    if (!preg_match($studIdpattern, $indexNum)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}


function invalidEmail($user_email)
{

    //this function validates the user email and checks for incorrect email type.

    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}


function passwordStrength($first_password)
{

    //this function validates the users password by checking the strength and ensures that the passsword is not less than 8, contains numbers, uppercase letters, lowercase letters and special characters.
    //this is done with a preg_match function with regular expressions.

    $uppercase = preg_match('@[A-Z]@', $first_password);
    $lowercase = preg_match('@[a-z]@', $first_password);
    $numbers = preg_match('@[0-9]@', $first_password);
    $specialChars = preg_match('@[^\w]@', $first_password);

    if (strlen($first_password) < 8 || !$numbers || !$uppercase || !$lowercase || !$specialChars) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}


function passwordMatch($first_password, $second_password)
{

    //this function checks that the user's passwords match and returns an error message if they dont
    if ($first_password !== $second_password) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}



function userAlreadyExists($conn, $indexNum, $user_email)
{
    $sqlUserCheck = "SELECT * FROM users WHERE studentId = ? OR studentEmail = ?;";


    //this function checks if user already exists. it uses the email as parameters to check

    $stmt = mysqli_stmt_init($conn);

    // var_dump($stmt);

    if (!mysqli_stmt_prepare($stmt, $sqlUserCheck)) {
        header("location: ../signup.php?error=stmtfailed");
        // exit();
    } 

    mysqli_stmt_bind_param($stmt, "ss", $indexNum, $user_email);
    mysqli_stmt_execute($stmt);


    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}




function createUser($conn, $fName, $lName, $midName, $indexNum, $program, $telephone, $gender, $user_email, $dob, $first_password)
{

    $sqlCreateUser = "INSERT INTO users (firstName, lastName, otherName, studentId, programOfStudy, phoneNumber, gender, studentEmail, dateOfBirth, user_password) VALUES (?,?,?,?,?,?,?,?,?,?);";

    $createUserStmt = mysqli_stmt_init($conn);


    //this function creates the user after taking all the values from the sign up form.
    // and inserts the data into the database.


    if (!mysqli_stmt_prepare($createUserStmt, $sqlCreateUser)) {
        header("location: ../signup.php?error=signupfailed");
        // exit();
    }

    $hashedPassword = password_hash($first_password, PASSWORD_BCRYPT); //hashes the original password from the user and stores it in a variable called hashedPassword.

    mysqli_stmt_bind_param($createUserStmt, "ssssssssss", $fName, $lName, $midName, $indexNum, $program, $telephone, $gender, $user_email, $dob, $hashedPassword); //binds the sql fields to the php variables.


    mysqli_stmt_execute($createUserStmt);

    mysqli_stmt_close($createUserStmt);


    header("location: ../signup.php?error=signupsuccess");
    // exit();
}

// $userExists = userAlreadyExists($conn, $indexNum, $user_email, $telephone);
// $userExists = userAlreadyExists($conn, $indexNum, $user_email);




function loginUser($conn, $user_email, $password) {


    session_start();


        $email = mysqli_real_escape_string($conn, $user_email);
        $checkUser = "SELECT * FROM users WHERE studentEmail = ?;";

        $result = mysqli_query($conn, $checkUser);
        // $stmt = mysqli_stmt_init($conn);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
          }

          if (mysqli_num_rows($result) == 1) {
    
            // Fetch the hashed password from the database
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row["user_password"];
            
            // Verify the password using the password_verify() function
            if (password_verify($password, $hashed_password)) {
              
              // Query the database to get the user ID and email
              $query = "SELECT id, studentEmail FROM users WHERE studentEmail = '$user_email'";
              $result = mysqli_query($conn, $query);
              
              // Check if the query was successful
              if (!$result) {
                die("Query failed: " . mysqli_error($conn));
              }
              
              // Fetch the user data
              $row = mysqli_fetch_assoc($result);
              
              // Set session variables
              $_SESSION["user_id"] = $row["id"];
              $_SESSION["user_email"] = $row["user_email"];
              
              // Redirect to the homepage
              header("Location: ../index.php");
              exit();
              
            } else {
              
              // Display an error message
              echo "Invalid email or password.";
              
            }
            
          } else {
            
            // Display an error message
            echo "Invalid email or password.";
            
          }
        
          // Close the database connection
          mysqli_close($conn);
        }


//     if (!mysqli_stmt_prepare($stmt, $checkUser)) {
//         header("location: ../signup.php?error=stmtfailed");
//         // exit();
//     } 

//     mysqli_stmt_bind_param($stmt, "s", $user_email);
//     mysqli_stmt_execute($stmt);


//     $resultData = mysqli_stmt_get_result($stmt);

//     if ($row = mysqli_fetch_assoc($resultData)) {
//         return $row;
//     } else {
//         $result = false;
//         return $result;
//     }

//     mysqli_stmt_close($stmt);
// }
