<?php
//お気に入り登録のバックエンドファイルです
    session_start();
    if (
        isset($_POST['user_name']) && isset($_POST['user_name_kana']) &&
        isset($_POST['e-mail']) && isset($_POST['password']) &&
        isset($_POST['birthday']) && isset($_POST['adless_number']) &&
        isset($_POST['adless']) && isset($_POST['tell']) &&
        isset($_POST['cart_id'])
    ) {
        $_SESSION['user_id'] = $_POST['cart_id'];
        $_SESSION['name'] = $_POST['user_name'];
        $_SESSION['name_kana'] = $_POST['user_name_kana'];
        $_SESSION['mail'] = $_POST['e-mail'];
        $_SESSION['pass'] = $_POST['password'];
        $_SESSION['birthday'] = $_POST['birthday'];
        $_SESSION['yuubin'] = $_POST['adless_number'];
        $_SESSION['juusyo'] = $_POST['adless'];
        $_SESSION['tell'] = $_POST['tell'];
        $_SESSION['cart_id'] = $_POST['cart_id'];
    }

    $pdo = new PDO(
        'mysql:host=mysql309.phy.lolipop.lan;dbname=LAA1554862-kaihatsu;charset=utf8',
        'LAA1554862',
        'aso2024'
    );
    try {
        // お気に入り登録済みか確認
        $sql = $pdo->prepare("SELECT id FROM favorite WHERE user_id = ? AND goods_id = ?");
        $sql->execute([$user_id, $goods_id]);
        $favorite = $sql->fetch();
    
        if ($favorite) {
            // 登録済みの場合は削除
            $sql = $pdo->prepare("DELETE FROM favorite WHERE user_id = ? AND goods_id = ?");
            $sql->execute([$user_id, $goods_id]);
            $is_favorited = false;
        } else {
            // 未登録の場合は登録
            $sql = $pdo->prepare("INSERT INTO favorite (user_id, goods_id) VALUES (?, ?)");
            $sql->execute([$user_id, $goods_id]);
            $is_favorited = true;
        }
    
    echo json_encode(['success' => true, 'is_favorited' => $is_favorited]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'データベースエラーが発生しました。']);
}
?>