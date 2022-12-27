<?php
if ($_GET['url'] != null || $_GET['url'] != '') {
  $url = $_GET['url'];
  if (strpos($url, '07.html') != false && $_SERVER['HTTP_REFERER'] != null) {
    $folder = 'images';
    $images = scandir($folder);
    // if($_SERVER['PHP_SELF'])
    // echo ;
    foreach ($images as $image) {
      if ($image === '.' || $image === '..') {
        continue;
      }
      // echo '<img src="' . $folder . '/' . $image . '">';
    }
  } else {
    echo "Status Code: 403";
  }
} else {
  echo "Status Code: 403";
}
