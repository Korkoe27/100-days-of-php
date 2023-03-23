<?php
//Mon, March 20th ,2023.
//This program takes a word from the user and flips it.
//for example, loop becomes pool. and cool becomes looc.

function stringReverse(string $userStr){

    //first the string has been assigned to a variable called userStr;
    //then the length of the string is put into a variable.
   $stringLength = strlen($userStr);
    

   //in this for loop, i is instatiated at the end of the string. And until the position i is equal to zero, the position of i will keep decreasing by 1.
   $reversedStr = "";
    for($i = ($stringLength-1); $i >= 0; $i--){
        $reversedStr .= $userStr[$i];
    }
    return $reversedStr;
}
stringReverse("hello there");

