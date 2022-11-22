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

<form action=""  method="GET"">

<input type="text" name="user">
<input type="password" name="passwrd" id="passw0rd">
<input type="password" name="confrmpswrd" id=""">
<button>SUBMIT</button>
</form>
    <?php
$userName = $_GET['user'] ;
$password = $_GET['passwrd']; 
$confirmPassword = $_GET['confrmpswrd'];

    if ($password == $confirmPassword) {

        echo "Hello, " . $userName . " . You're Welcome!";

    } else {
        
        echo "Your passwords do not match.";
    }
    

?>
</body>
</html>


