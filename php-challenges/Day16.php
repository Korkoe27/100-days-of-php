<!-- Day 15 - (30/09/2024): Given an integer array nums, return the most frequent even element. -->


<?php




$int = array(1,3,2,1,3,342,32,121,2,3,2);


for($i=0; $i<count($int); $i++){
    if($i % 2 === 0){
        // $even[] = $i;
        echo "<p>" . $i ."</p>";
    }
}

// print_r($even);