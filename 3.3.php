<?php
$pattern = '/^[a-zA-Z]{1}\w+@[a-zA-Z]+\.[a-zA-Z]+/';
$emails = ["mymail@gmail.com",
    "nameofmail@name.org",
    "bestmail@km.ru",
    "mymailonedrive.com",
    "mymail@yahoocom"];
foreach ($emails as $email) {
    if (preg_match($pattern, $email)) {
        echo "Ел. скринька: $email\n";
    }
}
