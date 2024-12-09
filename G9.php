<?php
session_start();
// 戻るボタンのためのリファラ処理
$prevPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'G4.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文確認画面</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/G9.css">
</head>
<body>
<header>
        <a href="G4.php" class="site__name">Stylista</a>
        <form class="search__box" action="G11.php" method="post">
            <input class="search__bar" type="text" name="query" placeholder="アイテムの検索">
            <button type="submit"><i class="search__icon bi bi-search"></i>
            </button>
        </form>
        <form action="G8.php" method="post">
            <button type="submit"><i class="header__icon bi bi-cart"></i></button>
        </form>
        <form action="G12.php" method="post">
            <button type="submit"><i class="header__icon bi bi-star"></i></button>
        </form>
        <form action="G13.php" method="post">
            <button type="submit"><i class="header__icon bi bi-person"></i></button>
        </form>
    </header>

    <form action="<?php echo $prevPage; ?>" method="get">
            <button type="submit">戻る</button>
        </form>

    <p>注文確認</p>
    <p>配送先住所</p>
    <form action="G10.php" method="post">
    <?php
    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024');

    $sql = $pdo->prepare("select * from user where user_id=?");
    $sql->execute([$_SESSION['user_id']]);
    $reviews = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($reviews as $row) {
        echo $row['user_name'];
        echo '(',$row['user_name_kana'],')';
        echo $row['adless_number'];
        echo $row['adless'];
     }

    $sql = $pdo->prepare("SELECT goods.goods_id AS id, goods.image AS image, goods.goods_name AS name, goods.price AS price,cart.qty AS qty 
    FROM goods INNER JOIN cart 
    ON cart.goods_id = goods.goods_id 
    WHERE cart.cart_id = ?
    ");
 $sql->execute([$_SESSION['cart_id']]);
 $reviews = $sql->fetchAll(PDO::FETCH_ASSOC);
 
 if ($reviews) {
     foreach ($reviews as $review) {
        $price = (float)$review['price']; // 明示的に数値に変換
        $qty = (int)$review['qty']; // 明示的に数値に変換
        $subtotal = $price * $qty;

         echo '<img src="images/' . $review['image'].'" alt="商品画像">';
         echo $review['name'];
         echo '￥' . number_format($subtotal);
         echo '<br>';
     }
 }
?>
    支払い方法
    <select name="pay">
        <option value="クレジットカード">クレジットカード</option>
        <option value="代金引換">代金引換</option>
        <option value="コンビニ支払い">コンビニ支払い</option>
        <option value="キャリア支払い">キャリア支払い</option>
    </select>
    <br>
    <?php
    echo '商品合計：',$_SESSION['total_qty'],'点<br>';
    echo '￥',$_SESSION['total_amount'];
    ?>

    <button type="submit">注文する</button>
    </form>
</body>
</html>