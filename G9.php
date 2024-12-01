<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/G10.css">
    <title>注文確認画面</title>
</head>
<body>
<header>
        <a href="" class="site__name">Stylista</a>
        <form class="search__box" action="G11.php" method="post">
            <input class="search__bar" type="text" name="query" placeholder="アイテムの検索">
            <button type="submit"><i class="search__icon bi bi-search"></i>
            </button>
        </form>
        <form action="" method="post">
            <button type="submit"><i class="header__icon bi bi-cart"></i></button>
        </form>
        <form action="" method="post">
            <button type="submit"><i class="header__icon bi bi-star"></i></button>
        </form>
        <form action="" method="post">
            <button type="submit"><i class="header__icon bi bi-person"></i></button>
        </form>
    </header>
    <p>注文確認</p>
    <p>配送先住所</p>
    <form action="G10.png" method="post">
    <?
    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024');

    $sql = $pdo->prepare("select * from user where user_id=?");
    $sql->execute([$_SESSION['user_id']]);
    $reviews = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo $reviews['user_name'];
    echo '(',$reviews['user_name_kana'],')';
    echo $reviews['adless_number'];
    echo $reviews['adless'];

    $sql = $pdo->prepare("select goods.image,goods.goods_name,goods.price
 from goods 
 INNER JOIN cart ON cart.goods_id=goods.goods_id where cart.cart_id=?");
 $sql->execute([$_SESSION['cart_id']]);
 $reviews = $sql->fetchAll(PDO::FETCH_ASSOC);
 if ($reviews) {
     foreach ($reviews as $review) {     //商品表示
         $goods_id=$review['goods.goods_id']; 
         echo '<p><img src="images/' . $review['goods.image'] . '"></p>';
         echo '<p>' . $review['goods.goods_name'] . '</p>';
         echo '<p>￥' . $review['goods.price'] . '</p>';
          
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

    <?php
    echo '商品合計：',$_SESSION['$total_qty'],'点';
    echo '￥',$SESSION['$total_amount'];
    ?>

    <button type="submit">注文する</button>
    </form>
</body>
</html>