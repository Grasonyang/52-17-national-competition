<?php
session_start();
// echo $_SESSION['token'];
$db = mysqli_connect("localhost", "admin", "12345", "52test14");
$url = "SELECT * FROM `user` WHERE `access_token` LIKE '$_SESSION[token]'";
$row = mysqli_query($db, $url);
if (mysqli_num_rows($row)) {
  $arr = mysqli_fetch_assoc($row);
  // echo $arr['access_token'];
  mysqli_query($db, "UPDATE `user` SET `access_token`='' WHERE `access_token` LIKE '$arr[access_token]'");
  $response = array("success" => true, "message" => "", "data" => "");
  echo json_encode($response);
} else {
  $response = array("success" => false, "message" => "MSG_INVALID_ACCESS_TOKEN", "data" => "");
  echo json_encode($response);
}
