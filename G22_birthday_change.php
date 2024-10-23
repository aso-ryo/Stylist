<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
Stylista
    <input type="text" name="query" placeholder="アイテムの検索">
    <button type="submit">検索</button>
    <button type="submit" name="kato"></button>
    <button type="submit" name="favorite"></button>
    <button type="submit" name="mypage"></button>
<h3>生年月日の変更</h3>
生年月日を選択してください<br>
    <select name="nen" id="number">
            <?php
            for($i=2024;$i>1899;$i--){
                echo '<option value="',$i,'">',$i,'<option>';
            }
            ?>
    </select>
    <select name="tuki" id="number">
            <?php
            for($e=1;$e<=12;$e++){
                echo '<option value="',$e,'">',$e,'<option>';
            }
            ?>
    </select>
    <select name="tuki" id="number">
            <?php
            for($e=1;$e<=31;$e++){
                echo '<option value="',$e,'">',$e,'<option>';
            }
            ?>
    </select>
    <button type="submit" name="action" value="send">計算</button>
    <form action="G24_user_info_complete.php" method="post">
        <button type="submit" name="action" value="send">変更する</button>
    </form>
</body>
</html>