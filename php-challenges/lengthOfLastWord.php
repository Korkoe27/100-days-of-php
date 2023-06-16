<?php

//this program takes a string and returns the length of the last word

function lastStringLength($sentence){
    //the sentence variable contains the entire string or statement
    
    //trim the string of any white space at the beginning and end of the string    
    $trimmed = trim($sentence);


    //the sentence is then exploded into an array called sentenceArr
    $sentenceArr = explode(" ",$trimmed);

    // with the combination of count and strlen functions, the variable wordlength stores the length of the last word 

    $wordLength = strlen($sentenceArr[count($sentenceArr)-1]);

    return $wordLength;

}

lastStringLength("   fly me   to   the moon  ");