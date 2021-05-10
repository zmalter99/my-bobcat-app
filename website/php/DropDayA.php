<?php

$path = "/home/zach/domains/mybobcat.net/DropDayNew.txt";
$currentDropDay = intval(file_get_contents($path));

if ($currentDropDay == 0) {
   $newDropDay = 0;
} else if ($currentDropDay == 9) {
    $newDropDay = 1;
} else {
    $newDropDay = $currentDropDay + 1;
}

if (file_put_contents($path, $newDropDay)) {
    echo $newDropDay;
} else {
    echo "Error";
}


?>