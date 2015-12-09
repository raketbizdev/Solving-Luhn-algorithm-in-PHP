<?php
$ccd = '5105 1051 0510 5100';
$strip_str =  str_replace(' ', '', $ccd);

echo str_replace(' ', '', $ccd). '<br>';

$arr1 = str_split($strip_str);

foreach ($arr1 as $value) {
    echo "$value <br>";
}
