<?php

$path = "/home/zach/domains/mybobcat.net/DropDayNew.txt";
$data = $_POST['DropDayInput'];
$password = $_POST['password'];

if ($password == "myb0b(@t") {

    if (file_put_contents($path, $data)) {
        echo "Success";
    } else {
        echo "Error2";
    }

} else {
    echo "Lol, not even close.";
}

?>