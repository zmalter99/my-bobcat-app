<?php
if (!empty($_FILES['pngInput'])) {

	$file_type = $_FILES['image']['type']; //returns the mimetype

	if ('image/png' !== (string)$_FILES['pngInput']['type']) {
		echo 'Only PNG files are allowed.';
		exit();
	}

	$path = "./";
	$path = $path . basename($_FILES['pngInput']['name']);
	unlink("./ad.png");
	if (move_uploaded_file($_FILES['pngInput']['tmp_name'], './ad.png')) {
		echo "The file was successfully uploaded.";
	}
	else {
		echo "Something weird just happened. Contact zach@maltertech.com";
	}
}
else {
	echo 'Please upload a PNG file.';
}

?>
