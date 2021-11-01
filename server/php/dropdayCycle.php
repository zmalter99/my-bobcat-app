<?php

$currentDropDay = intval(file_get_contents("data/dropday.txt"));

if ($currentDropDay == 0) {
   $newDropDay = 0;
} else if ($currentDropDay == 9) {
    $newDropDay = 1;
} else {
    $newDropDay = $currentDropDay + 1;
}

file_put_contents($path, $newDropDay);

?>