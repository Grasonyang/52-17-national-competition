<?php
session_start();
// $type = $_GET['type'];
// $access_token = $_GET['access_token'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="jquery-ui.min.css">
  <script src="jquery-ui.js"></script>
  <title>Document</title>
</head>

<body>
  <button onclick="logout()">logout</button><br>
  <h2>發布貼文</h2>
  <form action="api/post" method="post" enctype="multipart/form-data">
    <?php
    $_SESSION['token'] = $_GET['access_token'];
    ?>
    <input type="file" name="poimage"><br>
    <select name="potype">
      <option value="public">public</option>
      <option value="only_follow">only_follow</option>
      <option value="only_self">only_self</option>
    </select><br>
    <input type="text" placeholder="tags" name="potags"><br>
    <input type="text" placeholder="content" name="pocontent"><br>
    <input type="text" placeholder="location_name" name="polocation_name"><br>
    <button onclick="register()">註冊</button>
  </form>
  <h2>修改貼文</h2>
  <form action="api/post" method="post" enctype="multipart/form-data">
    <?php
    $_SESSION['token'] = $_GET['access_token'];
    ?>
    <input type="file" name="poimage"><br>
    <select name="potype">
      <option value="public">public</option>
      <option value="only_follow">only_follow</option>
      <option value="only_self">only_self</option>
    </select><br>
    <input type="text" placeholder="tags" name="potags"><br>
    <input type="text" placeholder="content" name="pocontent"><br>
    <input type="text" placeholder="location_name" name="polocation_name"><br>
    <button onclick="register()">註冊</button>
  </form>
</body>
<script>
  function logout() {
    <?php
    $_SESSION['token'] = $_GET['access_token'];
    ?>
    $.post({
      async: false,
      url: "api/user/logout",
      success: function(e) {
        // alert(e);
        arr = JSON.parse(e);
        console.log(arr);
        if (arr.success) {
          location.href = "index.php";
        } else {
          alert(arr.message);
        }
      },
    });
  }
</script>

</html>