
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更


//３．データ登録SQL作成


// // 画像をアップロードする
// $target_dir = "img/"; // 画像を保存するディレクトリ
// //$image_name = $_FILES["image"]["name"]; // アップロードされた画像のファイル名
// $image = $target_dir . basename($_FILES["image"]["name"]); // アップロードされた画像ファイルのパス
// move_uploaded_file($_FILES["image"]["tmp_name"], $image); // 画像ファイルを指定したディレクトリに移動


// // 画像が選択されているかを確認
// if (!empty($image)) {
//     $image_path = $upload_dir . $image_name; // アップロードされた画像の保存先パス

//     // 画像を指定のディレクトリに移動します
//     if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
//         echo "画像のアップロードが完了しました。";
//     } else {
//         echo "画像のアップロードに失敗しました。";
//     }
// } else {
//     // 画像がアップロードされていない場合は、元の画像パスを保持します
//     $image_path = null;
// }


// // 更新処理
// if (isset($_POST['update_button'])) {
//     // 画像削除フラグがセットされているかを確認し、セットされていない場合は元の画像パスを保持
//     if (!isset($_POST['delete_image_flag'])) {
//         // 元の画像パスを取得
//         $id = $_POST["id"];
//         include("funcs.php");
//         $pdo = db_conn();
//         $sql_get_image_path = "SELECT image_path FROM jd_an_table2 WHERE id=:id";
//         $stmt = $pdo->prepare($sql_get_image_path);
//         $stmt->bindValue(':id', $id, PDO::PARAM_INT);
//         $stmt->execute();
//         $original_image_path = $stmt->fetchColumn();
//         // 画像パスがセットされていない場合は、フォームからの値を代入
//         $image_path = empty($_POST['image_path']) ? $original_image_path : $_POST['image_path'];
//     }
 

<?php

// POSTデータ取得
$user = $_POST["user"];
$title = $_POST["title"];
$text = $_POST["text"];
$id = $_POST["id"];


// DB接続
session_start();

include("funcs.php");
sschk();
$pdo = db_conn();


// データ登録SQL作成
$sql = "UPDATE kaeru SET user=:user, title=:title,  text=:text WHERE id=:id"; // カンマの位置を修正
$stmt = $pdo->prepare($sql);

// バインド変数
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':text', $text, PDO::PARAM_STR);
$stmt->bindValue(':id',  $id,    PDO::PARAM_INT); 

// データ登録処理後
$status = $stmt->execute();

if($status==false){
    // SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:".$error[2]);
}else{
    // リダイレクト
    header("Location: select.php");
    exit();
}

?>
