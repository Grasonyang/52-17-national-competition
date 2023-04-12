<?php
include 'connect.php';
// header("Content-type:application/json");
$wrong=new wrong();
$sql=new SOL();
// echo $_GET['call'];
if($_GET['call']==1){
    $data=array(
        "images"=>$_FILES['images']['name'][0],
        "content"=>$_POST['content']
    );
    $wrong->MSG_INVALID_ACCESS_TOKEN();
    $wrong->MSG_MISSING_FIELD($data);
    $data1=array(
        "tags"=>$_POST['tags'],
    );
    $wrong->MSG_WROND_DATA_TYPE($data1);
    $wrong->MSG_MANYIMAGE_CAN_NOT_PROCESS($_FILES['images']);
    if(!empty($wrong->wrong_array)){
        $wrong->response(false,$wrong->wrong_array,"");
    }else{
        $tags=explode(' ',$_POST['tags']);
        $tags=implode('/',$tags);
        $user_data=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `user` WHERE `access_token` LIKE '$wrong->token'"));
        $url="INSERT INTO `post`(`author`, `content`, `type`, `tags`, `location_name`) VALUES 
        ('$user_data[id]','$_POST[content]','$_POST[type]','$tags','$_POST[location_name]')";
        $sql->INSERT($url);
        $post_data=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `post` WHERE `author` LIKE '$user_data[id]' AND `content` LIKE '$_POST[content]' AND `type` LIKE '$_POST[type]' AND `tags` LIKE '$tags' AND `location_name` LIKE '$_POST[location_name]' ORDER BY `created_at` DESC LIMIT 1"));
        $imgs=new Image();
        $imgs->manyimage($_FILES['images']);
        for($i=0;$i<count($imgs->height);$i++){
            $height=$imgs->height[$i];
            $width=$imgs->width[$i];
            $url=$imgs->url[$i];
            $sql->INSERT("INSERT INTO `image`(`url`, `posts`, `width`, `height`) VALUES 
            ('$url','$post_data[id]','$width','$height')");
        }
        $wrong->response(true,"",$post_data);
    }
}else if($_GET['call']==2){
    // $data=array(
    //     "page"=>$_GET['page'],
    //     "page_size"=>$_GET['page_size'],
    // );
    echo json_encode($_GET);
    // $wrong->MSG_WROND_DATA_TYPE($data);
    // if(!empty($wrong->wrong_array)){
    //     $wrong->response(false,$wrong->wrong_array,"");
    // }else{
    //     $limit_1=$_GET['page']-1;
    //     $limit_2=$_GET['page_size'];
    //     $url="SELECT * FROM `post` WHERE `type` LIKE 'public'
    //      AND (`content` LIKE '%$_GET[content]%' || `tags` LIKE '%$_GET[tag]%' || `location_name` LIKE '%$_GET[location_name]%') 
    //      ORDER BY `$_GET[order_by]` $_GET[order_type] LIMIT $limit_1*$limit_2,$limit_2";
    //     echo $url;
    //     // $wrong->response(true,"","");
    // }
}