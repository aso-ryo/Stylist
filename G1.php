<?php
session_start();
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="./CSS/G17.css">
    <link rel="stylesheet" href="./CSS/reset.css">
</head>
<body>
<div class="a">
    <br><br><br>
    <h1>Stylista</h1><br>
    <h3>ログイン</h3><br>
    <form action="G4.php" method="post">
        <?php
        if (!empty($message)){
            echo '<div class="message" id="message-box">',$message ,'</div>';
        }
        
        if (!empty($_SESSION['message'])){
            echo '<div class="message" id="message-box">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);

        }
           
        ?>
    <p><input class="mail" type="text" name="mail" placeholder="メールアドレス"></p><br>
    <p><input class="pass" type="password" name="password" placeholder="パスワード"></p><br><br>

    <p><button class="login-button" name="login">ログイン</button><br><br>
    </form>

<form action="G2.php" method="post">
<button class="new" name="touroku">新規会員登録はこちら</button>
</form>
</div>
</body>