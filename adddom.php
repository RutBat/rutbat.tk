<?php
include ("inc/head.php");
echo '<div class="contadiner">';
			$adress = htmlentities($_GET['adress'], ENT_QUOTES,  "utf-8");
			$vihod1 = htmlentities($_GET['vihod']['0'], ENT_QUOTES,  "utf-8");
			$vihod2 = htmlentities($_GET['vihod']['1'], ENT_QUOTES,  "utf-8");
			$vihod3 = htmlentities($_GET['vihod']['2'], ENT_QUOTES,  "utf-8");
			$vihod4 = htmlentities($_GET['vihod']['3'], ENT_QUOTES,  "utf-8");
			$vihod5 = htmlentities($_GET['vihod']['4'], ENT_QUOTES,  "utf-8");
			$vihod = htmlentities($_GET['vihod'], ENT_QUOTES,  "utf-8");
			$dopzamok = htmlentities($_GET['dopzamok'], ENT_QUOTES,  "utf-8");
			$kluch = htmlentities($_GET['klych'], ENT_QUOTES,  "utf-8");
			$pred = htmlentities($_GET['pred'], ENT_QUOTES,  "utf-8");
			$phone = htmlentities($_GET['phone'], ENT_QUOTES,  "utf-8");
			$krisha = htmlentities($_GET['krisha'], ENT_QUOTES,  "utf-8");
			$lesnica = htmlentities($_GET['lesnica'], ENT_QUOTES,  "utf-8");
			$pon = htmlentities($_GET['pon'], ENT_QUOTES,  "utf-8");
			$region = htmlentities($_GET['region'], ENT_QUOTES,  "utf-8");
			$podjezd = htmlentities($_GET['podjezd'], ENT_QUOTES,  "utf-8");
			$prim = htmlentities(trim($_GET['text']), ENT_QUOTES,  "utf-8");
			$new = htmlentities($_GET['new'], ENT_QUOTES,  "utf-8");
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
if(empty($prim)){
if($new == 0){
	$prim = $log = "Пользователь $user добавил дом $adress";
	$zap = "INSERT INTO log (kogda, log)
			VALUES (
			'$date',
			'$log'
			)";
}else{
	$prim = $log = "Пользователь $user добавил шаблон дома $adress";
	$zap = "INSERT INTO log (kogda, log)
			VALUES (
			'$date',
			'$log'
			)";
}
}
if(!empty($_GET['text'])){
$prim =  htmlentities($_GET['text'], ENT_QUOTES,  "utf-8");
}
			if ($connect->query($zap) === false) {
			echo "Ошибка: " . $sql . "<br>" . $connect->error;	}
			$sql = "INSERT INTO adress (adress, vihod, vihod2, vihod3, vihod4, vihod5, oboryda, dopzamok, kluch, pred, phone, krisha, lesnica, pon, podjezd, text, editor, region, new)
			VALUES (
			'$adress',
			'$vihod1',
			'$vihod2',
			'$vihod3',
			'$vihod4',
			'$vihod5',
			'$oboryda',
			'$dopzamok',
			'$kluch',
			'$pred',
			'$phone',
			'$krisha',
			'$lesnica',
			'$pon',
			'$podjezd',
			'$prim',
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