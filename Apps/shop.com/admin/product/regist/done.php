<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) === false) {
    print 'ログインされていません。<br>';
    print '<a href="/admin/login/">ログイン画面へ</a>';
    exit();
}
else {
    print $_SESSION['staff_name'];
    print 'さんログイン中<br>';
    print '<br>';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>登録完了 | 商品情報</title>
</head>
<body>
<main>
    <h1>商品登録完了画面</h1>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/common/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/common/functions.php');

    $post = sanitize($_POST);
    $name = $post['name'];
    $price = $post['price'];
    $photo1 = $post['photo1'];

    $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8';
try {
    $dbh = new PDO($dsn,DB_USER,DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO mst_product (name,price,photo1) VALUES (?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $name;
    $data[] = $price;
    $data[] = $photo1;
    $stmt->execute($data);

    $dbh = null;

    print $name;
    print 'を追加しました。<br>';
}
catch(Exception $e) {
    // echo $e;
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}
?>
    <a href="/admin/product">戻る</a>
</main>
</body>
</html>
