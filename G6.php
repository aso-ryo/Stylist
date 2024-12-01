<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細画面</title>
    
</head>
<body>
    
Stylista
    <input type="text" name="query" placeholder="アイテムの検索">
    <button type="submit">検索</button>
    <button type="submit" name="kato"></button>
    <button type="submit" name="favorite"></button>
    <button type="submit" name="mypage"></button>
<?
    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
                dbname=LAA1554862-kaihatsu;charset=utf8',
                'LAA1554862',
                'aso2024');

        echo '<form action="G8.php" method="post">';

        $sql = $pdo->prepare("select * from goods where goods_id=?");
        $sql->execute([$_POST['id']]);
        $reviews = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($reviews) {
            foreach ($reviews as $review) {     //商品表示
                $goods_id=$review['goods_id']; 
                echo '<p><img src="' . $review['image'] . '"></p>';
                echo '<p>' . $review['goods_name'] . '</p>';
                echo '<p>' . $review['price'] . '</p>';
                echo '<p>' . $review['explain'] . '</p>';
                 
            }
        }

        echo '<input type="submit" value="カートにいれる">';
        echo '</form>';

        //お気に入り登録
        if (isset($_SESSION['user_id'], $goods_id)) {
            $user_id = $_SESSION['user_id'];
        
            // ユーザーがお気に入り登録済みかチェック
            $sql = $pdo->prepare("SELECT COUNT(*) FROM favorite WHERE user_id = ? AND goods_id = ?");
            $sql->execute([$user_id, $goods_id]);
            $is_favorited = $sql->fetchColumn() > 0;
        }
        
            // ボタン表示
            echo '<button id="favorite-' . $goods_id . '" onclick="toggleFavorite(' . $goods_id . ')">';
            echo $is_favorited ? '★' : '☆';
            echo '</button>';

        $sql = $pdo->prepare("select stock from stock where goods_id=?");
        $sql->execute([$goods_id]);
        $stock = $sql->fetchColumn();
        if ($stock !== false && $stock > 0) {
            echo "在庫あり: $stock 個";
        } else {
            echo "在庫なし";
        }

?>
<script src="favorite.js" defer></script>
</body>
</html>