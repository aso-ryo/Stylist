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
        <a href="" class="site__name">Stylista</a>
        <form class="search__box" action="" method="post">
            <input class="search__bar" type="text" name="query" placeholder="アイテムの検索">
            <button type="submit"><i class="search__icon bi bi-search"></i>
            </button>
        </form>
        <form action="" method="post">
            <button type="submit"><i class="header__icon bi bi-cart"></i></button>
        </form>
        <form action="" method="post">
            <button type="submit"><i class="header__icon bi bi-star"></i></button>
        </form>
        <form action="" method="post">
            <button type="submit"><i class="header__icon bi bi-person"></i></button>
        </form>
    </header>


    
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

    <form action="" method="post">
    <button name=all type="submit">すべて</button>
    </form>
    <form action="" method="post">
    <button name=mens type="submit"></button>
    </form>
    <form action="" method="post">
    <button name=ladies type="submit"></button>
    </form>
<<<<<<< HEAD
    <?
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
                echo '<p>' . $review['category'] . '</p>';
                echo '<p><img src="'.$review['file_name'].'"></p>';
                echo '<hr>';
            }
        }
            ?>
=======
    <?php
        $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
                    dbname=LAA1554862-kaihatsu;charset=utf8',
                    'LAA1554862','aso2024');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
        $stmt=$pdo->query("SELECT goods_id, category, image FROM goods");
        $stmt->execute();
        $goods=$stmt->fetchAll(PDO::FETCH_ASSOC);
         
        foreach ($goods as $good){
            echo '<a href="details.php?id=',$good['goods_id'],'">';
            echo '<img src="images/'.$good['image'].'" alt="',$good['category'],'" width="150" height="150"></a>';
            echo $good['category'];
        }
        ?>  
    </div>

</body>
<<<<<<< HEAD
=======
</html><?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/G4.css">
    <title>Document</title>
</head>
<body>
    Stylista
    <input type="text" name="query" placeholder="アイテムの検索">
    <button type="submit">検索</button>
    <button type="submit" name="kato"></button>
    <button type="submit" name="favorite"></button>
    <button type="submit" name="mypage"></button>
    <br>

    
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

    <form action="" method="post">
    <button name=all type="submit">すべて</button>
    </form>
    <form action="" method="post">
    <button name=mens type="submit"></button>
    </form>
    <form action="" method="post">
    <button name=ladies type="submit"></button>
    </form>
    <?php
        $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
                    dbname=LAA1554862-kaihatsu;charset=utf8',
                    'LAA1554862','aso2024');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
        $stmt=$pdo->query("SELECT goods_id, category, image FROM goods");
        $stmt->execute();
        $goods=$stmt->fetchAll(PDO::FETCH_ASSOC);
         
        foreach ($goods as $good){
            echo '<a href="details.php?id=',$good['goods_id'],'">';
            echo '<img src="images/'.$good['image'].'" alt="',$good['category'],'" width="150" height="150"></a>';
            echo $good['category'];
        }
        ?>  
    </div>

</body>
</html><?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/G4.css">
    <title>Document</title>
</head>
<body>
    Stylista
    <input type="text" name="query" placeholder="アイテムの検索">
    <button type="submit">検索</button>
    <button type="submit" name="kato"></button>
    <button type="submit" name="favorite"></button>
    <button type="submit" name="mypage"></button>
    <br>

    
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

    <form action="" method="post">
    <button name=all type="submit">すべて</button>
    </form>
    <form action="" method="post">
    <button name=mens type="submit"></button>
    </form>
    <form action="" method="post">
    <button name=ladies type="submit"></button>
    </form>
    <?php
        $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
                    dbname=LAA1554862-kaihatsu;charset=utf8',
                    'LAA1554862','aso2024');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
        $stmt=$pdo->query("SELECT goods_id, category, image FROM goods");
        $stmt->execute();
        $goods=$stmt->fetchAll(PDO::FETCH_ASSOC);
         
        foreach ($goods as $good){
            echo '<a href="details.php?id=',$good['goods_id'],'">';
            echo '<img src="images/'.$good['image'].'" alt="',$good['category'],'" width="150" height="150"></a>';
            echo $good['category'];
        }
        ?>  
    </div>
>>>>>>> 7143091181e5823dec71f3931780aa86698ebc76

</body>
>>>>>>> 5c6fa4bdd149e69c6620cf99409f1fd7937ee482
</html>