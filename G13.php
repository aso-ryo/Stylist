<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/G15.css">
    <title>マイページ画面</title>
</head>
<body>
<header>
        <a href="" class="site__name">Stylista</a>
        <form class="search__box" action="G11.php" method="post">
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
    <a href="">すべて見る</a>

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
    <form action="G19_user_info.php" method="post">
    <button type="submit">会員登録の確認・変更</button>
    </form>
    <form action="G25_goods_history.php" method="post">
    <button type="submit">購入履歴</button>
    </form>
    <form action="G27_logout.php" method="post">
    <button type="submit">ログアウト</button>
    </form>
</body>
</html>