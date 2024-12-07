<?php
    session_start();


    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
                dbname=LAA1554862-kaihatsu;charset=utf8',
                'LAA1554862',
                'aso2024');

    $sql = $pdo->prepare("select cart_id from cart where goods_id=?");
    $sql->execute([$_SESSION['goods_id']]);
    $cart_goods = $sql->fetchColumn();
    if($cart_goods=== false){       //同じ商品がカートに入ってないとき
        $sql = "INSERT INTO cart (cart_id, goods_id,user_id,qty) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$_SESSION['cart_id'],$_SESSION['goods_id'],$_SESSION['user_id'],1]);
            if ($result) {
                $_SESSION['message'] = 'カートに入れました。';
                $sql = "UPDATE stock SET stock = stock - 1 WHERE goods_id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['goods_id']]);
            } else {
                $_SESSION['message'] = 'データ挿入に失敗しました。';
            }      
    }else{      //入っている時、個数を＋１する
        $sql = "UPDATE cart SET qty = qty + 1 WHERE cart_id = ?";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$_SESSION['cart_id']]);
            if ($result) {
                $_SESSION['message'] = 'カートに入れました。';
                $sql = "UPDATE stock SET stock = stock - 1 WHERE goods_id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['goods_id']]);
            } else {
                $_SESSION['message'] = 'データ挿入に失敗しました。';
            } 
            
        }
        header('Location:G6.php');
        exit;
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <title>カート追加画面</title>
    <link rel="stylesheet" href=".vscode/CSS/reset.css">
    <link rel="stylesheet" href=".vscode/CSS/header.css">
    <link rel="stylesheet" href=".vscode/CSS/G7.css">
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

</body>
</html>