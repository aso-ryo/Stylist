<?php
    session_start();

    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024');
    $checkedItems = $_POST['items'] ?? [];
    $params=['user_id'=>$_SESSION['user_id']];
    foreach ($checkedItems as $item) {
       if (isset($_POST[$item]) && !empty($_POST[$item])) {
           $updates[] = "$item = :$item";
           $params[$item] = $_POST[$item];
       }
   }

   if (empty($updates)) {
       header('Location: G14.php');
       exit;
   }
       $sql = "UPDATE user SET " . implode(", ", $updates) . " WHERE user_id = :user_id";
       $stmt = $pdo->prepare($sql);
       $stmt->execute($params);
       
       foreach ($params as $key => $value) {
        if ($key !== 'user_id') { // user_id はセッション更新に使用しない
            $_SESSION[$key] = $value;
        }
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員情報変更完了画面</title>
    <link rel="stylesheet" href=".vscode/CSS/reset.css">
    <link rel="stylesheet" href=".vscode/CSS/header.css">
    <link rel="stylesheet" href=".vscode/CSS/G15.css">
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
    <form action="G14.php" method="post">
    <p class="kanryou">会員情報の変更が完了しました。</p><br>';
    <button type="submit" class="button">会員情報画面へ戻る</button>
    </form>
</body>
</html>
 