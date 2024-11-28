<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="">
    <title>トップページ</title>
</head>
<body>
<header>
        <a href="G4.php" class="site__name">Stylista</a>
        <form class="search__box" action="" method="post">
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

<category>
    <p>カテゴリーから探す</p>
    <a href="">トップス</a><br>
    <a href="">アウター</a><br>
    <a href="">パンツ</a><br>
    <a href="">オールインワン</a><br>
    <a href="">スカート</a><br>
    <a href="">ワンピース</a><br>
    <a href="">シューズ</a><br>
    <a href="">バッグ</a><br>
    <a href="">アクセサリー</a><br>
    <a href="">帽子</a><br>
    <a href="">ファッション雑貨</a><br>
</category>

<div id="category-cards">
    <?php
        $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1554862-kaihatsu;charset=utf8',
        'LAA1554862',
        'aso2024');


        $sql_reviews = "SELECT * FROM image_posts";
        $stmt_reviews = $pdo->prepare($sql_reviews);
        $stmt_reviews->execute();
        $reviews = $stmt_reviews->fetchAll(PDO::FETCH_ASSOC);
        if ($reviews) {
            foreach ($reviews as $review) {
                echo '<div class="category-card">';
                echo    '<p>' . $review['category'] . '</p>';
                echo    '<p><img src="'.$review['file_name'].'"></p>';
                echo '</div>';
            }
        }

        
    ?>
</div>

</body>
</html>