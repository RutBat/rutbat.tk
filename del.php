<?php
include "inc/head.php";
$id = e($_GET['id']);
$date = date("d.m.Y H:i:s");
$user = $usr['name'];
$region = $usr['region'];
$text = 'удалил дом с id';
$dom = '$id';
$log = "Пользователь $user $text $id";
$zap = "INSERT INTO log (kogda, log)
		VALUES (
		'$date',
		'$log'
		)";
		if ($connect->query($zap) === false) {
		echo "Ошибка: " . $sql . "<br>" . $connect->error;	}
$results = $connect->query("SELECT * FROM adress WHERE id = '$id'");
$sql = " DELETE FROM adress WHERE id = '$id'";
if (mysqli_query($connect, $sql)) { ?>
<?php
$whereareyoufrom = $_SERVER['HTTP_REFERER'];
red_index("$whereareyoufrom&id=ok");
echo '<br><br><br>';
} else {echo "Error deleting record: " . mysqli_error($connect);}
mysqli_close($connect);
include 'inc/foot.php';