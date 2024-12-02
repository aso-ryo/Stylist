<?php
    session_start();
    unset($_SESSION['goods_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ画面</title>
    <link rel="stylesheet" href=".vscode/CSS/reset.css">
    <link rel="stylesheet" href=".vscode/CSS/header.css">
    <link rel="stylesheet" href=".vscode/CSS/G13.css">
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
    <?php
        $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
                    dbname=LAA1554862-kaihatsu;charset=utf8',
                    'LAA1554862','aso2024');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
        $sql = $pdo->prepare("
        SELECT goods.goods_id, goods.image, goods.category
        FROM goods
        INNER JOIN favorite ON goods.goods_id = favorite.goods_id
        WHERE favorite.user_id = ? LIMIT 6;
        ");
        $sql->execute([$_SESSION['user_id']]); 
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $item) {
            echo '<a href="./G6.php?id=',$item['goods_id'],'">';
            echo '<img src="images/' . $item['image'] . '" alt="Product Image" width="150" height="150"></a>';
            echo $item['category'] . '<br>';
}

        ?>  
    <a href="G12.php">すべて見る</a>

    <p>お知らせ</p>
    <img src="" alt="1">セール
    <hr>
    <img src="" alt="2">タイムセール
    <hr>
    <img src="" alt="3">人気アイテム
    <hr>
    <img src="" alt="4">インテリア
    <hr>

    <p>会員登録情報</p>
    <form action="G13.php" method="post">
    <button type="submit">会員登録の確認・変更</button>
    </form>
    <form action="G16.php" method="post">
    <button type="submit">購入履歴</button>
    </form>
    <form action="G17.php" method="post">
    <button type="submit">ログアウト</button>
    </form>
</body>
</html>