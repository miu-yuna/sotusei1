
<?php

//ファイルが送信されていない場合はエラー処理
if(!isset($_FILES['image'])){
    echo 'ファイルが送信されていません。';
    exit;
}

//ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
$save = 'img/' . basename($_FILES['image']['name']);

//move_uploaded_fileで、一時ファイルを保存先ディレクトリに移動させる
if(move_uploaded_file($_FILES['image']['tmp_name'], $save)){
    echo 'アップロード成功！';
}else{
    echo 'アップロード失敗！';
}

?>