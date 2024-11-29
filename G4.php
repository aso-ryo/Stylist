<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/G4.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>トップページ</title>
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


    <div class="image-topp">
        <img src="./images/トップページ画像１.png" alt="画像1">
        <img src="./images/トップページ画像２.png" alt="画像2">
    </div><br>

    <section class="main__container">
        <div class="category__container">
            <h3>カテゴリーから探す</h3>
            <a href="./G5.php">トップス</a>
            <a href="./G5.php">アウター</a>
            <a href="./G5.php">パンツ</a>
            <a href="./G5.php">オールインワン</a>
            <a href="./G5.php">スカート</a>
            <a href="./G5.php">ワンピース</a>
            <a href="./G5.php">シューズ</a>
            <a href="./G5.php">バッグ</a>
            <a href="./G5.php">アクセサリー</a>
            <a href="./G5.php">帽子</a>
            <a href="./G5.php">ファッション雑貨</a>
        </div>
        <div class="card__container">
            <?php
            $pdo = new PDO(
                'mysql:host=mysql309.phy.lolipop.lan;
                    dbname=LAA1554862-kaihatsu;charset=utf8',
                'LAA1554862',
                'aso2024'
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query("SELECT goods_id, category, image FROM goods");
            $stmt->execute();
            $goods = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($goods as $good) {
                echo '<div class="category-card">';
                echo    '<a href="details.php?id=', $good['goods_id'], '">';
                echo    '<img src="images/' . $good['image'] . '" alt="', $good['category'], '" width="150" height="150"></a>';
                echo    $good['category'];
                echo '</div>';
            }
            ?>
        </div>
    </section>

</body>

</html>