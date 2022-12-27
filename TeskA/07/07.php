<?php
    $folder = 'images';
    $images = scandir($folder);
    foreach ($images as $image) {
        if ($image === '.' || $image === '..') {
            continue;
        }
        echo '<img src="' . $folder . '/' . $image . '" alt="image">';
    }
?>