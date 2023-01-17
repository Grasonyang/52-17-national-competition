<?php
    session_start();
    class wrong_Code{
        public function code($str){
            $response=array("success"=>false,"message"=>$str,"data"=>"");
            return $response;
        }
    }

    class data_Errorr{
        private $host = 'localhost';
        private $user = 'admin';
        private $pass = '12345';
        private $dbname = '52';
        private $conn;
        public function __construct() { // 建構子
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
            if (!$this->conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }

        public function Space($data){
            $missingSpace = array();
            foreach($data as $key => $value){
                if(empty($value)){
                    $missingSpace[]=$key;
                    break;
                }
            }
            if(count($missingSpace)>0){
                return "MSG_MISSING_FIELD";
            }else{
                return 'true';
            }
        }

        public function Wrong_type($data){
            foreach($data as $key => $value){
                if($key=="email"){
                    if(filter_var($value,FILTER_VALIDATE_EMAIL)){
                        return "MSG_WROND_DATA_TYPE ";
                    }
                }
                if($key=="password"){
                    if(strlen($value)<8 || strlen($value)>24){
                        return "MSG_PASSWORD_NOT_SECURE";
                    }
                }
                // if($key=="image"){
                    
                // }
            }
            return 'true';
        }

        public function Data_DB($url){
            $row=mysqli_query($this->conn,$url);
            if(!(mysqli_num_rows($row))){
                return 'false';
            }else{
                return 'true';
            }
        }
    }
    class combine_Url{
        public function url_Select($data,$where){ // SELECT * FROM `?` WHERE
            $url="SELECT * FROM `$where` WHERE ";
            foreach($data as $key => $value){
                $url.="`$key` LIKE '$value' AND ";
            }
            $url=substr_replace ($url,"",$strlen($url)-4,4);
            return $url;
        }
        public function url_Insert($data){
            
        }
        public function url_Update($data){
            
        }
        public function url_Delete($data){
            
        }
    }
    // class data_In{
    //     private $host = 'localhost';
    //     private $user = 'admin';
    //     private $pass = '12345';
    //     private $dbname = '52';
    //     private $conn;
    //     public function __construct() { // 建構子
    //         $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
    //         if (!$this->conn) {
    //             die("Connection failed: " . mysqli_connect_error());
    //         }
    //     }


    //     public function SELECT_DB($url){
    //         $row=mysqli_query($this->conn,$url);
    //         $data_array=[];
    //         while($arr=mysqli_fetch_assoc($row)){
    //             $data_array[]=$arr;
    //         }
    //     }

    //     public function INSERT(){

    //     }

    //     public function UPDATE(){

    //     }

    //     public function DELETE(){

    //     }
    // }
?>