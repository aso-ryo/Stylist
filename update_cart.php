<?php
session_start();

try {
    $pdo = new PDO('mysql:host=mysql309.phy.lolipop.lan;dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024');
    
    // POSTデータを受け取る
    $goodsId = isset($_POST['goods_id']) ? $_POST['goods_id'] : null;
    $qty = isset($_POST['qty']) ? $_POST['qty'] : null;
    $totalQty = isset($_POST['totalQty']) ? $_POST['totalQty'] : null;
    $totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : null;

    // データを確認（デバッグ用）
    error_log("Received goods_id: $goodsId, qty: $qty");

    if ($goodsId && $qty !== null && $qty > 0) {
        // カート内の商品数量を更新
        $sql = "UPDATE cart SET qty = :qty WHERE goods_id = :goods_id AND cart_id = :cart_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':qty', $qty, PDO::PARAM_INT);
        $stmt->bindParam(':goods_id', $goodsId, PDO::PARAM_INT);
        $stmt->bindParam(':cart_id', $_SESSION['cart_id'], PDO::PARAM_INT);

        // SQLの実行
        if ($stmt->execute()) {
            $_SESSION['total_qty'] = $totalQty;
            $_SESSION['total_amount'] = $totalPrice;
            error_log("Successfully updated cart for goods_id: $goodsId");
            echo 'success'; // 成功時のレスポンス
        } else {
            error_log("Failed to execute the query for goods_id: $goodsId");
            echo 'Error: Failed to update cart';
        }
    } else {
        echo 'Invalid data';
    }
} catch (PDOException $e) {
    error_log('Database error: ' . $e->getMessage());
    echo 'Error: ' . $e->getMessage();
}
?>

