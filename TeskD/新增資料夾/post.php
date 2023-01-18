<?php
    include 'Include.php';
    $url=explode('/',$_SERVER['REQUEST_URI']);
    $error=new Errorr();
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(count($url)==3){ // 6
            $imgarr="";
            $thistime=$times;
            foreach($_POST['postimage'] as $val){
                if(!empty($val)){
                    $imgarr.="Include/Image/".$val.",";
                    $image_size=getimagesize("Include/Image/".$val);
                    $aaa="Include/Image/".$val;
                    if(!(mysqli_num_rows(mysqli_query($db,"SELECT * FROM `image` WHERE `url` LIKE '$aaa'")))){
                        $image_data=array("url"=>"Include/Image/".$val,"width"=>$image_size[0],"height"=>$image_size[1],"created_at"=>$thistime);
                        $url_aaaa=conbineurl($image_data,'image','insert');
                        mysqli_query($db,$url_aaaa);
                    }
                }
                
            }
            $data=array("type"=>"$_POST[posttype]","tags"=>"$_POST[posttags]","content"=>"$_POST[postcontent]","location_name"=>"$_POST[postlocation_name]");
            if($error->Lack($data)!='true'){
                echo json_encode($error->Lack($data));
                exit();
            }
            if($error->Type($data,6)!='true'){
                echo json_encode($error->Type($data,6));
                exit();
            }
            $data_1=array('access_token'=>$_SESSION['token']);
            $url=conbineurl($data_1,'user','select');
            if(mysqli_num_rows(mysqli_query($db,$url))){
                $arr=mysqli_fetch_assoc(mysqli_query($db,$url));
                $data['images']=$imgarr;
                $data['author']=$arr['nickname'];
                $data['created_at']=$times;
                $data['like_count']=0;
                $data['liked']=0;
                $url_1=conbineurl($data,'post','insert');
                mysqli_query($db,$url_1);
                $url_2=conbineurl($data,'post','select');
                $arr_1=mysqli_fetch_assoc(mysqli_query($db,$url_2));
                $response=array("success"=>true,"message"=>"","data"=>$arr_1);
                echo json_encode($response);
            }else{
                $response=array("success"=>false,"message"=>"MSG_INVALID_ACCESS_TOKEN","data"=>"");
                echo json_encode($response);
            }
        }else{
            if(stripos($_SERVER['REQUEST_URI'],"comment/:")){ // 12

            }else if(stripos($_SERVER['REQUEST_URI'],"comment")){ // 11

            }else if(stripos($_SERVER['REQUEST_URI'],"favorite")){ // 9
                
                $data1=json_decode(file_get_contents("php://input"),true);
                // echo json_encode($data1);
                $aaaaaaaa=$data1['favorite'];
                $data=array('access_token'=>$_SESSION['token']);
                $urla=conbineurl($data,'user','select');
                if(mysqli_num_rows(mysqli_query($db,$urla))){
                    if($error->Lack($data1)!='true'){
                        echo json_encode($error->Lack($data1));
                        exit();
                    }
                    if($error->Type($data1,9)!='true'){
                        echo json_encode($error->Type($data1,1));
                        exit();
                    }
                   
                    $iddd=substr($url[3],1,strlen($url[3])-1);
                    $url1=conbineurl(array("id"=>$iddd),'post','select');
                    if(mysqli_num_rows(mysqli_query($db,$url1))){
                        if($data1['favorite']==true){
                            mysqli_query($db,"UPDATE `post` SET `liked`='1' WHERE `id` LIKE '$iddd'");
                        }else{
                            mysqli_query($db,"UPDATE `post` SET `liked`='0' WHERE `id` LIKE '$iddd'");
                        }
                        
                        $response=array("success"=>true,"message"=>"","data"=>"");
                        echo json_encode($response);
                    }else{
                        echo json_encode(wrongcode("MSG_POST_NOT_EXISTS"));
                        exit();
                    }
                }else{
                    $response=array("success"=>false,"message"=>"MSG_INVALID_ACCESS_TOKEN","data"=>"");
                    echo json_encode($response);
                }
            }else{ // 7

            }
        }
    }else if($_SERVER['REQUEST_METHOD']=="GET"){
        if($url[3][0]==":"){ // 5

        }else if($url[3]=="public"){ // 4

        }else if($url[3]=="favorite"){ // 10

        }
    }else{
        if(stripos($_SERVER['REQUEST_URI'],"comment")){ // 13

        }else{ // 8

        }
    }
?>