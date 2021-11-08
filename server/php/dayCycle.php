<?php

// get day
$dayRaw = file_get_contents("data/day.txt");

// check for valid get
if ($dayRaw === FALSE) {
    error_log("Could not get day.");
    die();
}

// parse day
$day = intval($dayRaw);

// if day is zero (special alert) do not change
if ($day == 0) {
   die();
}

// if day is less than 8 increment by 1, otherwise set back to 1
if ($day < 8) {
    $day++;
} else {
    $day = 1;
}

// save day
$saved = file_put_contents($path, $day); 

// check save was success
if ($saved === FALSE) {
    error_log("Could not save day.");
    die();
}