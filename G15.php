<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/G15.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>会員情報変更完了画面</title>
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
 
    <p class="kanryou">会員情報の変更が完了しました</p><br>
 
    <form action="G19_user_info.php" method="post">
        <button type="submit" class="button">会員情報画面へ戻る</button>
    </form>
</body>
</html>
 