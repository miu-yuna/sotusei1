<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>

<header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <h4 id="logo"><a href="index.php"><img src="img/logo.jpg" alt="SAMPLE SITE"></a></h1>
 
  
  </div>
  </nav>
</header>

<style>
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


  header {
	text-align: center;	/*内容を中央よせ*/
}


/*ロゴ画像設定*/
#logo img {
	width: 400px;	/*画像幅*/
	margin: 40px auto 40px;	/*ロゴの上と下に40pxスペースを空ける設定*/
}
/*メニュー
---------------------------------------------------------------------------*/
/*メニュー全体を囲むブロック*/
#menubar {
	text-align: center;		/*文字をセンタリング*/
	font-size: 18px;		/*文字サイズ*/
	margin-bottom: 40px;	/*下に空けるスペース*/
    border-bottom: #546247;
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

</style>

<body>
 

<nav id="menubar">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="login.php">Login</a></li>
<li><a href="select.php">Gallery</a></li>
<li><a href="user.php">New</a></li>
</ul>
</nav>



</body>
</html>