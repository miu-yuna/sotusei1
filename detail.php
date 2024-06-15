<?php
$id = $_GET["id"];
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM kaeru WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$v =  $stmt->fetch(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>

  <style>
    div{padding: 10px;font-size:16px;}

    header{
  background-color: #135D66;
  color: #E3FEF7;}

.field{
    background-color: #E3FEF7;
  }
  </style>
</head>
<body>

<!-- Head[Start] -->

<header>

    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">更新</a></div>
    
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php" >
  <div class="jumbotron">
   <fieldset class="field">
    <legend>けろテラリウム</legend>
    <label>user：<input type="text" name="user" value="<?=$v["user"]?>"></label><br> 
    <label>title：<input type="text" name="title" value="<?=$v["title"]?>"></label><br>
    <label>text：<textarea name="text" rows="4" cols="40"><?=$v["text"]?></textarea></label><br>
     <input type="hidden" name="id" value="<?=$v["id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>


</body>
</html>


