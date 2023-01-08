<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="jquery-3.5.1.min.js"></script>
  <script src="jquery-ui.js"></script>
  <link rel="stylesheet" href="jquery-ui.min.css">
  <link rel="stylesheet" href="main.css">
  <title>Document</title>
</head>

<body>
  <div class="header">
    <div class="LOGO">
      <img src="" alt="LOGO.img">
    </div>
  </div>
  <div class="ICONS">
    <div class="eff ICON">GWTN</div>
    <div class="eff ICON">首頁</div>
    <div class="eff ICON">最新旅遊消息</div>
    <div class="eff ICON">熱門旅遊景點</div>
    <div class="eff ICON">相關連結</div>
    <div class="ICON">
      <button onclick="placeopen(0)" class="allICON">功能</button>
      <button onclick="placeopen(1)">景點篩選條件設定區</button>
      <button onclick="placeopen(2)">熱門旅遊景點</button>
    </div>
  </div>
  <div class="main">
    <div class="slogan"></div>
    <div class="playplace">
      <div class="playplace-title">最新旅遊消息區</div>
      <div class="detail">
        <div class="detail-LEFT">
          <img src="" alt="trip"><br>
          <span>旅遊景點名稱</span><br>
          <span>電話</span><br>
          <span>地址</span><br>
          <span>官方網站</span><br>
          <span>評價</span><br>
        </div>
        <div class="detail-RIGHT">
          <div class="RIGHTs"><img src="" alt="1"></div>
          <div class="RIGHTs"><img src="" alt="2"></div>
          <div class="RIGHTs"><img src="" alt="3"></div>
        </div>
      </div>
      <!-- <div class="news">
        <div class="newsx news1">
          <img src="" alt="scence">
          <span>content</span><br>
          <span>交通資訊</span><br>
          <span><a href="#">相關連結</a></span><br>
        </div>
        <div class="newsx news2">
          <img src="" alt="scence">
          <span>content</span><br>
          <span>交通資訊</span><br>
          <span><a href="#">相關連結</a></span><br>
        </div>
        <div class="newsx news3">
          <img src="" alt="scence">
          <span>content</span><br>
          <span>交通資訊</span><br>
          <span><a href="#">相關連結</a></span><br>
        </div>
      </div> -->
    </div>
  </div>
  <div class="buttom">
    <div class="buttom-content">
      <div>相關連結</div>
      <span>About</span>
    </div>
  </div>

  <div class="place">
    <div class="eff">GWTN</div>
    <div class="eff">首頁</div>
    <div class="eff">最新旅遊消息</div>
    <div class="eff">熱門旅遊景點</div>
    <div class="eff">相關連結</div>
  </div>
  <div class="place">
    <form action="" method="POST">
      <select name="from" id="from">
        <option value="1">1111</option>
        <option value="2">2222</option>
      </select>
      <select name="to" id="to">
        <option value="3">3333</option>
        <option value="4">4444</option>
      </select>
    </form>
  </div>
  <div class="place">
    <table border="1">
      <tr>
        <td>排名</td>
        <td>地點</td>
        <td>詳細資訊</td>
      </tr>
      <tr>
        <td>1</td>
        <td>1111</td>
        <td><a href="#">1.com</a></td>
      </tr>
      <tr>
        <td>2</td>
        <td>2222</td>
        <td><a href="#">2.com</a></td>
      </tr>
    </table>
  </div>
</body>
<script>
  $(".place").dialog({
    autoOpen: false,
    height: $(".news").height(),
    width: $(".news").width(),
  });
  $(".RIGHTs")
  let aa = '<?php echo $_GET['pg'] ?>';
  let cpmearray1 = {
    "1": "主頁"
  }
  let cpmearray2 = {
    "1": "index.php"
  }
  for (let i = 0; i < aa.length; i++) {
    $(".slogan").append(`
      <a href='${cpmearray2[aa[i]]}'>${cpmearray1[aa[i]]}</a>/
    `);
  }

  function placeopen(open) {
    $(".place").dialog("close");
    $(".place:eq(" + open + ")").dialog("open");
  }
</script>

</html>