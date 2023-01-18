<?php
    include 'Include.php';

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
    <div>
        <h2>發布貼文</h2>
        <form action="api/post" method="POST" multiple="multipart/form-data">
            <input type="file" name="postimage[]" multiple="multiple"><br>
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
    </div>
    <table border="1">
        <tr>
            <td>貼文</td>
            <td>資訊</td>
            <td>操作</td>
        </tr>
        <?php
            $data=array('access_token'=>$_SESSION['token']);
            $url=conbineurl($data,'user','select');
            $arr=mysqli_fetch_assoc(mysqli_query($db,$url));
            $data_1=array('author'=>$arr['nickname']);
            $url_1=conbineurl($data_1,'post','select');
            $postdata=mysqli_query($db,$url_1);

            while($arr1=mysqli_fetch_array($postdata)){
                $imgs=explode(',',$arr1['images']);
                $content=$arr1['content'];
                $created_at=$arr1['created_at'];
                $updated_at=$arr1['updated_at'];
                $author=$arr1['author'];
                $id=$arr1['id'];
                $liked=$arr1['liked'];
                
                //count($imgs)
                echo "<tr>";
                    echo "<td><div style='display:flex'>";
                    foreach($imgs as $value){
                        if(!empty($value)){
                            $image_data=array("url"=>$value);
                            $url_aaaa=conbineurl($image_data,'image','select');
                            $arr_img=mysqli_fetch_array(mysqli_query($db,$url_aaaa));
                            $img_id=$arr_img['id'];
                            $aaaaaaaa=$img_id;
                            echo "<div>
                                <img src='$value' id='img_$img_id' alt='$value' style='height:250px;width:250px;'><br>
                                <form action='api/' method='POST' multiple='multipart/form-data'>
                                    <input type='text' id='a$aaaaaaaa'>
                                    <input type='submit' type='submit'>
                                </form>";
                            $url_aaaa=conbineurl(array("id"=>$aaaaaaaa),'comment','select');
                            echo "</div>";
                        }
                    }
                    echo "</div></td>";
                    echo "<td>
                        <div>創建時間:$created_at</div>
                        <div>修改時間:$updated_at</div>
                        <div>內容:$content</div>
                    </td>";
                    echo "<td>";
                        echo "<button>修改</button><br><button>刪除</button><br>";
                        if(!($liked)){
                            echo "<button onclick='like(\"liked1_$id\")'>收藏</button>";
                        }else{
                            echo "<button onclick='like(\"liked0_$id\")'>取消收藏</button>";
                        }
                    echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
<script>
    // rone();
    // function rone(){
    //     $.ajax({ // 自己的貼文
    //         url:'',
    //         method:'POST',
    //         success:function(e){
    //             let arr=JSON.parse(e);
    //             // console.log(arr);
    //             if(arr.success){
    //                 location.href="index.php";
    //             }else{
    //                 alert(arr.message);
    //             }
    //         },
    //     });
    // }
    function like(str){
        let id=str.substring(7,str.length);
        if(str[5]=='1'){
            let data={
                "favorite":true,
            };
            $.ajax({
                url:`api/post/:${id}/favorite`,
                method:'POST',
                data:JSON.stringify(data),
                success:function(e){
                    let arr=JSON.parse(e);
                    if(arr.success){
                        location.href="use.php";
                    }else{
                        alert(arr.message);
                    }
                },
            });
        }else{
            let data={
                "favorite":false,
            };
            $.ajax({
                url:`api/post/:${id}/favorite`,
                method:'POST',
                data:JSON.stringify(data),
                success:function(e){
                    let arr=JSON.parse(e);
                    if(arr.success){
                        location.href="use.php";
                    }else{
                        alert(arr.message);
                    }
                },
            });
        }
    }
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