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
    <?
    $sql_reviews = "SELECT * FROM image_posts";
        $stmt_reviews = $pdo->prepare($sql_reviews);
        $stmt_reviews->execute();
        $reviews = $stmt_reviews->fetchAll(PDO::FETCH_ASSOC);
        if ($reviews) {
            foreach ($reviews as $review) {
                echo '<p>' . $review['name'] . '</p>';
                echo '<p>' . $review['comment'] . '</p>';
                echo '<p><img src="'.$review['file_name'].'"></p>';
                echo '<p>投稿日時:' . $review['created'] . '</p>';
                echo '<hr>';
            }
        }
            ?>

</body>
</html>