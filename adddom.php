<?php
include ("inc/head.php");
echo '<div class="contadiner">';
			$adress = $_GET['adress'];
			$vihod1 = $_GET['vihod']['0'];
			$vihod2 = $_GET['vihod']['1'];
			$vihod3 = $_GET['vihod']['2'];
			$vihod4 = $_GET['vihod']['3'];
			$vihod5 = $_GET['vihod']['4'];
			$vihod = $_GET['vihod'];
			$dopzamok = $_GET['dopzamok'];
			$kluch = $_GET['klych'];
			$pred = $_GET['pred'];
			$phone = $_GET['phone'];
			$krisha = $_GET['krisha'];
			$lesnica = $_GET['lesnica'];
			$pon = $_GET['pon'];
			$region = $_GET['region'];
			$podjezd = $_GET['podjezd'];
			$text = $_GET['text'];
			$new = $_GET['new'];
	if($new == 1){
	$news = "1";
	}else{
	$news = "0";
	}
			if (empty($adress)) {
				echo 'Введите адрес дома';
				exit;
			}
			if (empty($pred)) {
				$pred = "Не указан председатель";
			}
			if (empty($kluch)) {
				$kluch = "В какой кв. ключ?";
			}
			$results = $connect->query("SELECT * FROM adress WHERE adress = '$adress'");
			if ($results->num_rows == 1) {
				echo '<div class="alert alert-danger" role="alert">
							Адрес уже есть в базе
				</div>';
				redirect("/result.php?adress=$adress");
				exit;
			}
			$user = $usr['name'];
			$date = date("d.m.Y H:i:s");
	if($new == 0){
	$text = 'добавил дом ';}else{
	$text = "добавил шаблон дома";}
	$log = "Пользователь $user $text $adress";
	$zap = "INSERT INTO log (kogda, log)
			VALUES (
			'$date',
			'$log'
			)";
			if ($connect->query($zap) === false) {
			echo "Ошибка: " . $sql . "<br>" . $connect->error;	}
			$sql = "INSERT INTO adress (adress, vihod, vihod2, vihod3, vihod4, vihod5, dopzamok, kluch, pred, phone, krisha, lesnica, pon, podjezd, text, editor, region, new)
			VALUES (
			'$adress',
			'$vihod1',
			'$vihod2',
			'$vihod3',
			'$vihod4',
			'$vihod5',
			'$dopzamok',
			'$kluch',
			'$pred',
			'$phone',
			'$krisha',
			'$lesnica',
			'$pon',
			'$podjezd',
			'$log',
			'$user',
			'$region',
			'$news'
			)";
			if ($connect->query($sql) === true) {
				redirect('/all.php');
			} else {
				echo "Ошибка: " . $sql . "<br>" . $connect->error;
			}
	?>
</div>
<?php
include ('inc/foot.php');