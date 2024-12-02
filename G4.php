<?php
session_start();

//会員情報の記憶
$pdo = new PDO(
    'mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024'
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = $pdo->prepare("select * from user where `e-mail`=? and password=?");

    $sql->execute([$_POST['mail'], $_POST['password']]);
    $reviews = $sql->fetchAll(PDO::FETCH_ASSOC);
    if ($reviews) {
        foreach ($reviews as $row) {
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['user_name']=$row['user_name'];
        $_SESSION['user_name_kana']=$row['user_name_kana'];
        $_SESSION['e-mail']=$row['e-mail'];
        $_SESSION['password']=$row['password'];
        $_SESSION['birthday']=$row['birthday'];
        $_SESSION['adless_number']=$row['adless_number'];
        $_SESSION['adless']=$row['adless'];
        $_SESSION['tell']=$row['tell'];
        $_SESSION['cart_id']=$row['cart_id'];
        }
    }else{
        $_SESSION['message'] = 'ログインできませんでした。';
        header('Location: G1.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/reset.css">
    <link rel="stylesheet" href=".vscode/CSS/header.css">
    <link rel="stylesheet" href=".vscode/CSS/G4.css">
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
            <a href="./G5.php?category=トップス">トップス</a>
        <a href="./G5.php?category=アウター">アウター</a>
        <a href="./G5.php?category=パンツ">パンツ</a>
        <a href="./G5.php?category=オールインワン">オールインワン</a>
        <a href="./G5.php?category=スカート">スカート</a>
        <a href="./G5.php?category=ワンピース">ワンピース</a>
        <a href="./G5.php?category=シューズ">シューズ</a>
        <a href="./G5.php?category=バッグ">バッグ</a>
        <a href="./G5.php?category=アクセサリー">アクセサリー</a>
        <a href="./G5.php?category=帽子">帽子</a>
        <a href="./G5.php?category=ファッション雑貨">ファッション雑貨</a>
            
        </div>

        <div class="card__container">
            <?php
           
            $stmt = $pdo->query("SELECT goods_id, category, image FROM goods");
            $stmt->execute();
            $goods = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($goods as $good) {
                echo '<div class="category-card">';
                echo '<a href="./G6.php?id=',$good['goods_id'],'">';
                echo  '<img src="images/' . $good['image'] . '" alt="', $good['category'], '" width="150" height="150"></a>';
                echo  $good['category'];
                echo '</div>';
            }
            ?>
        </div>
    </section>

</body>

</html>