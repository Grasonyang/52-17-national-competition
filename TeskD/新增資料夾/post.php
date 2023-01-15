<?php
session_start();
print_r(explode('/', $_SERVER['REQUEST_URI']));
// $poimage = $_FILES['poimage'];
// $potype = $_POST['potype'];
// $potags = $_POST['potags'];
// $pocontent = $_POST['pocontent'];
// $polocation_name = $_POST['polocation_name'];
// $date = date("Y/m/d H:i:s");
// $db = mysqli_connect("localhost", "admin", "12345", "52test14");
// if ($polocation_name == "") {
//   $polocation_name = "null";
// }
// // if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `email` LIKE '$reemail' AND `nickname` LIKE '$renickname'"))) {
// //   $response = array("success" => false, "message" => "MSG_USER_EXISTS", "data" => "");
// //   echo json_encode($response);
// //   echo PHP_EOL;
// // }
// // if (strlen($repassword) < 8 || strlen($repassword) > 24) {
// //   $response = array("success" => false, "message" => "MSG_PASSWORD_NOT_SECURE", "data" => "");
// //   echo json_encode($response);
// //   echo PHP_EOL;
// // }
// if ($poimage == "" || $potype == "" || $potags == "" || $pocontent == "" || $polocation_name == "") {
//   $response = array("success" => false, "message" => "MSG_MISSING_FIELD", "data" => "");
//   echo json_encode($response);
//   echo PHP_EOL;
// }
// $arr = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `user` WHERE `access_token` LIKE '$_SESSION[token]'"));
// mysqli_query($db, "INSERT INTO `post`(`author`, `images`, `like_count`, `content`, `type`, `tags`, `location_name`, `liked`, `updated_at`, `created_at`) VALUES 
// ('$arr[nickname]','$poimage[name]','0','$pocontent','$potype','$potags','$polocation_name','0','','$date')");
// $response = array("success" => true, "message" => "", "data" => array(
//   "image" => $poimage['name'], "type" => $potype,
//   "tags" => $potags, "content" => $pocontent, "location_name" => $polocation_name
// ));
// echo json_encode($response);
// echo PHP_EOL;
