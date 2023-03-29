<?php
//this program reverses an integer and outputs the result.
//eg 234 returns 432. and -472 returns -274


function integerRev(int $integer){

    $absValue = strval(abs($integer));
    $intLength = strlen($absValue);

    $reversedInt = "";

        for($i = ($intLength - 1); $i >= 0; $i--){
            $reversedInt .=$absValue[$i];
        }

    if($integer<0){
        echo "-" . $reversedInt;
    } else{
            echo $reversedInt;
    }



}

integerRev("827349");