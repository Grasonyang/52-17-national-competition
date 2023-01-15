<?php
session_start();
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
  <h1>圖片分享平台</h1>
  <h2>使用者登入</h2>
  <input type="text" placeholder="email" id="email"><br>
  <input type="text" placeholder="password" id="password"><br>
  <button onclick="login()">送出</button>
  <h2>註冊使用者</h2>
  <form action="api/user/register" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="email" name="reemail"><br>
    <input type="text" placeholder="nickname" name="renickname"><br>
    <input type="text" placeholder="password" name="repassword"><br>
    <input type="file" name="reimage"><br>
    <button onclick="register()">註冊</button>
  </form>
  <div class="public">

  </div>
</body>
<script>
  $.get({
    async: false,
    url: "api/post/public",
    success: function(e) {
      arr = JSON.parse(e);
      console.log(arr.data[0]);
      let alldata = arr.data[0];
      for (let i = 0; i < arr.data.total_count; i++) {
        $(".public").append(`
          <img src="images/${alldata[i].images}" src="${alldata[i].images}"><br>
          <span>作者:${alldata[i].author}</span><br>
          <span>收藏人數:${alldata[i].like_count}</span><br>
          <span>內容:${alldata[i].content}</span><br>
          <span>標籤:${alldata[i].tags}</span><br>
          <span>地點名稱:${alldata[i].location_name}</span><br>
          <span>時間:${alldata[i].created_at}</span><br>
        `);
      }
    },
  });

  function login() {
    let data_json = {
      "email": $("#email").val(),
      "password": $("#password").val(),
    };
    $.post({
      async: false,
      url: "api/user/login",
      data: JSON.stringify(data_json),
      success: function(e) {
        arr = JSON.parse(e);
        console.log(arr);
        if (arr.success) {
          console.log("MSG_USER_EXISTS");
          location.href = "user.php?" + "access_token=" + arr.data.access_token;
          // location.href
        } else {
          alert("MSG_INVALID_LOGIN");
        }
      },
    })
  }
</script>

</html>