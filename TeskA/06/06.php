<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.3.min.js"></script>
    <script src="jquery-ui.js"></script>
    <link rel="stylesheet" href="jquery-ui.css">
    <title>Document</title>
</head>
<style>
</style>
<body>
    <img src="06-captcha.php" alt=""><br>
    <form action="06.php" method="POST">
        <input type="text" name="code" id="code"><br>
        <input type="submit">
    </form>
    <div id="sett"></div>
    <?php
        if(!empty($_POST)){
            if($_POST['code']==$_SESSION['code']){
                echo "
                    <script>
                        $('#sett').append(`
                            <span style='font-size:48px;font-weight: 200;color:#008800;'>成功</span>
                        `);
                    </script>
                ";
            }else{
                echo "
                <script>
                    $('#sett').append(`
                        <span style='font-size:48px;font-weight: 200;color:#880000。;'>失敗</span>
                    `);
                </script>
            ";
            }
        }
    ?>
</body>

</html>