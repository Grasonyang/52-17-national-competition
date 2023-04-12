<?php
include 'connect.php';
// header("Content-type:application/json");
$wrong=new wrong();
$sql=new SOL();
if($_GET['call']==1){
    $data=json_decode(file_get_contents("php://input"),true);
    $wrong->MSG_MISSING_FIELD($data);
    $wrong->MSG_WROND_DATA_TYPE($data);
    if(!$wrong->rowtrue("SELECT * FROM `user` WHERE `email` LIKE '$data[email]' AND `password` LIKE '$data[password]'")){
        array_push($wrong->wrong_array,"MSG_INVALID_LOGIN");
    }
    if(!empty($wrong->wrong_array)){
        $wrong->response(false,$wrong->wrong_array,"");
    }else{
        $sql_data=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `user` WHERE `email` LIKE '$data[email]' AND `password` LIKE '$data[password]'"));
        $sql_data['email']=hash("sha256",$data['email']);
        $token=$sql_data['email'];
        $sql->UPDATE("UPDATE `user` SET `access_token`='$token' WHERE `id` LIKE '$sql_data[id]'");
        header("Authorization:Bearer ".$token);
        $wrong->response(true,"",$sql_data);
    }
}else if($_GET['call']==2){
    $wrong->MSG_INVALID_ACCESS_TOKEN();
    if(!empty($wrong->wrong_array)){
        $wrong->response(false,$wrong->wrong_array,"");
    }else{
        $wrong->response(true,"","");
    }
}else if($_GET['call']==3){
    $data=array(
        "email"=>$_POST['email'],
        "nickname"=>$_POST['nickname'],
        "password"=>$_POST['password'],
        "profile_image"=>$_FILES['profile_image']['name'],
    );
    $wrong->MSG_MISSING_FIELD($data);
    $wrong->MSG_WROND_DATA_TYPE($data);
    if(strlen($_POST['password'])<8 && strlen($_POST['password'])>24){
        array_push($wrong->wrong_array,"MSG_PASSWORD_NOT_SECURE");
    }
    $wrong->MSG_IMAGE_CAN_NOT_PROCESS($_FILES['profile_image']);
    if($wrong->rowtrue("SELECT * FROM `user` WHERE (`email` LIKE '$_POST[email]') || (`nickname` LIKE '$_POST[nickname]')")){
        array_push($wrong->wrong_array,"MSG_USER_EXISTS");
    }
    if(!empty($wrong->wrong_array)){
        $wrong->response(false,$wrong->wrong_array,"");
    }else{
        $img=new Image();
        $img->image($_FILES['profile_image']);
        $purl=$img->url;
        $sql->INSERT("INSERT INTO `user`(`email`, `nickname`, `password`, `profile_image`, `type`) VALUES 
        ('$data[email]','$data[nickname]','$data[password]','$purl','USER')");
        $user_data=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `user` WHERE `email` LIKE '$_POST[email]'"));
        $wrong->response(true,"",$user_data);
    }
}