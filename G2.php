<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".vscode/CSS/G2.css">
    <title>Stylista</title>
    <link rel="stylesheet" href="./css/G2.css">
</head>
<body>
  <form action="G3.php" method="post">
    <h1>Stylista</h1>
    <h3>新規会員登録</h3>
    <p>メールアドレス &ensp; <input type="text" name="mail" placeholder="○○○○s.asojuku" class="mail" ></p><br>
    <p>パスワード　&ensp;<input type="text" name="pass" placeholder="Pass" ></p><br>
    <p>氏名　<input type="text" name="name" placeholder="山田 太郎" ></p><br>
    <p>氏名(カナ)　<input type="text" name="name_kana" placeholder="ヤマダ　タロウ" >&ensp;</p><br>
    <p>郵便番号　<input type="text" name="yuubin" placeholder="000-0000" ></p><br>
    <p>住所　<textarea name="jyuusyo" rows="5" cols="33" placeholder="福岡県福岡市博多区***" class="textarea"></textarea></p><br>
    <p>電話番号　<input type="text" name="tell" placeholder="00-0000-0000"></p><br>
    <p>誕生日　<input type="text" name="birthday" placeholder="2024-01-01" ></p><br>
    <input type="submit" value="登録する" class="button">

<?php
/*&ensp;はホワイトスペースの追加*/

/*//日付の初期値
$theYear2 = date('Y');
$theMonth2 = date('n');
$theDay2 = date('j');
$error = [];
if (isset($_POST["year"]) && isset($_POST["month"]) && isset($_POST["day"])) {
  $theYear2 = $_POST["year"]; //POSTされた年月日で書き換える
  $theMonth2 = $_POST["month"];
  $theDay2 = $_POST["day"];
  //値が日付として正しいかチェック
  $isDate2 = checkdate($theMonth2, $theDay2, $theYear2);
  if (!$isDate2) {
    $error[] = "日付として正しくありません";
  } else { //日付オブジェクト作成
    $dateString = $theYear2 . "-" . $theMonth2 . "-" . $theDay2;
    $dateObj2 = new DateTime($dateString);
  }
} else {
  $isDate2 = false;
}
?>

<?php
//今年前後15年のプルダウンメニュー
function yearOption()
{
  global $theYear2;
  $thisYear = date('Y');
  $startYear = $thisYear - 100;
  $endYear = $thisYear + 0;
  echo '<select name = "year">', '\n';
  for ($i = $startYear; $i <= $endYear; $i++) {
    if ($i == $theYear2) {
      echo "<option value = {$i} selected>{$i}</option>", "\n";
    } else {
      echo "<option value = {$i}>{$i}</option>", "\n";
    }
  }
  echo '</select>';
}

//1~12月のプルダウンメニュー
function monthOption()
{
  global $theMonth2;
  echo '<select name = "month">';
  for ($i = 1; $i <= 12; $i++) { //POSTされた月を選択する
    if ($i == $theMonth2) {
      echo "<option value = {$i} selected>{$i}</option>", "\n";
    } else {
      echo "<option value = {$i}>{$i}</option>", "\n";
    }
  }
  echo '</select>';
}

//1~31日のプルダウンメニュー
function dayOption()
{
  global $theDay2;
  echo '<select name = "day">';
  for ($i = 1; $i <= 31; $i++) {
    if ($i == $theDay2) { //POSTされた日を選択
      echo "<option value = {$i} selected>{$i}</option>", "\n";
    } else {
      echo "<option value = {$i}>{$i}</option>", "\n";
    }
  }
  echo '</select>';
}
?>

<!-- 年月日のプルダウンメニュー -->
<form method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>">
     生年月日 <?php yearOption(); ?>年
      <?php monthOption(); ?>月
      <?php dayOption(); ?>日
      <p><input type="submit" value="送信する"></p>
</form>

<?php
if ($isDate2) {
  $date2 = $dateObj2->format("Y年m月d日");
  $w = (int)$dateObj2->format("w");
  $week = ["日", "月", "火", "水", "木", "金", "土"];
  $youbi = $week[$w];
  echo "<HR>";
  echo "{$date2}は、{$youbi}曜日です。";
}
?>

<?php
if (count($error) > 0) {
  echo "<HR>";
  echo '<span class = "error">', implode("<br>", $error), '</span>';
}



    </select></p>*/
    ?>
</body>
</html>