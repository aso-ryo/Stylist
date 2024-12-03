<?php
session_start();
error_log('Current session cart_id: ' . $_SESSION['cart_id']);

try {
    $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024');
    
    // POSTデータを受け取る
    $goodsId = isset($_POST['goods_id']) ? $_POST['goods_id'] : null;
    $qty = isset($_POST['qty']) ? $_POST['qty'] : null;

    error_log("Received goods_id: $goodsId, qty: $qty");

    if ($goodsId && $qty !== null && $qty > 0) {
        // カート内の商品数量を更新
        $sql = "UPDATE cart SET qty = :qty WHERE goods_id = :goods_id AND cart_id = :cart_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':qty', $qty, PDO::PARAM_INT);
        $stmt->bindParam(':goods_id', $goodsId, PDO::PARAM_INT);
        $stmt->bindParam(':cart_id', $_SESSION['cart_id'], PDO::PARAM_INT);

        $stmt->execute();
    }
    
    echo 'success'; // 成功時のレスポンス
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
