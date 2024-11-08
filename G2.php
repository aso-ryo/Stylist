<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylista</title>
</head>
<body>
    <h1>Stylista</h1>
    <h3>新規会員登録</h3>
    <p><input type="text" name="mail" placeholder="メールアドレス"></p>
    <p><input type="text" name="pass" placeholder="パスワード"></p>
    <p>氏名　必須<input type="text" name="sei" placeholder="姓">
                <input type="text" name="mei" placeholder="名"></p>
    <p>氏名(カナ)　必須<input type="text" name="seikana" placeholder="セイ">
                <input type="text" name="meikana" placeholder="メイ"></p>
    <p>郵便番号　必須<input type="text" name="yuubin" placeholder="半角数字7桁"></p>
    <p>住所　必須<textarea name="jyuusyo" rows="5" cols="33"></textarea></p>
    <p>電話番号　必須<input type="text" name="tell" placeholder="半角数字"></p>
    <?php
//日付の初期値
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
      <?php yearOption(); ?>年
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
?>


    </select></p>
</body>
</html>