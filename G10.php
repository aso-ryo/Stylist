<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/G10.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>注文確定画面</title>
</head>
<body>
<br><br>
<h1>注文完了</h1>
<br><br>
<p class="kanryou">ご注文ありがとうございました</p>
<?php
$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554862-kaihatsu;charset=utf8',
'LAA1554862',
'aso2024');

$sql = $pdo->prepare("
SELECT goods.goods_id, goods.image, goods.goods_name, goods.price, cart.qty 
FROM goods
INNER JOIN cart ON cart.goods_id = goods.goods_id 
WHERE cart.cart_id = ?
");
$sql->execute([$_SESSION['cart_id']]);
$cart_items = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($cart_items as $item) {
    // 必要な情報を取得
    $goods_id = $item['goods_id'];
    $qty = $item['qty'];
    $user_id = $_SESSION['user_id'];
    $order_date = date('Y-m-d H:i:s');
    $pay_status = '支払い済み';
    $delivery = '準備中';
    $delivery_date = date('Y-m-d', strtotime('+7 days')); // 1週間後に配送予定
    $pay_method = $_POST['pay'];

    // order テーブルへの挿入クエリ
    $insert_sql = $pdo->prepare("
        INSERT INTO `order` 
        (goods_id, order_date, qty, number, pay_status, delivery, delivery_data, pay_method, user_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $insert_sql->execute([
        $goods_id,
        $order_date,
        $qty,
        $pay_status,
        $delivery,
        $delivery_date,
        $pay_method,
        $user_id
    ]);
}
echo 'お支払い日時';
echo $order_date;
echo '到着予定日';
echo $delivery_date;
echo '合計金額';
echo '￥',$SESSION['$total_amount'];

?>
<form action="" mehtod="post">
<button type="submit" class="button">トップページへ戻る</button>


</form>
</body>
</html>
    