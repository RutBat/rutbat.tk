<?php
include "inc/head.php"; 
$id = $_GET['id'];
$adress = $_GET['adress'];
$results = $connect->query("SELECT * FROM adress WHERE adress LIKE '$adress' LIMIT 1");
$this_house =  $results->num_rows == 1 ? $results->fetch_array(MYSQLI_ASSOC) : '';
/////////Если данных нет то осталяем без изменений, если есть добавляем их в переменную
$dopzamok =  empty($_GET['dopzamok']) ? $this_house['dopzamok'] : $_GET['dopzamok'];
$vihod1 =  empty($_GET['vihod']['0']) ? $this_house['vihod'] : $_GET['vihod']['0'];
$vihod2 =  empty($_GET['vihod']['1']) ? $this_house['vihod2'] : $_GET['vihod']['1'];
$vihod3 =  empty($_GET['vihod']['2']) ? $this_house['vihod3'] : $_GET['vihod']['2'];
$vihod4 =  empty($_GET['vihod']['3']) ? $this_house['vihod4'] : $_GET['vihod']['3'];
$vihod5 =  empty($_GET['vihod']['4']) ? $this_house['vihod5'] : $_GET['vihod']['4'];
$kluch =  empty($_GET['kluch']) ? $this_house['kluch'] : $_GET['kluch'];
$krisha =  empty($_GET['krisha']) ? $this_house['krisha'] : $_GET['krisha'];
$podjezd =  empty($_GET['podjezd']) ? $this_house['podjezd'] : $_GET['podjezd'];
$pon =  empty($_GET['pon']) ? $this_house['pon'] : $_GET['pon'];
$oboryda =  empty($_GET['oboryda']) ? $this_house['oboryda'] : $_GET['oboryda'];
$lesnica =  empty($_GET['lesnica']) ? $this_house['lesnica'] : $_GET['lesnica'];
$pred =  empty($_GET['pred']) ? $this_house['pred'] : $_GET['pred'];
$phone =  empty($_GET['phone']) ? $this_house['phone'] : $_GET['phone'];
$region =  empty($_GET['region']) ? $this_house['region'] : $_GET['region'];
$text =  empty($_GET['text']) ? $this_house['text'] : $_GET['text'];
//////////////////////////////////////////////////////////////////////////////////////////////
$new = 0;
if (empty($adress)) {
echo 'Введите адрес дома';
exit();
}
$user = $usr['name'];
$date = date("d.m.Y H:i:s");
$text2 = 'отредактировал дом -';
$log = "Пользователь $user $text2 $adress";
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
oboryda = '$oboryda',
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