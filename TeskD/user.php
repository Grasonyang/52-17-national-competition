<?php
    
    $db=mysqli_connect("localhost","admin","12345","user");
    $text=json_decode(file_get_contents("php://input"),true);
    $email=$text['email'];
    $password=$text['password'];
    $url="SELECT * FROM `getusers` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
    $row=mysqli_query($db,$url);
    if(mysqli_num_rows($row)){
        // $arr=mysqli_fetch_assoc(mysqli_query($db,$url));
        // $arr['access_token']=hash("sha256",$arr['email']);
        // header('Authorization: Bearer $arr[\'access_token\']');
        // echo json_encode(
        //     "success"=>true ,
        //     "message"=>"MSG_USER_EXISTS",
        //     "data"=>$arr
        // );
    }else{
        
        $response=array(
            "success"=>false,
            "message"=>"MSG_INVALID_LOGIN",
            "data"=>""
        );
        // header("Content-Type: application/json; charset=utf-8");
        echo $response;
    }
?>