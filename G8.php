<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/G9.css">
    <title>カート内画面</title>
    <script src="cart.js" defer></script>
</head>
<body>
Stylista
    <input type="text" name="query" placeholder="アイテムの検索">
    <button type="submit">検索</button>
    <button type="submit" name="kato"></button>
    <button type="submit" name="favorite"></button>
    <button type="submit" name="mypage"></button>
    <p>カート</p>
<form action="G9.php" method="post">
<?php
 $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
 dbname=LAA1554862-kaihatsu;charset=utf8',
 'LAA1554862',
 'aso2024');

 $sql = $pdo->prepare("select goods.image,goods.goods_name,goods.price,cart.qty 
 from goods 
 INNER JOIN cart ON cart.goods_id=goods.goods_id where cart.cart_id=?");
 $sql->execute([$_SESSION['cart_id']]);
 $items = $sql->fetchAll(PDO::FETCH_ASSOC);

            $totalQty = 0;
            $totalAmount = 0;

            foreach ($items as $item) {
                $totalQty += $item['qty'];
                $totalAmount += $item['price'] * $item['qty'];

                echo '<div class="cart-item" data-price="' . $item['price'] . '">';
                echo '<p><img src="images/' . $item['image'] . '" alt="商品画像"></p>';
                echo '<p>' . $item['goods_name'] . '</p>';
                echo '<p>価格: ￥' . $item['price'] . '</p>';
                echo '<label for="count-' . $item['goods_id'] . '">個数:</label>';
                echo '<select name="count-' . $item['goods_id'] . '" class="item-quantity">';
                for ($i = 1; $i <= 10; $i++) {
                    $selected = $i == $item['qty'] ? 'selected' : '';
                    echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                }
                echo '</select>';
                echo '<button type="submit" name="delete" value="' . $item['goods_id'] . '">削除</button>';
                echo '</div>';
            }

            echo '<p id="total-qty">商品合計: ' . $totalQty . '点</p>';
            echo '<p id="total-price">合計金額: ￥' . $totalAmount . '</p>';

            $_SESSION['total_qty'] = $totalQty;
            $_SESSION['total_amount'] = $totalAmount;
            ?>
        </div>
        <button type="submit">レジへ進む</button>
    </form>
</body>
</html>