<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
if (isset($_GET['success'])) {
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass']; // Хэш по алгоритму sha256
    setcookie('user', $user, time() + 60 * 60 * 24 * 365);
    setcookie('pass', $pass, time() + 60 * 60 * 24 * 365);
    header('Location: /');
    exit();
}
include "inc/db.php";
$login  = trim(htmlspecialchars($_GET['login']));
$pass   = trim(htmlspecialchars($_GET['pass']));

$pass_256 = hash('sha256', $pass); // Хэш по алгоритму sha256
$region = $_GET['region'];
if (empty($login)) {
    echo '<script>alert("Ошибка! Проверьте логин. Не используйте пробелы и спец символы.");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=/auth.php?reg">';
    //redir('/auth.php?reg', '3');
    exit();
} elseif (empty($pass)) {
    echo '<script>
alert("Ошибка! Проверьте пароль. Не используйте пробелы и спец символы.");
</script>';
echo '<meta http-equiv="refresh" content="0;URL=/auth.php?reg">';
    //redir('/auth.php?reg', '3');
    exit();
}
$user = $connect->query("SELECT * FROM user WHERE name = '$login'");
if ($user->num_rows >= 1) {
    //alrt("<strong>Ошибка!</strong> Логин есть в базе. Сейчас откроется страница регистрации. Придумайте новый логин", "danger", "3");
    echo '<script>
    alert("Ошибка! Логин есть в базе. Придумайте новый логин");
</script>';
echo '<meta http-equiv="refresh" content="0;URL=/auth.php?reg">';
    //redir('/auth.php?reg', '3');
    exit();
}

$date = date("d.m.Y H:i:s");
$user = $login;
$text = 'успешно зарегистрировался';
$log = "Пользователь $user $text";
$zap = "INSERT INTO log (kogda, log)
		VALUES (
		'$date',
		'$log'
		)";
		if ($connect->query($zap) === false) {
	echo "Ошибка: " . $sql . "<br>" . $connect->error;	} 



$sql = "INSERT INTO user (name, pass,  region)
VALUES (
'$login',
'$pass_256',
'$region'
)";
if ($connect->query($sql) === true) {
    session_start();
    $_SESSION['user'] = $login;
    $_SESSION['pass'] = $pass_256;
    echo '<meta http-equiv="refresh" content="0;URL=/reg.php?success">';
    //red_index('/reg.php?success');
    exit();
}

include 'inc/foot.php';
