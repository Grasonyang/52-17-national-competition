<?php
$db = mysqli_connect("localhost", "admin", "12345", "52test14");
$row = mysqli_query($db, "SELECT * FROM `post` WHERE `type` LIKE 'public'");
// while($rarr=mysqli_fetch_array($row)){

// }
while ($arr = mysqli_fetch_assoc($row)) {
  $post[] = $arr;
}
// echo json_encode($post);
$response = array("success" => true, "message" => "", "data" => array("total_count" => mysqli_num_rows($row), $post));
echo json_encode($response);
