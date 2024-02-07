<!-- Write a PHP program to compute the sum of the two given integer values. If the two values are the same, then returns triple their sum. -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum</title>
</head>
<body>



<form action="wedFeb07.php" method="GET">
    Enter your numbers.
    <input type="number" placeholder="Number 1" name="a">
    <input type="number" placeholder="Number 2" name="b">


    <button type="submit" name="submit">Solve</button>
</form>

<?php


if(isset($_GET['submit'])){
    $a =$_GET['a'];
    $b =$_GET['b'];
}

function checkNum($a,$b){


    $sum = $a + $b;
    if($a != $b){
        echo "<h1>$sum</h1>";
    } elseif($a == $b){
        $product = 3* $sum;
        echo "<h1> $product</h1>";
    }

    return $sum;
}

checkNum($a,$b);

?>


</body>
</html>