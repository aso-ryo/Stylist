<?php
    session_start();
    //戻るボタンのためのリファラ処理
    $prevPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'G4.php';
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>会員登録</title>
        <link rel="stylesheet" href="./CSS/reset.css">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/G14.css">
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

    <form action="<?php echo $prevPage; ?>" method="get">
            <button type="submit">戻る</button>
        </form>
        
    <form action="G15.php" method="post">
    <p>会員情報</p>
    <?php
    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024');

    $sql = $pdo->prepare("select * from user where user_id=?");
    $sql->execute([$_SESSION['user_id']]);
    $user = $sql->fetch(PDO::FETCH_ASSOC);
    if($user) {
        echo '<input type="checkbox" name="items[]" value="user_name"> 基本情報';
            echo '<input type="text" name="user_name" placeholder="基本情報" value="' .$user['user_name']. '"><br>';

            echo '<input type="checkbox" name="items[]" value="user_name_kana"> カナ';
            echo '<input type="text" name="user_name_kana" placeholder="カナ" value="' . $user['user_name_kana']. '"><br>';

            echo '<input type="checkbox" name="items[]" value="adless_number"> 郵便番号';
            echo '<input type="text" name="adless_number" placeholder="郵便番号" value="' .$user['adless_number']. '"><br>';

            echo '<input type="checkbox" name="items[]" value="adless"> 住所';
            echo '<input type="text" name="adless" placeholder="住所" value="' .$user['adless'] . '"><br>';

            echo '<input type="checkbox" name="items[]" value="tell"> 電話番号';
            echo '<input type="text" name="tell" placeholder="電話番号" value="' .$user['tell']. '"><br>';

            echo '<input type="checkbox" name="items[]" value="birthday"> 生年月日';
            echo '<input type="text" name="birthday" placeholder="生年月日" value="' .$user['birthday'] . '"><br>';

            echo '<input type="checkbox" name="items[]" value="email"> メールアドレス';
            echo '<input type="text" name="email" placeholder="メールアドレス" value="' .$user['e-mail']. '"><br>';

            echo '<input type="checkbox" name="items[]" value="password"> パスワード';
            echo '<input type="password" name="password" placeholder="パスワード" value="'.$user['password']. '"><br>';
     }

    ?>

    <button type="submit">変更する</button>
    </form>
        
    </body>
    </html>
