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
    <button onclick="logout()">登出</button>
    <form action="api/post" method="POST" multiple="multipart/form-data">
        <input type="file" name="postfile">
        <select name="posttype">
            <option value="public">public</option>
            <option value="only_follow">only_follow</option>
            <option value="only_self">only_self</option>
        </select><br>
        <input type="text" placeholder="tags" name="posttags"><br>
        <input type="text" placeholder="content" name="postcontent"><br>
        <input type="text" placeholder="location_name" name="postlocation_name"><br>
        <input type="submit" type="submit">
    </form>
</body>
<script>
    function logout(){
        $.ajax({
            url:'api/user/logout',
            method:'POST',
            success:function(e){
                let arr=JSON.parse(e);
                // console.log(arr);
                if(arr.success){
                    location.href="index.php";
                }else{
                    alert(arr.message);
                }
            },
        });
    }
</script>
</html>