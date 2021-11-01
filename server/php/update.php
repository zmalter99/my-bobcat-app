<?php

//validate inputs
if (!isset($_POST["password"], $_POST["data"], $_POST["file"])) {
    die(json_encode(["error" => "Invalid arguments."]));
}

// check password
if ($_POST["password"] != "myb0b(@t") {
    die(json_encode(["error" => "Invalid password."]));
}

// if a file doesn't exist then invalid. 
if (!file_exists("data/" . $_POST["file"])) {
    die(json_encode(["error" => "Invalid file."]));
}

//save content
$save = file_put_contents("data/" . $_POST["file"], $_POST["data"]);

// check save was successful
if ($save === false) {
    die(json_encode(["error" => "Unable to save file."]));
}

die(json_encode(["error" => false]));