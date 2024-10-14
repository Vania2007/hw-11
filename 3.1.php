<?php
$folder_name = "images";
$folder = ["$folder_name" =>
    ["IMG_1237.png",
        "IMG_1385.png",
        "IMG_6752.png",
        "IMG_6547.png",
        "IMG_3687.png",
        "IMG_1198.png",
        "IMG_2438.png",
        "IMG_3627.png",
        "IMG_3878.png",
        "IMG_8972.png",
        "IMG_6544.png",
        "IMG_3850.png",
        "IMG_0474.png"]];
$pattern = '/^IMG_\d+\.(jpg|png|gif)$/i';

if (preg_match('/^images$/', $folder_name)) {
    echo "Folder \"$folder_name\":\n";
    for ($i = 0; $i < count($folder["images"]); $i++) {
        $file = $folder["images"][$i];
        if (preg_match($pattern, $file)) {
            echo "Файл: $file\n";
        }
    }
} else {
    echo "Folder \"$folder_name\" couldn't find";
}
