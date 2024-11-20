<h1>Stylista</h1>
<h1>会員登録完了画面</h1>
<?php
    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query('SELECT COUNT(*) FROM user');
    $cart = $stmt->fetchColumn();
    $cart=$cart+1;
    $sql = $pdo->prepare("insert into user (user_name,user_name_kana,`e-mail`,password,birthday,adless_number,adless,tell,cart_id)VALUES (?,?,?,?,?,?,?,?,?)");
    $result=$sql->execute([$_POST['name'],$_POST['name_kana'],$_POST['mail'],$_POST['pass'],$_POST['birthday'],$_POST['yuubin'],$_POST['jyuusyo'],$_POST['tell'],$cart]);
    if ($result) {
        echo '会員登録が完了しました';
        echo '<form action="G1" method="post">';
        echo '<button type="submit" name="action" value="send">ログイン画面へ戻る</button>';
        echo '</form>';
     } else {
         echo 'データが正常に挿入されませんでした';
     }
?>

