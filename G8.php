<?php
session_start();
    if(isset($_POST['user_name'])&&isset($_POST['user_name'])&&isset($_POST['user_name_kana'])&&isset($_POST['e-mail'])&&isset($_POST['password'])&&isset($_POST['birthday'])&&isset($_POST['adless_number'])&&isset($_POST['adless'])&&isset($_POST['tell'])&&isset($_POST['cart_id'])){
        $_SESSION['user_id']=$_POST['cart_id'];
        $_SESSION['name']=$_POST['name'];
        $_SESSION['name_kana']=$_POST['name_kana'];
        $_SESSION['mail']=$_POST['mail'];
        $_SESSION['pass']=$_POST['pass'];
        $_SESSION['birthday']=$_POST['birthday'];
        $_SESSION['yuubin']=$_POST['yuubin'];
        $_SESSION['juusyo']=$_POST['juusyo'];
        $_SESSION['tell']=$_POST['tell'];
        $_SESSION['cart_id']=$_POST['cart_id'];
       }
       ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/G9.css">
    <title>カート内画面</title>
</head> 
<body>
Stylista
    <input type="text" name="query" placeholder="アイテムの検索">
    <button type="submit">検索</button>
    <button type="submit" name="kato"></button>
    <button type="submit" name="favorite"></button>
    <button type="submit" name="mypage"></button>
    <p>カート</p>
<form action="G9" method="post">
<?php
 $sql = $pdo->prepare("select goods.image,goods.goods_name,goods.price,cart.qty 
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
         //個数
         echo '<select name="count">';
         echo '<option value="">',$review['cart.qty'],'</option>';
        for($i=1;$i<=10;$i++){
            echo '<option value="">',$i,'</option>';
        }
        
        echo '</select>';

         echo '<button type="submit">削除</button>';
          
     }
 }
 $sql = $pdo->prepare("
    SELECT SUM(qty) AS total_qty
    FROM goods 
    INNER JOIN cart 
    ON cart.goods_id = goods.goods_id 
    WHERE cart.cart_id = ?
");
$sql->execute([$_SESSION['cart_id']]);
$total_qty = $sql->fetch(PDO::FETCH_ASSOC)['total_qty'];
echo '商品合計：',$total_qty,'点';
$_SESSION['$total_qty']=$total_qty;
$sql = $pdo->prepare("
SELECT SUM(c.qty * g.price) AS total_amount
FROM goods g
JOIN cart c ON c.goods_id = g.goods_id
WHERE c.cart_id = ?;");
$sql->execute([$_SESSION['cart_id']]);
$total_amount = $sql->fetch(PDO::FETCH_ASSOC)['total_amount'];
echo '￥',$total_amount;
$_SESSION['$total_amount']=$total_amount;

?>

    <button type="submit">レジへ進む</button>
    </form>
</body>
</html>