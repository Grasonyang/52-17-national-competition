<?php
    include 'Include.php';
    $come_url=explode('/',$_SERVER['REQUEST_URI']);
    $come_type=$_SERVER['REQUEST_METHOD'];

    // $eor_val=new Errorr();

    if($come_type=='POST'){
        if($come_url[3][0]==':'){
            if($come_url[4]=='favorite'){ // 9

            }else if($come_url[4]=='comment'){ // 11 12
                if($come_url[5][0]==':'){ // 12

                }else{ // 11

                }
            }else{ // 7

            }
        }else{ // 6
            
        }
    }else if($come_type=='GET'){
        if(substr($come_url[3],0,6)=='public'){ // 4

        }else if(substr($come_url[3],0,8)=='favorite'){ // 10

        }else if(substr($come_url[3],0,1)==':'){ // 5
            
        }
    }else if($come_type=='DELETE'){ // 19
        if($come_url[4]=='comment'){ // 13

        }else{ // 8

        }
    }
?>