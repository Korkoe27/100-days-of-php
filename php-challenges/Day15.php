<!-- Write a function createHelloWorld. It should return a new function that always returns "Hello World".-->

<?php


(function(){
    return function(){
        echo "Hello World";
    };
}) ()();