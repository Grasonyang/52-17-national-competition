<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="src/jquery-3.6.4.min.js"></script>
    <script src="src/jquery-ui.js"></script>
    <link rel="stylesheet" href="src/jquery-ui.css">
    <link rel="shortcut icon" href="#">
    <title>Document</title>
</head>
<body>
    <button onclick="logout()">登出</button>
    <script src="src/all.js"></script>
</body>
<script>
    function logout(){
        let token = localStorage.getItem("token");
        
        console.log(token);
    }
</script>
</html>