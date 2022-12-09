<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Enter 5 random numbers.</p>

    <form action="" method="POST">
        <input type="text" name="value0">
        <input type="text" name="value1">
        <input type="text" name="value2">
        <input type="text" name="value3">
        <input type="text" name="value4">
        <button type="submit" name="submit">Send</button>
    </form>
    
</body>
</html>


//This Program finds the unique elements in an array and outputs them.


<?php

// put the values taken from the user and put them in variables.
$firstValue = $_POST['value0'];
$secondValue = $_POST['value1'];
$thirdValue = $_POST['value2'];
$fourthValue = $_POST['value3'];
$fifthValue = $_POST['value4'];


//put the varibales into an array and assign the array into a value.

$arr = array("$firstValue","$secondValue","$thirdValue","$fourthValue","$fifthValue");


// create an isset if statement to run the function if and only if the submit button is clicked by the user
if (isset($_POST['submit'])) {


    //create a function that that counts the number of times an element occurs in an array
    function uniqueValues($arr){


        //put that count into a variable
    $counts = array_count_values($arr);



    foreach ($counts as $value => $count) {

        //print all elements which have a count of 1.
        if ($count == 1) {
            $uniques[] = $value;
        } else {
            $duplicates[] = $value;
        }
    }
     echo  "<p>Your array was " . $arr[0] . "  " . $arr[1] . "  " . $arr[2] . "  "  . $arr[3] . "  " . $arr[4] . "</p>";
    
    echo " <p>And your unique values are:</p> " , implode(", ", $uniques) , "\n";
    // echo "duplicate values: " , implode(", ", $duplicates);

}
uniqueValues($arr);
}
    
?>