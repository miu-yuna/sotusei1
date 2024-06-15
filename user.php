<?php
session_start();
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
include "funcs.php";

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>USERデータ登録</title>

  <style>div{padding: 10px;font-size:16px;}
/*メニュー
---------------------------------------------------------------------------*/
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
.form{
background-color: #69b076;
}
.sent{
background-color: #99ffac;
border: none;
}
</style>
</head>
<body>

<!-- Head[Start] -->
<header>
<?php
include("menu.php");
?>

</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset class="form">
    <legend>ユーザー登録</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>Login ID：<input type="text" name="lid"></label><br>
     <label>Login PW<input type="text" name="lpw"></label><br>
     <label>管理FLG：
      一般<input type="radio" name="kanri_flg" value="0">
      管理者<input type="radio" name="kanri_flg" value="1">
    </label>
    <br>
     <!-- <label>退会FLG：<input type="text" name="life_flg"></label><br> -->
     <input type="submit" value="送信" class="sent">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
