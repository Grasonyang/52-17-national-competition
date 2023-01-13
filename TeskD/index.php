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
    <!-- <link rel="stylesheet" href="Include/Css"> -->
    <title>Document</title>
</head>
<body>
    <h1>圖片分享平台</h1>
    <h2>使用者登入</h2>
    <!-- <button>登入</button> -->
    <div class="place">
        <input type="text" placeholder="email" class="email"><br><br>
        <input type="text" placeholder="password" class="password"><br><br>
        <button onclick="login()">登入</button>
    </div>
</body>
<script>
    function login(){
        let datatp={
            "email":$(".email").val(),
            "password":$(".password").val(),
        };
        // console.log(datatp);
        $.post({
            async:false,
            url:"localhost/api/user/login",
            data:JSON.stringify(datatp),
            success:function(e){
                alert(e);
            },
        });
    }
</script>
</html>