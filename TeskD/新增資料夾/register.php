<?php
$reemail = $_POST['reemail'];
$renickname = $_POST['renickname'];
$repassword = $_POST['repassword'];
$reimage = $_FILES['reimage'];
$db = mysqli_connect("localhost", "admin", "12345", "52test14");
if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `email` LIKE '$reemail' AND `nickname` LIKE '$renickname'"))) {
  $response = array("success" => false, "message" => "MSG_USER_EXISTS", "data" => "");
  echo json_encode($response);
  echo PHP_EOL;
}
if (strlen($repassword) < 8 || strlen($repassword) > 24) {
  $response = array("success" => false, "message" => "MSG_PASSWORD_NOT_SECURE", "data" => "");
  echo json_encode($response);
  echo PHP_EOL;
}
if ($reemail == "" || $renickname == "" || $repassword == "" || $reimage == "") {
  $response = array("success" => false, "message" => "MSG_MISSING_FIELD", "data" => "");
  echo json_encode($response);
  echo PHP_EOL;
}
if ($reimage['type'] != "image/jpeg" && $reimage['type'] != "image/png") {
  $response = array("success" => false, "message" => "MSG_IMAGE_CAN_NOT_PROCESS", "data" => "");
  echo json_encode($response);
  echo PHP_EOL;
}
if (strlen($reemail) - strpos($reemail, '@') <= 0) {
  $response = array("success" => false, "message" => "MSG_WROND_DATA_TYPE", "data" => "");
  echo json_encode($response);
  echo PHP_EOL;
}
mysqli_query($db, "INSERT INTO `user`(`email`, `nickname`, `password`, `profile_image`) VALUES 
('$reemail','$renickname','$repassword','$reimage[name]')");
$response = array("success" => true, "message" => "", "data" => "");
echo json_encode($response);
echo PHP_EOL;
