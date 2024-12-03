<?php
session_start();

$_SESSION = array();

if (isset($_COOKIE['PHPSESSID'])) {
    setcookie('PHPSESSID', '', time() - 1800, '/');
}

session_destroy();


$message= 'ログアウトしました';



header('Location: G1.php?message=' . urlencode('ログアウトしました'));
exit;
?>


