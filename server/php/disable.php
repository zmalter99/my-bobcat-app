<?php

if (file_put_contents("ad.txt", "1")) {
    echo "The add was successfully disabled.";
} else {
    echo "Something weird just happend. Contact zach@maltertech.com";
}

?>