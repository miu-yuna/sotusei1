<?php
//1.  DB接続します
session_start();

include("funcs.php");
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM kaeru";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:" . $error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>表示</title>

<style>div{padding: 10px;font-size:16px;}
td{padding-top: 10px; 
}

header{
  text-align: center;
  color: #E3FEF7;
}
/*ロゴ画像設定*/
#logo img {
	width: 400px;	/*画像幅*/
	margin: 40px auto 40px;	/*ロゴの上と下に40pxスペースを空ける設定*/
}


/*メニュー全体を囲むブロック*/
#menubar {
	text-align: center;		/*文字をセンタリング*/
	font-size: 18px;		/*文字サイズ*/
	margin-bottom: 40px;	/*下に空けるスペース*/
}
/*メニュー１個あたりの設定*/
#menubar li {
	display: inline;	/*横並びにする設定*/
}
#menubar li a {
	text-decoration: none;
	padding: 15px 30px;	/*各メニュー内の余白。上下に15px、左右に30pxあけるという意味。*/
}
/*マウスオン時の設定*/
#menubar li a:hover {
	color: #546247;	/*文字色*/
	border-bottom: 4px solid #546247;	/*下線の幅、線種、色*/
}

h2{
	clear: both;
	margin-bottom: 20px;
	color: #fff;		/*文字色*/
	padding: 10px 20px;	/*上下、左右への余白*/
	background: #546247;	/*背景色*/
	border-radius: 10px;	/*角を丸くする指定。この１行を削除すれば角丸がなくなります。*/
}

/*各ブロックごとの設定*/
.table {
	overflow: hidden;
	border-bottom: 1px solid #eff2eb;	/*下線の幅、線種、色*/
	padding: 20px;	/*ボックス内の余白*/
}

/*画像の設定*/
.td img {
	width: 20%;			/*画像幅*/
	float: left;		/*画像を左に回り込み*/
	margin-right: 3%	/*画像の右側に空けるスペース*/
}
body {
	margin: 0px;
	padding: 0px;
	-webkit-text-size-adjust: none;
	color: #666;	/*全体の文字色*/
	font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;	/*フォント種類*/
	font-size: 16px;	/*文字サイズ*/
	line-height: 2;		/*行間*/
	background: #eff2eb;	/*背景色*/
}
</style>



</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
    <?php echo $_SESSION["name"]; ?>さん
    <h1 id="logo"><a href="index.php"><img src="img/logo.jpg" alt="SAMPLE SITE"></a></h1>
 
  
    </div>
    </div>
  </nav>

</header>
<!-- Head[End] -->


<!-- Main[Start] -->

<div>
<nav id="menubar">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="login.php">Login</a></li>
<li><a href="select.php">Gallery</a></li>
<li><a href="user.php">Register</a></li>
</ul>
</nav>
  
<h2>Gallery</h2>

<h3>Form</h3>

<form method="POST" action="insert.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset class="field">
    <legend>form</legend>
    <label>user：<input type="text" name="user"></label><br>
     <label>title：<input type="text" name="title"></label><br>
     <label>画像：<input type="file" name="image"></label><br>
     <label>text：<textarea name="text" rows="4" cols="40"></textarea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>

  

<div class="container jumbotron"></div>
  <?php foreach($values as $value) { ?>
  <table>
  <tr>
    <td><img src="<?=$value["image"]?>" alt="" width="300px" height="300px"></td>
    
    <td>user:<?=$value["user"]?><br>
    種別:<?=$value["title"]?><br>
    text:<?=$value["text"]?></td>
    
    <?php if($_SESSION["kanri_flg"]==1){ ?>
          <td><a href="detail.php?id=<?=$value["id"]?>">[更新]</a></td>
          <td><a href="delete.php?id=<?=$value["id"]?>">[削除]</a></td>
          <?php } ?>
    </tr>
    </table>
    <?php } ?>
  </div>

  <a class="navbar-brand" href="logout.php">ログアウト</a>  
    
<!-- Main[End] -->


<script>
  //JSON受け取り
  //$a = '<?=$json?>';
//const obj = JSON.prase($a);
//console.log(obj);


</script>
</body>
</html>
