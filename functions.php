<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>

<!-- This program calculates a borrowers payable amount depending on the the loan, time and rate(set by the bank).
The user inputs their account number and the time(in months) -->


<form action="" method="POST" class="loanForm">
<input type="text" name="accountNum" id="" placeholder="Account number">
<input type="number" name="loanAmount" id="" placeholder="Loan Amount">
<label for="time">In months, how long before you pay the loan?
<input type="number" name="time" id="" placeholder="Loan time"></label>

<button type="submit" name="submit">Check Payable Amount</button>
</form>
<?php
 

//  variables holding the values for the account details, the principal amount and the time it takes for the borrower to pay back the loan
 $account = $_POST['accountNum'];
 $principal = $_POST['loanAmount'];
 $time = $_POST['time'];


//form submits when button is pressed
if (isset($_POST["submit"])) {

    //function to calculate payable amount using values taken form the form.
    //first, the simple interesr is calculated and then added to he principal amount.
    function loanCalc($account , $principal , $time){
        $timeInYears = $time / 12;
        $interest = ($principal * $timeInYears * 15) / 100;
        $payableAmount = $interest + $principal;
        echo "<p> Account number " . $account . ", after " . $time . " months. You'll pay GH¢ " . $payableAmount . ".</p>";
    }

    loanCalc($account , $principal , $time);
}



?>
</body>
</html>
