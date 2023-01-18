<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Include/Script/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="Include/Css/jquery-ui.css">
    <script src="Include/Script/jquery-ui.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>圖片分享平台</h1>
    <div>
        <h2>使用者登入</h2>
        <input type="text" placeholder="email" id="login_email"><br>
        <input type="text" placeholder="password" id="login_password"><br>
        <button type="button" onclick="login()">送出</button>
    </div>
    <div>
        <h2>註冊使用者</h2>
        <form action="api/user/register" method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="email" name="email" id="register_email"><br>
            <input type="text" placeholder="nickname" name="nickname" id="register_nickname"><br>
            <input type="text" placeholder="password" name="password" id="register_password"><br>
            <input type="file" name="image" id="register_profile_image"><br>
            <input type="submit" type="submit">
        </form>
    </div>

</body>
<script>
    function login(){
        let data={
            "email":$("#login_email").val(),
            "password":$("#login_password").val()
        };
        $.ajax({
            url:'api/user/login',
            method:'POST',
            data:JSON.stringify(data),
            success:function(e){
                let arr=JSON.parse(e);
                console.log(arr);
                if(arr.success){
                    if(arr.data.type="ADMIN"){
                        location.href="use_admin.php";
                    }else{
                        location.href="use.php";
                    }
                }else{
                    alert(arr.message);
                }
            },
        });
    }
</script>
</html>