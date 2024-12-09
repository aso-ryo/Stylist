<?php
session_start();
unset($_SESSION['goods_id']);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カテゴリー別画面</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/G5.css">
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
    $pdo = new PDO(
        'mysql:host=mysql309.phy.lolipop.lan;
                    dbname=LAA1554862-kaihatsu;charset=utf8',
        'LAA1554862',
        'aso2024'
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['category'])) {
        $category = isset($_GET['category']) ? htmlspecialchars($_GET['category'], ENT_QUOTES, 'UTF-8') : null;
        $_SESSION['category'] = $category;
    } else {
        $category = $_SESSION['category'];
    }
    if ($category) {
        // カテゴリーに基づいてデータを取得
        $stmt = $pdo->prepare("SELECT goods_id, category, image FROM goods WHERE category = :category");
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
        $goods = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<h2>',$category,'</h2><br>';
    ?>

        <div class="goods">
        <?php
        foreach ($goods as $good) {
            echo '<div class="category-card">';
            echo '<a href="./G6.php?id=', $good['goods_id'], '">';
            echo '<img src="images/' . $good['image'] . '" alt="', $good['category'], '" width="150" height="150"></a>';
            echo $good['category'];
            echo '</div>';
        }
    }
        ?>
        </div>
</body>

</html>