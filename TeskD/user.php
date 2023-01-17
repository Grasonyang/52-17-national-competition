<?php
    include 'Include.php';
    $db=mysqli_connect("localhost","admin","12345","52");
    $come_url=explode('/',$_SERVER['REQUEST_URI']);
    $come_type=$_SERVER['REQUEST_METHOD'];

    $wrong_Code=new wrong_Code();
    $data_Errorr=new data_Errorr();
    $combine_Url=new combine_Url();
    // $data_In=new data_In();
    // $wrong_Code=new wrong_Code();
    
    if($come_type=='POST'){
        if($come_url[3][0]==':'){
            if($come_url[4]=='profile'){ // 16

            }else if($come_url[4]=='follow'){ // 19

            }
        }else{
            if($come_url[3]=='login'){ // 1
                
            }else if($come_url[3]=='logout'){ // 2
                
            }else if($come_url[3]=='register'){ // 3
                
            }
        }
    }else if($come_type=='GET'){
        echo substr($come_url[4],0,4);
        if(substr($come_url[4],0,4)=='post'){ // 14

        }else if(substr($come_url[4],0,7)=='profile'){ // 15

        }else if(substr($come_url[4],0,6)=='follow'){ // 18
            
        }
    }else if($come_type=='DELETE'){ // 19

    }
?>