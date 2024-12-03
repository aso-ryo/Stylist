<?php
session_start();

$pdo = new PDO(
    'mysql:host=mysql309.phy.lolipop.lan;dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024',
);

// 削除ボタンが押された場合の処理
if (isset($_POST['delete'])) {
    $goods_id = $_POST['delete']; // 削除対象の商品のIDを取得


    $stmt = $pdo->prepare("DELETE FROM cart WHERE cart_id = ? AND goods_id = ?");
    $stmt->execute([$_SESSION['cart_id'], $goods_id]);


    header("Location: G8.php");
    exit;
}
?>