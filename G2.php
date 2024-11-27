<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href=".vscode/CSS/G2.css">
  <title>Stylista</title>
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/G2.css">
</head>

<body>
  <form action="G3.php" method="post">
    <h1>Stylista</h1><br>
    <h3>新規会員登録</h3><br>
    <p>メールアドレス &ensp; <input type="text" name="mail" placeholder="○○○○s.asojuku" class="mail"></p><br><br>
    <p>パスワード　&ensp;<input type="text" name="pass" placeholder="Pass"></p><br><br>
    <p>氏名　<input type="text" name="name" placeholder="山田 太郎"></p><br><br>
    <p>氏名(カナ)　<input type="text" name="name_kana" placeholder="ヤマダ　タロウ">&ensp;</p><br><br>
    <p>郵便番号　<input type="text" name="yuubin" placeholder="000-0000"></p><br><br>
    <p>住所　<textarea name="jyuusyo" rows="5" cols="33" placeholder="福岡県福岡市博多区***" class="textarea"></textarea></p><br><br>
    <p>電話番号　<input type="text" name="tell" placeholder="00-0000-0000"></p><br><br>
    <p>誕生日　<input type="text" name="birthday" placeholder="2024-01-01"></p><br><br>
    <input type="submit" value="登録する" class="button">

 
</body>

</html>