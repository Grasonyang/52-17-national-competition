<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Include/Script/jquery-3.6.3.min.js"></script>
    <script src="Include/Script/jquery-ui.js"></script>
    <link rel="stylesheet" href="Include/Css/jquery-ui.css">
    <title>Document</title>
</head>
<body>
    <h1>圖片分享平台</h1>
    <h2>使用者登入</h2>
    <div>
        <input type="text" placeholder="email" id="us_email"><br>
        <input type="text" placeholder="password" id="us_password"><br>
        <button onclick="user_login()">登入</button>
    </div>
</body>
<script>
    function user_login(){
        let user_data={
            "email":$("#us_email").val(),
            "password":$("#us_password").val(),
        };
        $.ajax({
            url:'api/user/login',
            method:'POST',
            data:JSON.stringify(user_data),
            success:function(e){
                alert(e);
            },
        });
    }
</script>
</html>