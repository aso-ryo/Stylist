<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文履歴画面</title>
    <link rel="stylesheet" href=".vscode/CSS/reset.css">
    <link rel="stylesheet" href=".vscode/CSS/header.css">
    <link rel="stylesheet" href=".vscode/CSS/G16.css">
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
    <h2>注文履歴</h2>

    <h3>発送準備中</h3>

    注文日：2024/09/09<br>
    注文番号：123456789<br>

    <p>合計　支払い済み</p>

    <h3>配達済み</h3>

    注文日：2024/06/06<br>
    注文番号：987654321

    <p>合計　支払い済み</p>
</body>
</html>
