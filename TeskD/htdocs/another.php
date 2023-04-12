<?php
include 'connect.php';
// header("Content-type:application/json");
$wrong=new wrong();
$sql=new SOL();
// echo $_GET['call'];
if($_GET['call']==1){
    $wrong->MSG_POST_NOT_EXISTS($_GET['post_id']);
    if(empty($wrong->wrong_array)){
        $wrong->MSG_PERMISSION_DENY($_GET['post_id']);
    }
    if(!empty($wrong->wrong_array)){
        $wrong->response(false,$wrong->wrong_array,"");
    }else{
        $post_data=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `post` WHERE `id` = '$_GET[post_id]'"));
        $comment_data=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `comment` WHERE `posts` = '$_GET[post_id]'"));
        $data=array(
            "post"=>$post_data,
            "comments"=>$comment_data,
        );
        $wrong->response(true,"",$data);
    }
}else if($_GET['call']==2){

}else if($_GET['call']==3){

}else if($_GET['call']==4){

}else{

}