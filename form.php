<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
    input{
        margin: 1rem 0;
        display: block;
    }
</style>

<form action=""  method="POST"">

<input type="text" name="user">
<input type="password" name="passwrd" id="passw0rd">
<input type="password" name="confrmpswrd" id=""">
<button name="submit">SUBMIT</button>
</form>

    <?php

    $userName = $_POST['user'] ;
    $password = $_POST['passwrd']; 
    $confirmPassword = $_POST['confrmpswrd'];

    // isset makes the following code display if and only if the user submits the inputs.
if(isset($_POST["submit"])){
    if ($password != $confirmPassword) {

            echo "Your passwords do not match.";
        

    } else {
        
        echo "Hello, " . $userName . " . You're Welcome!";
    }
}

?>
</body>
</html>


