<?php
    session_start();
   
    // 戻るボタンのためのリファラ処理
    $_SESSION['prevPage'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細画面</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/G6.css">
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
    echo '<form action="',$_SESSION['prevPage'],'" method="get">';
    echo '<button type="submit" class="arrow"><i class="bi bi-arrow-left"></i></button>';
    echo '</form>';
 
    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
                dbname=LAA1554862-kaihatsu;charset=utf8',
                'LAA1554862',
                'aso2024');
 
       
        echo '<form action="G7.php" method="post">';
 
        $sql = $pdo->prepare("select * from goods where goods_id=?");
        if(isset($_SESSION['goods_id'])){
            $sql->execute([$_SESSION['goods_id']]);
        }else{
            $sql->execute([$_GET['id']]);    
        }
       
        echo '<div class = image>';
        $reviews = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($reviews) {
            foreach ($reviews as $review) {     //商品表示
                $goods_id=$review['goods_id'];
                $_SESSION['goods_id']=$review['goods_id'];
               
                echo '<img src="images/'.$review['image'].'" alt="',$good['category'],'" align="left" style="margin-left: 150px; margin-right: 120px; width: 400px; height=auto;">';
                echo '<p style="font-size: 25px;">' . $review['goods_name'] . '</p><br>';
                echo '<p style="font-size: 35px;">￥' . $review['price'] . '</p><br>';
                echo '<p style="margin-right: 150px;">' . $review['explain'] . '</p><br>';                
            }
        }
        echo '</div>';
 
        echo '<div class="flex">';
        echo '<br><input type="submit" class="cart-button" value="カートに入れる">';
        echo '</form>';
        //お気に入り登録
        $sql = $pdo->prepare("SELECT * FROM favorite WHERE user_id = ? AND goods_id = ?");
        $sql->execute([$_SESSION['user_id'], $_SESSION['goods_id']]);
        $favorite = $sql->fetch();
 
        if ($favorite) {
        $is_favorited = true;
        }else{
        $is_favorited = false;
        }
        echo '<form action="favorite.php" method="post" id="favorite-form-' . $_SESSION['goods_id'] . '">';
        echo '<button class="iine" type="submit">',$is_favorited ? '<i class="bi bi-star-fill"></i>' : '<i class="header__icon bi bi-star"></i>';
        echo '</button>';
        echo '</form>';
        echo '</div><br>';
           
        //在庫表示
        $sql = $pdo->prepare("select stock from stock where goods_id=?");
        $sql->execute([$_SESSION['goods_id']]);
        $stock = $sql->fetchColumn();
        if ($stock !== false && $stock > 0) {
            echo "在庫あり: $stock 個";
        } else {
            echo "在庫なし";
        }
        if (!empty($_SESSION['message'])){
            echo '<script>
            window.onload = function() {
                alert("'.htmlspecialchars($_SESSION['message'],ENT_QUOTES,'UTF-8') . '");
            };
            </script>';  
           unset($_SESSION['message']);
        }
           
 ?>
 
 
 
       
 
 
 
 
<script src="favorite.js" defer></script>
<script src="cart.js"></script>
</body>
</html>