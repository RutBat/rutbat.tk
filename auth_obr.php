<?php
include 'inc/db.php';
$log = trim(htmlspecialchars($_POST['login']));
$pass = trim(htmlspecialchars($_POST['pass']));
//////////////////ВЫХОД ИЗ СИСТЕМЫ//////////



////////////////////////если авторизация верна то пишем куки, если нет на стр. ошибок///////
if (!empty($log) && !empty($pass)) {
$us = $connect->query("SELECT * FROM `user` WHERE `name` = '" . $log . "'");
if ($us->num_rows != 0) {
$user = $us->fetch_array(MYSQLI_ASSOC);
$pass_256 = hash('sha256', $pass); // Хэш по алгоритму sha256
if ($pass_256 == $user['pass']) {
setcookie('user', $log, time() + 60 * 60 * 24 * 365 , '/');
setcookie('pass', $pass_256, time() + 60 * 60 * 24 * 365, '/');
$user = $log;
$date = date("d.m.Y H:i:s");
$text = 'успешно авторизовался';
$log = "Пользователь $user $text";
$zap = "INSERT INTO log (kogda, log)
VALUES (
'$date',
'$log'
)";
if ($connect->query($zap) === false) {
echo "Ошибка: " . $sql . "<br>" . $connect->error;	}
echo '<meta http-equiv="refresh" content="0;URL=/">';
} else {
echo '<meta http-equiv="refresh" content="0;URL=/auth?err">';
}
exit();
} else {

echo '<meta http-equiv="refresh" content="0;URL=/auth?err">';
}
}


if (isset($_GET['off'])) {
session_start();
setcookie('user', '', 1);
setcookie('pass', '', 1);
echo '<meta http-equiv="refresh" content="0;URL=/auth.php">';
exit();
}
include 'inc/foot.php';
?>