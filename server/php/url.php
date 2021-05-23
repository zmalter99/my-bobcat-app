<?php

if (!empty($_POST['urlInput'])) {
	$url = $_POST['urlInput'];
	if (file_put_contents("ad.txt", $url)) {
		echo "The image URL was successfully updated.";
	}
	else {
		echo "Something weird just happend. Contact zach@maltertech.com";
	}
}
else {
	echo 'Please enter a url.';
}

?>

