<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","52_d_0");

class wrong{
    public $db;
    public $wrong_array;
    public $token;
    public function __construct(){
        $this->db=mysqli_connect("localhost","admin","1234","52_d_0");
        $this->wrong_array=array();
        $this->token = substr_replace(getallheaders()['Authorization'] ?? null, "", 0, 7);
    }

    public function MSG_MISSING_FIELD($data){
        $ifwrong="0";
        foreach($data as $key=>$val){
            if($val==""){
                $ifwrong="1";
                break;
            }
        }
        if($ifwrong=="1"){
            array_push($this->wrong_array,"MSG_MISSING_FIELD");
        }
    }

    public function MSG_WROND_DATA_TYPE($data){
        foreach($data as $key=>$val){
            if($key=="email"){
                if(!filter_var($val,FILTER_VALIDATE_EMAIL)){
                    array_push($this->wrong_array,"MSG_WROND_DATA_TYPE");
                }
            }
            if($key=="tags"){
                if(strpos($val,"  ")){
                    array_push($this->wrong_array,"MSG_WROND_DATA_TYPE");
                }
            }
            if($key=="page" && $val!=""){
                if($val<=0){
                    array_push($this->wrong_array,"MSG_WROND_DATA_TYPE");
                }
            }
            if($key=="page_size" && $val!=""){
                if($val<1 || $val>100){
                    array_push($this->wrong_array,"MSG_WROND_DATA_TYPE");
                }
            }
        }
    }

    public function MSG_INVALID_ACCESS_TOKEN(){
        if(!$this->rowtrue("SELECT * FROM `user` WHERE `access_token` LIKE '$this->token'")){
            array_push($this->wrong_array,"MSG_INVALID_ACCESS_TOKEN");
        }
        // else{
        //     mysqli_query($this->db,"UPDATE `user` SET `access_token`='' WHERE `access_token` LIKE '$this->token'");
        // }
    }

    public function MSG_PERMISSION_DENY($posts){
        $datas=mysqli_fetch_array(mysqli_query($this->db,"SELECT * FROM `post` WHERE `id` LIKE '$posts'"));
        if($this->token==null){
            if($datas['type']!='public'){
                array_push($this->wrong_array,"MSG_PERMISSION_DENY");
            }
        }else{
            $users=mysqli_fetch_array(mysqli_query($this->db,"SELECT * FROM `user` WHERE `access_token` LIKE '$this->token'"));
            if($datas['author']!=$users['id']){
                if($datas['type']!='public'){
                    if(!$this->rowtrue("SELECT * FROM `follow` WHERE `id` LIKE '$datas[author]' AND `follow_id` LIKE '$users[id]'")){
                        array_push($this->wrong_array,"MSG_PERMISSION_DENY");
                    }
                }
            }
        }
    }

    public function MSG_POST_NOT_EXISTS($posts){
        if(!$this->rowtrue("SELECT * FROM `post` WHERE `id` LIKE '$posts'")){
            array_push($this->wrong_array,"MSG_POST_NOT_EXISTS");
        }
    }

    public function MSG_IMAGE_CAN_NOT_PROCESS($file){
        if(!($file['type']=="image/png" || $file['type']=="image/jpeg")){
            array_push($this->wrong_array,"MSG_IMAGE_CAN_NOT_PROCESS");
        }
    }

    public function MSG_MANYIMAGE_CAN_NOT_PROCESS($file){
        for($i=0;$i<count($file['type']);$i++){
           if(!($file['type'][$i]=="image/png" || $file['type'][$i]=="image/jpeg")){
                array_push($this->wrong_array,"MSG_IMAGE_CAN_NOT_PROCESS");
            }
        }
    }

    public function rowtrue($url){
        $row=mysqli_query($this->db,$url);
        if(mysqli_num_rows($row)){
            return true;
        }else{
            return false;
        }
    }

    public function response($success,$message,$data){
        
        $response=array(
            "success"=>$success,
            "message"=>$message,
            "data"=>$data,
        );
        echo json_encode($response);
    }
    
}
class SOL{
    public $db;
    public function __construct(){
        $this->db=mysqli_connect("localhost","admin","1234","52_d_0");
    }
    public function INSERT($url){
        mysqli_query($this->db,$url);
    }
    public function UPDATE($url){
        mysqli_query($this->db,$url);
    }
    public function DELETE($url){
        mysqli_query($this->db,$url);
    }
}
class Image{
    public $height;
    public $width;
    public $url;
    public function image($file){
        $this->width=getimagesize($file['tmp_name'])[0];
        $this->height=getimagesize($file['tmp_name'])[1];
        $file_img = $file['tmp_name'];
        $file_read_img=file_get_contents($file_img);
        $file_base=base64_encode($file_read_img);
        switch($file['type']){
            case 'image/png':
                $img_type='png';
                break;
            case 'image/jpeg':
                $img_type='jpeg';
                break;  
        }
        $this->url='data:image/'.$img_type.';base64,'.$file_base;
    }
    public function manyimage($file){
        $this->width=array();
        $this->height=array();
        $this->url=array();
        for($i=0;$i<count($file['tmp_name']);$i++){
            array_push($this->width,getimagesize($file['tmp_name'][$i])[0]);
            array_push($this->height,getimagesize($file['tmp_name'][$i])[1]);
            $file_img = $file['tmp_name'][$i];
            $file_read_img=file_get_contents($file_img);
            $file_base=base64_encode($file_read_img);
            switch($file['type'][$i]){
                case 'image/png':
                    $img_type='png';
                    break;
                case 'image/jpeg':
                    $img_type='jpeg';
                    break;  
            }
            array_push($this->url,'data:image/'.$img_type.';base64,'.$file_base);
        }
    }
}