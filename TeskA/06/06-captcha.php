<?php
    session_start();
    $image=imagecreate(400,200);
    for($i=0;$i<5;$i++){
        imageline($image,rand(0,400),rand(0,200),rand(0,400),rand(0,200),imagecolorallocate($image,rand(0,225),rand(0,225),rand(0,225)));
    }
    $font='C:\xampp\htdocs\ChrustyRock-ORLA.ttf';
    $char="ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789";
    $str=$char[rand(0,strlen($char)-1)].$char[rand(0,strlen($char)-1)].$char[rand(0,strlen($char)-1)].$char[rand(0,strlen($char)-1)];
    for($i=0;$i<4;$i++){
        imagettftext($image,rand(20,40),rand(0,60),$i*50+25,rand(70,150),imagecolorallocate($image,rand(0,225),rand(0,225),rand(0,225)),$font,$str[$i]);
    }
    header('Content-type:image/jpeg');
    imagejpeg($image);
    $_SESSION['code']=$str;
?>