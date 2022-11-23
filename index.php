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
        input , select , button{
            height: 2.5rem;
            width: 30%;
            margin: 1rem;
        }
    </style>
    <form action="" method="POST">
        <input type="text" name="num1" placeholder="Number 1">
        <input type="text" name="num2" placeholder="Number 2">

        <select name="operator" id="">
        <option value="None" name="none" >None</option>
        <option value="Add" name="add">Add</option>
        <option value="Subtract" name="subtract">Subtract</option>
        <option value="Multiply" name="multiply">Multiply</option>
        <option value="Divide" name="divide">Divide</option>
        </select>
    <br>
        <button name="submit" type="submit" value="submit">Solve</button>
    </form>


<?php

/*
This a simple calculator.
It takes 2 values from the user, num1 and num2 and makes the user choose an operation. And then produces the solution. Switch cases were used to display the possible operations the user could use.
*/

$result1 = $_POST['num1'];
$result2 = $_POST['num2'];
$operator = $_POST['operator'];


    if(isset($_POST["submit"])) {

        switch($operator){
            case "None":
                echo "You need to select a method";
                break;
            case "Add":
                echo $result1 . " plus " . $result2 . " equals:" . $result1 + $result2;
                break;
            case "Subtract":
                echo $result1 . " minus " . $result2 . " equals:" . $result1 - $result2;
                break;
            case "Multiply":
                echo $result1 . " X " . $result2 . " equals:" .  $result1 * $result2;
                break;
            case "Divide":
                echo $result1 . " divided by " . $result2 . " equals: " .  $result1 / $result2;
                break;

        }
    }

?>


</body>
</html>