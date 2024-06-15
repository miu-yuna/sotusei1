<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>画像送信テスト</title>
</head>
<body>

<form action="image_post.php" method="POST" enctype="multipart/form-data">
    <p>
        <input type="file" name="image">
    </p>
    <p>
        <input type="submit" value="送信する">
    </p>
</form>

</body>