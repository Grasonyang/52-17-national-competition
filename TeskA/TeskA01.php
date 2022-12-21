<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.3.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="shortcut icon" href="#"> <!-- fix 404 Error -->
    <title>Document</title>
</head>
<style>
    .wrapper{
        display:grid;
        grid-template-columns:100px 150px 70px 50px 20px 70px;
        grid-template-rows:repeat(5,50px) 100px 50px;
        grid-gap:2px;
    }
    .box{
        border:2px white solid;
    }
    .box1{
        grid-area:1/1/2/3;
        background-color:#fed531;
    }
    .box2{
        background-color:#fdc1cb;
    }
    .box3{
        grid-area:1/4/2/6;
        background-color:#fdc1cb;
    }
    .box4{
        background-color:#fdc1cb;
    }
    .box5{
        grid-area:2/1/3/5;
        background-color:#afd8e5;
    }
    .box6{
        grid-area:2/5/4/7;
        background-color:#fcaa4c;
    }
    .box7{
        grid-area:3/1/7/2;
        background-color:#97ec94;
    }
    .box8{
        grid-area:3/2/5/5;
        background-color:#d3d3d3;
    }
    .box9{
        grid-area:4/5/6/7;
        background-color:#1c7e12;
    }
    .box10{
        grid-area:5/2/7/5;
        background-color:#fffc38;
    }
    .box11{
        grid-area:6/5/7/7;
        background-color:#db50f8;
    }
    .box12{
        grid-area:7/1/8/7;
        background-color:#a08880;
    }
</style>
<body>
    <div class="wrapper">
        <div class="box box1">Site Title</div>
        <div class="box box2">Nav 1</div>
        <div class="box box3">Nav 2</div>
        <div class="box box4">Nav 3</div>
        <div class="box box5">Post Title</div>
        <div class="box box6">Side Bar</div>
        <div class="box box7">Post Meta</div>
        <div class="box box8">Main Content</div>
        <div class="box box9">Ads</div>
        <div class="box box10">Main Content Image</div>
        <div class="box box11">Other Stuffs</div>
        <div class="box box12">@2018 footer</div>
    </div>
</body>
</html>
