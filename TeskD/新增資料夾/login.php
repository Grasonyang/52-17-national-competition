<?php
$db = mysqli_connect("localhost", "admin", "12345", "52test14");
$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$password = $data['password'];
$url = "SELECT * FROM `user` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
$row = mysqli_query($db, $url);
// header("Content-Type:application/json");
if (mysqli_num_rows($row)) {
  $arr = mysqli_fetch_assoc($row);
  $arr['access_token'] = hash("sha256", $arr['email']);
  mysqli_query($db, "UPDATE `user` SET `access_token`='$arr[access_token]' WHERE `id`='$arr[id]'");
  header("Authorization: Bearer $arr[access_token]");
  $response = array("success" => true, "message" => "", "data" => $arr);
  echo json_encode($response);
} else {
  $response = array("success" => false, "message" => "MSG_INVALID_LOGIN", "data" => "");
  echo json_encode($response);
}
