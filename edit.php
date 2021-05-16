<?php
include "inc/head.php";
$id = htmlentities($_GET['id'],  ENT_QUOTES,  "utf-8");
$adress = htmlentities($_GET['adress'],  ENT_QUOTES,  "utf-8");
$results = $connect->query("SELECT * FROM adress WHERE adress LIKE '$adress' LIMIT 1");
$this_house =  $results->num_rows == 1 ? $results->fetch_array(MYSQLI_ASSOC) : '';
/////////Если данных нет то осталяем без изменений, если есть добавляем их в переменную
$complete = empty(htmlentities($_GET['check'],  ENT_QUOTES,  "utf-8")) ? 0 : $_GET['check'],  ENT_QUOTES,  "utf-8");
$dopzamok =  empty(htmlentities($_GET['dopzamok'],  ENT_QUOTES,  "utf-8")) ? $this_house['dopzamok'] : htmlentities($_GET['dopzamok'],  ENT_QUOTES,  "utf-8");
$vihod1 =  empty(htmlentities($_GET['vihod']['0'],  ENT_QUOTES,  "utf-8")) ? $this_house['vihod'] : htmlentities($_GET['vihod']['0'],  ENT_QUOTES,  "utf-8");
$vihod2 =  empty(htmlentities($_GET['vihod']['1'],  ENT_QUOTES,  "utf-8")) ? $this_house['vihod2'] : htmlentities($_GET['vihod']['1'],  ENT_QUOTES,  "utf-8");
$vihod3 =  empty(htmlentities($_GET['vihod']['2'],  ENT_QUOTES,  "utf-8")) ? $this_house['vihod3'] : htmlentities($_GET['vihod']['2'],  ENT_QUOTES,  "utf-8");
$vihod4 =  empty(htmlentities($_GET['vihod']['3'],  ENT_QUOTES,  "utf-8")) ? $this_house['vihod4'] : htmlentities($_GET['vihod']['3'],  ENT_QUOTES,  "utf-8");
$vihod5 =  empty(htmlentities($_GET['vihod']['4'],  ENT_QUOTES,  "utf-8")) ? $this_house['vihod5'] : htmlentities($_GET['vihod']['4'],  ENT_QUOTES,  "utf-8");
$kluch =  empty(htmlentities($_GET['kluch'],  ENT_QUOTES,  "utf-8")) ? $this_house['kluch'] : htmlentities($_GET['kluch'],  ENT_QUOTES,  "utf-8");
$krisha =  empty(htmlentities($_GET['krisha'],  ENT_QUOTES,  "utf-8")) ? $this_house['krisha'] : htmlentities($_GET['krisha'],  ENT_QUOTES,  "utf-8");
$podjezd =  empty(htmlentities($_GET['podjezd'],  ENT_QUOTES,  "utf-8")) ? $this_house['podjezd'] : htmlentities($_GET['podjezd'],  ENT_QUOTES,  "utf-8");
$pon =  empty(htmlentities($_GET['pon'],  ENT_QUOTES,  "utf-8")) ? $this_house['pon'] : htmlentities($_GET['pon'],  ENT_QUOTES,  "utf-8");
$oboryda =  empty(htmlentities($_GET['oboryda'],  ENT_QUOTES,  "utf-8")) ? $this_house['oboryda'] : htmlentities($_GET['oboryda'],  ENT_QUOTES,  "utf-8");
$lesnica =  empty(htmlentities($_GET['lesnica'],  ENT_QUOTES,  "utf-8")) ? $this_house['lesnica'] : htmlentities($_GET['lesnica'],  ENT_QUOTES,  "utf-8");
$pred =  empty(htmlentities($_GET['pred'],  ENT_QUOTES,  "utf-8")) ? $this_house['pred'] : htmlentities($_GET['pred'],  ENT_QUOTES,  "utf-8");
$phone =  empty(htmlentities($_GET['phone'],  ENT_QUOTES,  "utf-8")) ? $this_house['phone'] : htmlentities($_GET['phone'],  ENT_QUOTES,  "utf-8");
$region =  empty(htmlentities($_GET['region'],  ENT_QUOTES,  "utf-8")) ? $this_house['region'] : htmlentities($_GET['region'],  ENT_QUOTES,  "utf-8");
$text =  empty(htmlentities($_GET['text'],  ENT_QUOTES,  "utf-8")) ? $this_house['text'] : htmlentities($_GET['text'],  ENT_QUOTES,  "utf-8");
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
new = '$new',
complete = '$complete'
WHERE id = '$id'";
if ($connect->query($sql) === true) {
redirect("/result.php?adress=$adress");
} else {
echo "Ошибка: " . $sql . "<br>" . $connect->error;
}
include 'inc/foot.php';