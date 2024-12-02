<?php
session_start();

$_SESSION = array();

if (isset($_COOKIE['PHPSESSID'])) {
    setcookie('PHPSESSID', '', time() - 1800, '/');
}

session_destroy();

echo '<form action="G1.php" method="post">';
$message= 'ログアウトしました';
echo '</form>';

echo '<a href="tina10-2login_in.php">loginへ戻る</a>';
?>

    <title>ログアウト画面</title>
    <link rel="stylesheet" href=".vscode/CSS/reset.css">
    <link rel="stylesheet" href=".vscode/CSS/G17.css">
