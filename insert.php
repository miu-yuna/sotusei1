<?php

// POSTデータ取得
$user = $_POST["user"];
$title = $_POST["title"];
$text = $_POST["text"];

// 画像ファイルのアップロード処理
$target_dir = "img/"; // 画像ファイルを保存するディレクトリ
$image = $target_dir . basename($_FILES["image"]["name"]); // アップロードされた画像ファイルのパス
move_uploaded_file($_FILES["image"]["tmp_name"], $image); // 画像ファイルを指定したディレクトリに移動


// DB接続

try {
    // データベース名を正しいものに修正し、ホスト、ユーザー名、パスワードを適切に設定します。
   //$pdo = new PDO('mysql:dbname=miuyu_gs_kaeru;charset=utf8;host=mysql57.miuyu.sakura.ne.jp','miuyu','yoikaze1');
   $pdo = new PDO('mysql:dbname=gs_kaeru;charset=utf8;host=localhost','root','');

} catch (PDOException $e) {
    exit('DB_CONECT:'.$e->getMessage());
}


// データ登録SQL作成
$sql = "INSERT INTO kaeru(id,user,title,image,text,indate)
VALUES(NULL,:user,:title,:image,:text,sysdate())";
$stmt = $pdo->prepare($sql);

// バインド変数
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':image', $image, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text', $text, PDO::PARAM_STR);
// 画像ファイルのパスを保存

// データ登録処理後
$status = $stmt->execute();

if($status==false){
    // SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:".$error[2]);
}else{
    // リダイレクト
    header("Location: index.php");
    exit();
}
?>
