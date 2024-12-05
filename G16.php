<?php
session_start();
unset($_SESSION['goods_id']);
 // 戻るボタンのためのリファラ処理
 $_SESSION['prevPage'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文履歴画面</title>
    <link rel="stylesheet" href=".vscode/CSS/reset.css">
    <link rel="stylesheet" href=".vscode/CSS/header.css">
    <link rel="stylesheet" href=".vscode/CSS/G16.css">
</head>
<body>
<header>
    <a href="G4.php" class="site__name">Stylista</a>
    <form class="search__box" action="G11.php" method="post">
        <input class="search__bar" type="text" name="query" placeholder="アイテムの検索">
        <button type="submit"><i class="search__icon bi bi-search"></i></button>
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
<h2>注文履歴</h2>
<?php
 echo '<form action="',$_SESSION['prevPage'],'" method="get">';
 echo '<button type="submit">戻る</button>';
 echo '</form>';
$pdo = new PDO(
    'mysql:host=mysql309.phy.lolipop.lan;dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024'
);
$stmt = $pdo->prepare("SELECT 
    o.order_id, o.order_date, o.qty, o.pay_status, o.delivery, o.number, o.user_id,
    g.goods_id,g.image, g.goods_name, g.price             
FROM 
    `order` o
JOIN 
    goods g
ON 
    o.goods_id = g.goods_id
WHERE 
    o.number IN (
        SELECT DISTINCT number 
        FROM `order` 
        WHERE user_id = ?
    )
ORDER BY 
    o.number
");

$stmt->execute([$_SESSION['user_id']]);
$goods = $stmt->fetchAll(PDO::FETCH_ASSOC);
$currentNumber = null;
$orderDetails = [];
foreach ($goods as $good) {
    $orderDetails[$good['number']][] = $good;
}

foreach ($orderDetails as $number => $items) {
    // 注文番号ごとの商品情報を表示
    $sum = 0;
    
    // 注文番号ごとに一度だけ配送情報を表示
    echo $items[0]['delivery'], '<br>';  // 注文の最初の商品から配送情報を表示
    
    foreach ($items as $good) {
        echo '<a href="./G6.php?id=',$good['goods_id'],'">';
        echo '<img src="images/'.$good['image'].'" alt="',$good['goods_name'],'" width="150" height="150"></a>';
        echo  $good['goods_name'], '<br>';
        echo '￥', $good['price'], ' / 数量', $good['qty'], '<br>';
        $sum += $good['price'] * $good['qty'];  // 合計金額を計算
        $pay_status = $good['pay_status'];
    }

    // 注文情報を表示
    echo '注文日：', $items[0]['order_date'], '<br>';
    echo '注文番号：', $items[0]['number'], '<br>';
    echo '<hr>';
    echo '合計　￥', $sum,'   ';
    echo  $pay_status, '<br>';
    echo '<hr>';  // 区切り線
}
?>
</body>
</html>
