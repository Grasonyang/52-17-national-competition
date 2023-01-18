<?php
    include 'Include.php';
    $url=explode('/',$_SERVER['REQUEST_URI']);
    $error=new Errorr();
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if($url[3]=="login"){ // 1
            $data=json_decode(file_get_contents("php://input"));
            if($error->Lack($data)!='true'){
                echo json_encode($error->Lack($data));
                exit();
            }
            if($error->Type($data,1)!='true'){
                echo json_encode($error->Type($data,1));
                exit();
            }
            $url=conbineurl($data,'user','select');
            // echo $error->Database($url);
            if($error->Database($url)!='true'){
                echo json_encode(wrongcode("MSG_INVALID_LOGIN"));
                exit();
            }
            mysqli_query($db,"UPDATE `user` SET `access_token`=''");
            $arr=mysqli_fetch_assoc(mysqli_query($db,"$url"));
            $arr['access_token']=hash("sha256",$arr['email']);
            $_SESSION['token']=$arr['access_token'];
            header('Authorization: Bearer $_SESSION[token]');
            mysqli_query($db,"UPDATE `user` SET `access_token`='$_SESSION[token]' WHERE `id` LIKE '$arr[id]'");
            $response=array("success"=>true,"meaasge"=>"","data"=>$arr);
            echo json_encode($response);
            exit();

        }else if($url[3]=="logout"){ // 2
            // echo "1";
            $data=array('access_token'=>$_SESSION['token']);
            $url=conbineurl($data,'user','select');
            if(mysqli_num_rows(mysqli_query($db,$url))){
                $arr=mysqli_fetch_assoc(mysqli_query($db,$url));
                $data['access_token']="";
                $url_1=conbineurl($data,'user','update');
                $url_1.="`id` LIKE '$arr[id]'";
                mysqli_query($db,$url_1);
                $response=array("success"=>true,"message"=>"","data"=>"");
                echo json_encode($response);
            }else{
                $response=array("success"=>false,"message"=>"MSG_INVALID_ACCESS_TOKEN","data"=>"");
                echo json_encode($response);
            }
        }else if($url[3]=="register"){ // 3
            $_SESSION['token']='';
            $_FILES['image']['name']="Include/Image/".$_FILES['image']['name'];
            $data=array("email"=>$_POST['email'],"nickname"=>$_POST['nickname'],
                        "password"=>$_POST['password'],"profile_image"=>$_FILES['image']['name']);
            if($error->Lack($data)!='true'){
                echo json_encode($error->Lack($data));
                exit();
            }
            if($error->Type($data,3)!='true'){
                echo json_encode($error->Type($data,3));
                exit();
            }
            $url=conbineurl($data,'user','select');
            if($error->Database($url)!='true'){ // insert
                $data['type']="USER";
                $url_1=conbineurl($data,'user','insert');
                mysqli_query($db,$url_1);
                
                $userr=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `user` WHERE `email` LIKE '$_POST[email]'"));
                $response=array("success"=>true,"message"=>"","data"=>$userr);
                echo json_encode($response);
            }else{
                echo json_encode(wrongcode("MSG_USER_EXISTS "));
            }
        }else if($url[3][0]==':'){
            if($url[4]=="profile"){ // 16

            }else{ // 18

            }
        }
    }else if($_SERVER['REQUEST_METHOD']=="GET"){
        if($url[4]=="post"){ // 14

        }else if($url[4]=="profile"){ // 15

        }else if($url[4]=="follow"){ // 17

        }
    }else{

    }
?>