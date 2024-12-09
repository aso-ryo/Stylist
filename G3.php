<?php
session_start();
?>
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録完了画面</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/G3.css">

</head>

<body>
    <div class="G3__container">
        <h1>Stylista</h1>
        <?php
        $pdo = new PDO(
            'mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1554862-kaihatsu;charset=utf8',
            'LAA1554862',
            'aso2024'
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query('SELECT COUNT(*) FROM user');
        $cart = $stmt->fetchColumn();
        $cart = $cart + 1;
        $sql = $pdo->prepare("insert into user (user_name,user_name_kana,`e-mail`,password,birthday,adless_number,adless,tell,cart_id)VALUES (?,?,?,?,?,?,?,?,?)");
        $result = $sql->execute([$_POST['user_name'], $_POST['user_name_kana'], $_POST['e-mail'], $_POST['password'], $_POST['birthday'], $_POST['adless_number'], $_POST['adless'], $_POST['tell'], $cart]);
     
        ?>
        <?php if ($result): ?>
            <p class="kanryou">会員登録が完了しました</p>
            <form action="G1.php" method="post">
                <button type="submit" class="button" name="action" value="send">ログイン画面へ戻る</button>
            </form>
        <?php else: ?>
            <p>データが正常に挿入されませんでした</p>
        <?php endif ?>
    </div>
</body>

</html>