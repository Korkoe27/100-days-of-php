<?php

ini_set ('display_errors', 'on');
ini_set ('log_errors', 'on');
ini_set ('display_startup_errors', 'on');
ini_set ('error_reporting', E_ALL);

//this function converts a string to it's acronym.
//for instance, Parent Teacher Association is returned as PTA.

function acronym(string $phrase){

    //remove single white spaces
    $words = explode(" ", $phrase);

    //remove double white spaces
    $words = preg_split("/\s+/", $phrase);

    //remove characters and symbols
    $words = preg_split("/[\s,_-]+/", $phrase);



    //instatiate acronym with an empty string
    $acronym = "";


    //for each word in "words" get the first letter and add it to the acronym variable.
    foreach($words as $w) {
        $acronym .=mb_substr($w, 0, 1);
    }

    //output the acronym in uppercase.
    echo strtoupper($acronym);
    return $acronym;

}
