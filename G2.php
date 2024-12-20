<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylista</title>
    <link rel="stylesheet" href=".vscode/CSS/reset.css">
    <link rel="stylesheet" href=".vscode/CSS/header.css">
    <link rel="stylesheet" href=".vscode/CSS/G2.css">
</head>
<body>
    <h1>Stylista</h1>
    <h3>新規会員登録</h3>
    <form action="G1.php" method="post">
    <button type="submit">戻る</button>
    </form>
    <form action="G3.php" method="post">
    <?php
    if (!empty($_SESSION['message'])){
            echo '<div class="message" id="message-box">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);

        }
    ?>
    <p>メールアドレス<input type="text" name="e-mail" placeholder="メールアドレス"></p>
    <p>パスワード<input type="text" name="password" placeholder="パスワード"></p>
    <p>氏名　<input type="text" name="user_name" placeholder="氏名"></p>
    <p>氏名(カナ)　<input type="text" name="user_name_kana" placeholder="氏名(カナ)">
    <p>郵便番号　<input type="text" name="adless_number" placeholder="半角数字7桁"></p>
    <p>住所　<textarea name="adless" rows="5" cols="33"></textarea></p>
    <p>電話番号　<input type="text" name="tell" placeholder="半角数字"></p>
    <p>誕生日　<input type="text" name="birthday" placeholder="2024-01-01"></p>
    <p><input type="submit" value="登録する"></p>
    </form>

</body>
</html>