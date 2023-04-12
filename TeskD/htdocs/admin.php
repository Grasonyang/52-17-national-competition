
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
    <button onclick="logout()">登出</button>
    <button onclick="$('.place').dialog('close'),$('.place:eq(0)').dialog('open');">發布貼文</button>
    <div class="place new_post">
        <form action="/api/post" method="POST" enctype="multipart/form-data">
            圖片: <input type="file" name="images[]" multiple><br>
            <select name="type">
                <option value="public">所有人都可以查看</option>
                <option value="only_follow">只追蹤中的使用者可以查看</option>
                <option value="only_self">只自己可以查看</option>
            </select><br>
            標籤: <input type="text" placeholder="用空分開標籤" name="tags"><br>
            內文: <input type="text" name="content"><br>
            地點: <input type="text" name="location_name"><br>
            <input type="submit">
        </form>
    </div>
    <script src="src/all.js"></script>
</body>
<script>
    let token=get_sessionStorage_item("<?php echo $_GET['id']; ?>");
    header_set(token);

    $(".new_post form").on('submit',function(e){
        e.preventDefault();
        let formData=new FormData($(".new_post form")[0]);
        $.ajax({
            async:false,
            method:"POST",
            url:"/api/post",
            headers:{
                "Authorization":"Bearer "+token,
            },
            data:new FormData($(".new_post form")[0]),
            contentType:false,
            processData:false,
            success:function(e){
                // console.log(e);
                $('.place').dialog('close');
            },
        });
    });
    function logout(){
        $.ajax({
            async:false,
            method:"POST",
            url:"/api/user/logout",
            headers:{
                "Authorization":"Bearer "+token,
            },
            contentType:"application/json",
            success:function(e){
                if(e.success==true){
                    remove_sessionStorage_item("<?php echo $_GET['id']; ?>");
                    location.href="index.php";
                }else{
                    location.href="index.php";
                }
            },
        });
    }

</script>
</html>