<?php
include "inc/function.php";
AutorizeProtect();
$id = h($_GET['id']);
$adress = h($_GET['adress']);
$results = $connect->query("SELECT * FROM adress WHERE adress LIKE '$adress' LIMIT 1");
$this_house =  $results->num_rows == 1 ? $results->fetch_array(MYSQLI_ASSOC) : '';
/////////Если данных нет то осталяем без изменений, если есть добавляем их в переменную
$complete = empty(h($_GET['check'])) ? 0 : h($_GET['check']);
$dopzamok =  empty(h($_GET['dopzamok'])) ? $this_house['dopzamok'] : h($_GET['dopzamok']);
$vihod1 =  empty(h($_GET['vihod']['0'])) ? $this_house['vihod'] : h($_GET['vihod']['0']);
$vihod2 =  empty(h($_GET['vihod']['1'])) ? $this_house['vihod2'] : h($_GET['vihod']['1']);
$vihod3 =  empty(h($_GET['vihod']['2'])) ? $this_house['vihod3'] : h($_GET['vihod']['2']);
$vihod4 =  empty(h($_GET['vihod']['3'])) ? $this_house['vihod4'] : h($_GET['vihod']['3']);
$vihod5 =  empty(h($_GET['vihod']['4'])) ? $this_house['vihod5'] : h($_GET['vihod']['4']);
$kluch =  empty(h($_GET['kluch'])) ? $this_house['kluch'] : h($_GET['kluch']);
$krisha =  empty(h($_GET['krisha'])) ? $this_house['krisha'] : h($_GET['krisha']);
$podjezd =  empty(h($_GET['podjezd'])) ? $this_house['podjezd'] : h($_GET['podjezd']);
$pon =  empty(h($_GET['pon'])) ? $this_house['pon'] : h($_GET['pon']);
$oboryda =  empty(h($_GET['oboryda'])) ? $this_house['oboryda'] : h($_GET['oboryda']);
$lesnica =  empty(h($_GET['lesnica'])) ? $this_house['lesnica'] : h($_GET['lesnica']);
$pred =  empty(h($_GET['pred'])) ? $this_house['pred'] : h($_GET['pred']);
$phone =  empty(h($_GET['phone'])) ? $this_house['phone'] : h($_GET['phone']);
$region =  empty(h($_GET['region'])) ? $this_house['region'] : h($_GET['region']);
$text =  empty(h($_GET['text'])) ? $this_house['text'] : h($_GET['text']);
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
    echo "Ошибка: " . $zap . "<br>" . $connect->error;
}
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
    red_index("/result.php?adress=$adress&success");
    exit;
} else {
    echo "Ошибка: " . $sql . "<br>" . $connect->error;
}
include 'inc/foot.php';
