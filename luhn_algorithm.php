<?php
$ccd = '5105 1051 0510 5100';
// To remove Space for Credit card
$strip_str =  str_replace(' ', '', $ccd); 
//Output or the string without space
echo str_replace(' ', '', $ccd). '<br>';
// Convert String into array
$arr1 = str_split($strip_str); 

//Output individual string value
foreach ($arr1 as $value) {
    echo "$value <br>";
}
