<?php
    session_start();
    if(isset($_POST['user_name'])&&isset($_POST['user_name'])&&isset($_POST['user_name_kana'])&&isset($_POST['e-mail'])&&isset($_POST['password'])&&isset($_POST['birthday'])&&isset($_POST['adless_number'])&&isset($_POST['adless'])&&isset($_POST['tell'])&&isset($_POST['cart_id'])){
        $_SESSION['user_id']=$_POST['cart_id'];
        $_SESSION['name']=$_POST['name'];
        $_SESSION['name_kana']=$_POST['name_kana'];
        $_SESSION['mail']=$_POST['mail'];
        $_SESSION['pass']=$_POST['pass'];
        $_SESSION['birthday']=$_POST['birthday'];
        $_SESSION['yuubin']=$_POST['yuubin'];
        $_SESSION['juusyo']=$_POST['juusyo'];
        $_SESSION['tell']=$_POST['tell'];
        $_SESSION['cart_id']=$_POST['cart_id'];
       }

       $sql = $pdo->prepare("select * from cart where goods_id=?");
        $sql->execute([$s]);
        $cart_goods = $sql->fetchColumn();
        if($cart_goods!== false){       //同じ商品がカートに入ってないとき
            $sql = "INSERT INTO carts (cart_id, goods_id,user_id,qty) VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([$s, $goods_id,$_SESSION['name'],1]);
            if ($result) {
                $_SESSION['message'] = 'カートに入れました。';
            } else {
                $_SESSION['message'] = 'データ挿入に失敗しました。';
                header('Location: index.html'); // 挿入後にHTMLページへリダイレクト
                exit;
            }      
        }else{      //入っている時、個数を＋１する
            $sql = "UPDATE carts SET qty = qty + 1 WHERE cart_id = ?";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([$cart_id]);
            if ($stmt->rowCount() > 0) {
                $_SESSION['message'] = 'カートに入れました。';
            } else {
                $_SESSION['message'] = 'データ挿入に失敗しました。';
            } 
            header('Location: index.html'); // 挿入後にHTMLページへリダイレクト
            exit;   
        }
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=".vscode/CSS/G8.css">
        <title>Document</title>
    </head>
    <body>
    Stylista
    <input type="text" name="query" placeholder="アイテムの検索">
    <button type="submit">検索</button>
    <button type="submit" name="kato"></button>
    <button type="submit" name="favorite"></button>
    <button type="submit" name="mypage"></button>

    <?
    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
                dbname=LAA1554862-kaihatsu;charset=utf8',
                'LAA1554862',
                'aso2024');

        echo '<form action="G8.php" method="post">';

        $goods_id=$_POST['id'];
        $sql = $pdo->prepare("select * from goods where goods_id=?");
        $sql->execute([$goods_id]);
        $reviews = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($reviews) {
            foreach ($reviews as $review) {
                echo '<p><img src="' . $review['image'] . '"></p>';
                echo '<p>' . $review['goods_name'] . '</p>';
                echo '<p>' . $review['price'] . '</p>';
                echo '<p>' . $review['explain'] . '</p>';
                $s=$review['goods_id'];  
            }
        }

        echo '<button disabled>カートにいれる</button>';
        echo '</form>';


        echo '<button disabled type="submit" name="action" value="send">☆</button>';

        $sql = $pdo->prepare("select stock from stock where goods_id=?");
        $sql->execute([$s]);
        $stock = $sql->fetchColumn();
        if ($stock !== false && $stock > 0) {
            echo "在庫あり: $stock 個";
        } else {
            echo "在庫なし";
        }

    if (!empty($_SESSION['message'])){
        //<div class="message" id="message-box"> //css紐づけ
            echo $_SESSION['message'];
            unset($_SESSION['message']); //メッセージを消去
        //</div>
    }
?>
    <script src="scripts.js"></script> //JavaScriptファイル読み込み
        

       
</body>
</html>