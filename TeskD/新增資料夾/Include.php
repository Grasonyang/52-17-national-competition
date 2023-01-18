<?php
    session_start();
    $db=mysqli_connect("localhost","admin","12345","52");
    $times=date("h:i:s Y/m/d");
    class Errorr{

        public $db="localhost";
        public $ad="admin";
        public $pa="12345";
        public $wh="52";
        public $conn;

        public function __construct(){
            $this->conn=mysqli_connect($this->db,$this->ad,$this->pa,$this->wh);
        }

        public function Lack($data){
            $p=0;
            foreach($data as $key=>$value){
                if(empty($value) && !($key=="tags" || $key=="location_name" || $key=="favorite")){
                    $p=1;
                    break;
                }
            }
            if($p==1){
                return wrongcode("MSG_MISSING_FIELD");
            }
            return true;
        }
        public function Type($data,$apii){
            foreach($data as $key=>$value){
                if($key=="email"){
                    if(!(filter_var($value,FILTER_VALIDATE_EMAIL))){
                        return wrongcode("MSG_WROND_DATA_TYPE");
                    }
                }
                if($key=="password" && $apii==3){
                    if(strlen($value)<8 || strlen($value)>24){
                        return wrongcode("MSG_PASSWORD_NOT_SECURE");
                    }
                }
                if($key=="profile_image" || $key=="images"){
                    if(!(substr($value,strlen($value)-3,strlen($value))=="jpg" || substr($value,strlen($value)-3,strlen($value))=="png")){
                        return wrongcode("MSG_IMAGE_CAN_NOT_PROCESS");
                    }
                }
                if($key=="favorite"){
                    if(!($value==true || $value==false)){
                        return wrongcode("MSG_WROND_DATA_TYPE");
                    }
                }
            }
            return true;
        }
        public function Database($url){
            $row=mysqli_query($this->conn,"$url");
            if(!(mysqli_num_rows($row))){
                return 'false';
            }else{
                return 'true';
            }
        }
    };
    function conbineurl($data,$where,$what){
        if($what=='select'){
            $url="SELECT * FROM `$where` WHERE ";
            foreach($data as $key=>$value){
                $url.="`$key` LIKE '$value' AND ";
            }
            $url=substr_replace($url,"",strlen($url)-4,4);
            return $url;
        }else if($what=='insert'){
            $url="INSERT INTO `$where` (";
            foreach($data as $key=>$value){
                $url.="`$key`, ";
            }
            $url=substr_replace($url,"",strlen($url)-2,2);
            $url.=") VALUES (";

            foreach($data as $key=>$value){
                $url.="'$value', ";
            }
            $url=substr_replace($url,"",strlen($url)-2,2);
            $url.=")";
            return $url;
        }else if($what=='update'){
            $url="UPDATE `$where` SET ";
            foreach($data as $key=>$value){
                $url.="`$key`='$value',";
            }
            $url=substr_replace($url,"",strlen($url)-1,1);
            $url.=" WHERE ";
            return $url;
        }
    }
    function wrongcode($mes){
        $response=array("success"=>false,"mesaage"=>"$mes","data"=>"");
        return $response;
    }

?>