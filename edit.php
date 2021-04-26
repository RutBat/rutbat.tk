<?php
include "inc/head.php"; ?>
				<?php
				$id = $_GET['id'];
				$adress = $_GET['adress'];
				$vihod = $_GET['vihod'];
				$vihod1 = $_GET['vihod']['0'];
				$vihod2 = $_GET['vihod']['1'];
				$vihod3 = $_GET['vihod']['2'];
				$vihod4 = $_GET['vihod']['3'];
				$vihod5 = $_GET['vihod']['4'];
				$dopzamok = $_GET['dopzamok'];
				$kluch = $_GET['kluch'];
				$pred = $_GET['pred'];
				$phone = $_GET['phone'];
				$krisha = $_GET['krisha'];
				$lesnica = $_GET['lesnica'];
				$pon = $_GET['pon'];
				$podjezd = $_GET['podjezd'];
				$region = $_GET['region'];
				$text = $_GET['text'];
				$new = 0;
				if (empty($adress)) {
				echo 'Введите адрес дома';
				exit();
				}
				$user = $usr['name'];

				$date = date("d.m.Y H:i:s");
$text = 'отредактировал дом -';
$log = "Пользователь $user $text $adress";
$zap = "INSERT INTO log (kogda, log)
		VALUES (
		'$date',
		'$log'
		)";
		
		if ($connect->query($zap) === false) {
	echo "Ошибка: " . $zap . "<br>" . $connect->error;	} 
				$sql = "UPDATE adress SET
				adress = '$adress',
				vihod = '$vihod1',
				vihod2 = '$vihod2',
				vihod3 = '$vihod3',
				vihod4 = '$vihod4',
				vihod5 = '$vihod5',
				dopzamok = '$dopzamok',
				kluch = '$kluch',
				pred = '$pred',
				phone = '$phone',
				krisha = '$krisha',
				lesnica = '$lesnica',
				pon = '$pon',
				podjezd = '$podjezd',
				text = '$text',
				editor = '$user',
				region = '$region',
				new = '$new'
				WHERE id = '$id'";
				if ($connect->query($sql) === true) {
				redirect("/result.php?adress=$adress");
				} else {
				echo "Ошибка: " . $sql . "<br>" . $connect->error;
				}
			include 'inc/foot.php';