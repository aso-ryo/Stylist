<?php
session_start();
unset($_SESSION['goods_id']);
  // 戻るボタンのためのリファラ処理
  $prevPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'G4.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/G9.css">
    <title>カート内画面</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/G8.css">
    <link rel="stylesheet" href="./css/header.css">
    <script src="cartlist.js" defer></script>
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
            <button type="submit"><i class="bi bi-arrow-left"></i></button>
        </form>
    <p>カート</p>
<?php
 $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
 dbname=LAA1554862-kaihatsu;charset=utf8',
 'LAA1554862',
 'aso2024');

 $sql = $pdo->prepare("select goods.goods_id,goods.image,goods.goods_name,goods.price,cart.qty 
 from goods 
 INNER JOIN cart ON cart.goods_id=goods.goods_id where cart.cart_id=?");
 $sql->execute([$_SESSION['cart_id']]);
 $items = $sql->fetchAll(PDO::FETCH_ASSOC);

            $totalQty = 0;
            $totalAmount = 0;
            echo '<div id="cart">';
            echo '<form action="update_cart.php" method="POST">';

            foreach ($items as $item) {
                $totalQty += $item['qty'];
                $totalAmount += $item['price'] * $item['qty'];

                echo '<div class="cart-item" data-price="' . $item['price'] . '"data-goods-id="'.$item['goods_id'] .'">';
                echo '<a href="./G6.php?id=',$item['goods_id'],'">';
                echo  '<img src="images/' . $item['image'] . '" alt="', $good['category'], '" width="150" height="150"></a>';
                echo '<p>' . $item['goods_name'] . '</p>';
                echo '<p>価格: ￥' . $item['price'] . '</p>';
                echo '<label for="count-' . $item['goods_id'] . '">個数:</label>';
                echo '<select name="count-' . $item['goods_id'] . '" class="item-quantity">';
                for ($i = 1; $i <= 10; $i++) {
                    $selected = $i == $item['qty'] ? 'selected' : '';
                    echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                }
                echo '</select>';
                echo '<form action="cart_delete.php" method="post">';
                echo '<button type="submit" name="delete" value="' . $item['goods_id'] . '">削除</button>';
                echo '</form>';
                echo '</div>';
            }
            echo '<div class="total">';

            echo '<p id="total-qty">商品合計: ' . $totalQty . '点</p>';
            echo '<p id="total-price">合計金額: ￥' . $totalAmount . '</p>';

            echo '</div>';
            ?>
        </div>
        <form action="G9.php" method="post">
        <button type="submit">レジへ進む</button>
        </form>
</body>
</html>