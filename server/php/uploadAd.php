<?php

// check FILES is not empty
if (empty($_FILES['image'])) {
	die(json_encode(["error" => "No image provided."]));
}

// check image is a PNG
if ($_FILES['image']['type'] != 'image/png') {
	die(json_encode(["error" => "Only PNG files are allowed."]));
}

// move image
$moveImage = move_uploaded_file($_FILES['image']['tmp_name'], 'data/ad.png');

// check image was moved
if ($moveImage === false) {
	die(json_encode(["error" => "Something weird just happened. Contact zach@maltertech.com"]));
}

die(json_encode(["error" => false]));
