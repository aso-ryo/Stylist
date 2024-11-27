<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/G15.css">
    <title>マイページ画面</title>
</head>
<body>
Stylista
    <input type="text" name="query" placeholder="アイテムの検索">
    <button type="submit">検索</button>
    <button type="submit" name="kato"></button>
    <button type="submit" name="favorite"></button>
    <button type="submit" name="mypage"></button>

    <p>お気に入り</p>
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