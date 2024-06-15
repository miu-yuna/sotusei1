<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">

<style>
.navbar{
  clear: both;
	margin-bottom: 20px;
	color: #fff;		/*文字色*/
	padding: 10px 20px;	/*上下、左右への余白*/
	background: #546247;	/*背景色*/
	border-radius: 10px;	/*角を丸くする指定。この１行を削除すれば角丸がなくなります。*/ 
}

</style>
<title>ログイン</title>
</head>
<body>

<header>
  
</header>
<?php
include("menu.php");
?>

<nav class="navbar navbar-default" >LOGIN</nav>
<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid">
PW:<input type="password" name="lpw">
<input type="submit" value="ログイン">
</form>


</body>
</html>