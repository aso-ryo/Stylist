<h1>Stylista</h1>
<h1>会員登録完了画面</h1>
<?php
    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1554862-kaihatsu;charset=utf8',
    'LAA1554862',
    'aso2024');
    $sql = $pdo->prepare("insert into user (user_name,user_name_kana,e-mail,password,birthday,adless,tell)VALUES (?,?,?,?,?,?,?)");
    $sql->execute([$_POST['name'],$_POST['name_kana'],$_POST['mail'],$_POST['pass'],$_POST['name'],$_POST['birthday'],$_POST['jyuusyo'],$_POST['tell'],]);

?>
<form action="G1" method="post">
<button type="submit" name="action" value="send">ログイン画面へ戻る</button>
</form>