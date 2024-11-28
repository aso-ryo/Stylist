<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/G13.css">
    <title>お気に入り画面</title>
</head>
<body>
Stylista
    <input type="text" name="query" placeholder="アイテムの検索">
    <button type="submit">検索</button>
    <button type="submit" name="cato"></button>
    <button type="submit" name="favorite"></button>
    <button type="submit" name="mypage"></button>
    <p>お気に入り</p>
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
</body>
</html>