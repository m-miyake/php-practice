<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規登録確認 | スタッフ情報</title>
</head>
<body>
    <main>
        <h1>スタッフ新規登録確認</h1>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/common/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/common/functions.php');

$post = sanitize($_POST);
$name = $post['name'];
$pass = $post['pass'];
$pass2 = $post['pass2'];

if($name === '')
{
    print 'スタッフ名が入力されていません。<br>';
}
else
{
    print 'スタッフ名：';
    print $name;
    print '<br>';
}

if($pass === '')
{
    print 'パスワードが入力されていません。<br>';
}

if($pass !== $pass2)
{
    print 'パスワードが一致しません。<br>';
}

if($name === '' || $pass === '' || $pass !== $pass2)
{
    print '<form>';
    print '<button type="button" onclick="history.back()">戻る</button>';
    print '</form>';
}
else
{
    $pass = md5($pass);
    print '<form method="post" action="done.php">';
    print '<input type="hidden" name="name" value="'.$name.'">';
    print '<input type="hidden" name="pass" value="'.$pass.'">';
    print '<br>';
    print '<button type="button" onclick="history.back()">戻る</button>';
    print '<button type="submit">OK</button>';
    print '</form>';
}
?>
    </main>
</body>
</html>
