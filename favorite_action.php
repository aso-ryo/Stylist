<?php
//お気に入り登録のバックエンドファイルです
    session_start();
    
    $pdo = new PDO(
        'mysql:host=mysql309.phy.lolipop.lan;dbname=LAA1554862-kaihatsu;charset=utf8',
        'LAA1554862',
        'aso2024'
    );
    try {
        // お気に入り登録済みか確認
        $sql = $pdo->prepare("SELECT id FROM favorite WHERE user_id = ? AND goods_id = ?");
        $sql->execute([$_SESSION['user_id'], $_SESSION['goods_id']]);
        $favorite = $sql->fetch();
    
        if ($favorite) {
            // 登録済みの場合は削除
            $sql = $pdo->prepare("DELETE FROM favorite WHERE user_id = ? AND goods_id = ?");
            $sql->execute([$_SESSION['user_id'], $_SESSION['goods_id']]);
            $is_favorited = false;
        } else {
            // 未登録の場合は登録
            $sql = $pdo->prepare("INSERT INTO favorite (user_id, goods_id) VALUES (?, ?)");
            $sql->execute([$_SESSION['users_id'], $_SESSION['goods_id']]);
            $is_favorited = true;
        }
    
    echo json_encode(['success' => true, 'is_favorited' => $is_favorited]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'データベースエラーが発生しました。']);
}
?>