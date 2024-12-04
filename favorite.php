<?php
session_start();
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}

// 現在のページのURLを記録
$currentURL = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (empty($_SESSION['history']) || end($_SESSION['history']) !== $currentURL) {
    $_SESSION['history'][] = $currentURL;

    // 履歴が多すぎる場合は古いものを削除
    if (count($_SESSION['history']) > 10) {
        array_shift($_SESSION['history']);
    }
}
$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554862-kaihatsu;charset=utf8',
'LAA1554862',
'aso2024');

$sql = $pdo->prepare("SELECT * FROM favorite WHERE user_id = ? AND goods_id = ?");
$sql->execute([$_SESSION['user_id'], $_SESSION['goods_id']]);
$favorite = $sql->fetch();

if ($favorite) {
        // すでにお気に入りに登録されている場合は削除
        $sql = $pdo->prepare("DELETE FROM favorite WHERE user_id = ? AND goods_id = ?");
        $sql->execute([$_SESSION['user_id'], $_SESSION['goods_id']]);
        $is_favorited = false;
        header('Location: G6.php');
        exit;
    } else {
        // お気に入りに追加
        $sql = $pdo->prepare("INSERT INTO favorite (user_id, goods_id) VALUES (?, ?)");
        $sql->execute([$_SESSION['user_id'], $_SESSION['goods_id']]);
        $is_favorited = true;
        header('Location: G6.php');
        exit;
}
?>