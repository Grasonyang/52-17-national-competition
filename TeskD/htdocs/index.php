<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="src/jquery-3.6.4.min.js"></script>
    <script src="src/jquery-ui.js"></script>
    <link rel="stylesheet" href="src/jquery-ui.css">
    <link rel="shortcut icon" href="#">
    <title>Document</title>
</head>
<body>
    <button onclick="$('.place').dialog('close'),$('.place:eq(0)').dialog('open');">登入</button>
    <button onclick="$('.place').dialog('close'),$('.place:eq(1)').dialog('open');">註冊</button>
    <div class="place login">
        信箱: <input type="text" placeholder="email" class="email"><br>
        密碼: <input type="text" placeholder="password" class="password"><br>
        <button onclick="login()">登入</button>
    </div>
    <div class="place register">
        <form action="/api/user/register" method="POST" enctype="multipart/form-data">
            信箱:<input type="text" name="email"><br>
            暱稱:<input type="text" name="nickname"><br>
            密碼:<input type="text" name="password"><br>
            頭像: <input type="file" name="profile_image"><br>
            <input type="submit">
        </form>
    </div>
    <script src="src/all.js"></script>
</body>
<script>
    function login(){
        let data={
            "email":$(".login .email").val(),
            "password":$(".login .password").val(),
        }
        $.ajax({
            async:false,
            method:"POST",
            url:"/api/user/login",
            data:JSON.stringify(data),
            contentType:"application/json",
            dataType:"json",
            success:function(res,status,xhr){
                if(res.success==true){
                    let token=xhr.getResponseHeader("Authorization").replace("Bearer ","");
                    sessionStorage.setItem(res.data.id,token);
                    if(res.data.type=="ADMIN"){
                        location.href="admin.php?id="+res.data.id;
                    }else{
                        location.href="users.php?id="+res.data.id;
                    }
                    console.log(token);
                }else{
                    console.log(res);
                }
            },
        });
    }
</script>
</html>