<?php
include "inc/head.php";
?>
<head><title>Добавить дом</title></head>
<?
if(isset($_GET['adress']) &&  isset($_GET['region'])){
session_start();
$_SESSION['adress'] = trim($_GET['adress']);
$_SESSION['region'] = $_GET['region'];
$_SESSION['step'] = $_GET['step'];
}
if(isset($_GET['oboryda']) &&  isset($_GET['pon'])){
session_start();
$_SESSION['oboryda'] = $_GET['oboryda'];
$_SESSION['pon'] = $_GET['pon'];
$_SESSION['step'] = $_GET['step'];
}
if($_GET['step'] == 3){
session_start();
if(!empty($_GET['lesnica'])){$_SESSION['lesnica'] = $_GET['lesnica'];}
if(!empty($_GET['podjezd'])){$_SESSION['podjezd'] = $_GET['podjezd'];}
if(!empty($_GET['dopzamok'])){$_SESSION['dopzamok'] = $_GET['dopzamok'];}
if(!empty($_GET['vihod'])){$_SESSION['vihod'] = $_GET['vihod'];}
if(!empty($_GET['krisha'])){$_SESSION['krisha'] = $_GET['krisha'];}
if(!empty($_GET['klych'])){$_SESSION['klych'] = $_GET['klych'];}
if(!empty($_GET['podjezd'])){$_SESSION['podjezd'] = $_GET['podjezd'];}
$_SESSION['step'] = $_GET['step'];
}
if($_GET['step'] == "final"){
session_start();
$_SESSION['step'] = $_GET['step'];
if(!empty($_GET['pred'])){$_SESSION['pred'] = $_GET['pred'];}
if(!empty($_GET['phone'])){$_SESSION['phone'] = $_GET['phone'];}
if(!empty($_GET['text'])){$_SESSION['text'] = $_GET['text'];}
$adress = $_SESSION['adress'];
$vihod1 = $_SESSION['vihod']['0'];
$vihod2 = $_SESSION['vihod']['1'];
$vihod3 = $_SESSION['vihod']['2'];
$vihod4 = $_SESSION['vihod']['3'];
$vihod5 = $_SESSION['vihod']['4'];
$vihod = $_SESSION['vihod'];
$dopzamok = $_SESSION['dopzamok'];
$kluch = $_SESSION['klych'];
$pred = $_SESSION['pred'];
$phone = $_SESSION['phone'];
$oboryda = $_SESSION['oboryda'];
$krisha = $_SESSION['krisha'];
$lesnica = $_SESSION['lesnica'];
$pon = $_SESSION['pon'];
$region = $_SESSION['region'];
$podjezd = $_SESSION['podjezd'];
$text = $_SESSION['text'];
if (empty($adress)) {
echo 'Адрес не указан';
exit;
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
$text = 'добавил дом ';
$log = "Пользователь $user $text $adress";
$zap = "INSERT INTO log (kogda, log)
VALUES (
'$date',
'$log'
)";
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
'$log',
'$user',
'$region',
'$news'
)";
if ($connect->query($sql) === true) {
redirect("/result?adress=$adress");
} else {
echo "Ошибка: " . $sql . "<br>" . $connect->error;
}
////////////////////////////Обнуление сессий при добавлении нового дома//////////////////////////////////////////////////////////////////
$_SESSION['adress'] = '';
$_SESSION['vihod'] = '';
$_SESSION['dopzamok'] = '';
$_SESSION['klych'] = '';
$_SESSION['pred'] = '';
$_SESSION['phone'] = '';
$_SESSION['krisha'] = '';
$_SESSION['podjezd'] = '';
$_SESSION['lesnica'] = '';
$_SESSION['region'] = '';
$_SESSION['pon'] = '';
$_SESSION['oboryda'] = '';
$_SESSION['step'] = '';
session_destroy();
exit;
}
if(empty($_SESSION['adress']) && empty($_SESSION['region'])){
echo'<form method="GET" action="#">';
echo'<li class="list-group-item  justify-content-between align-items-center">';
	////////////////////////////адрес////////////////////////////////////////////////
	echo'<div class="input-group mb-3">';
		echo'<input type="text" name="adress" class="form-control" placeholder="Адрес">';
	echo'</div>';
	////////////////////////////РЕГИОН////////////////////////////////////////////////
	if ($usr['admin'] == '1') {
	echo '<small  class="text-danger form-text">Регион</small><select name="region" class="custom-select mr-sm-2">';
		$reg = $connect->query("SELECT * FROM region ");
		echo '<small  class="form-text text-muted">В каком регионе: <b>' .
		$usr['region'] .
		'</b></small><br>';
		while ($region = $reg->fetch_object()) {
		if ($usr['region'] == $region->name) {
		$sel_region = "selected";
		} else {
		$sel_region = "";
		}
		echo "<option $sel_region value='$region->name'>$region->name</option>";
		}
	echo '</select>';
	} else {
	echo "<input type='hidden' name='region' value='$usr[region]'>";
	}
	echo "<input type='hidden' name='step' value='1'>";
	//////////////////////////////////////////////////////////////////////////////////
	echo'<button type="submit" class="btn bg-warning btn-lg btn-block">Далее</button>';
echo'</li>';
echo'</form>';
echo'</div>';
echo'</div>';
include 'inc/foot.php';
exit();
}

if(empty($_SESSION['oboryda']) || empty($_SESSION['pon']) || $_SESSION['step'] == 1){
echo'<form method="GET" action="#">';
echo'<li class="list-group-item  justify-content-between align-items-center">';
////////////////////////////Где оборудование?////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Где оборудование?</small>';
echo '<select name="oboryda" class="custom-select mr-sm-2">';
$odor = $connect->query("SELECT * FROM oboryda ");
while ($oboryda = $odor->fetch_object()) {
echo "<option value='$oboryda->name'>$oboryda->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////Тип подключения////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Тип подключения</small>';
echo '<select name="pon" class="custom-select mr-sm-2">';
$pon1 = $connect->query("SELECT * FROM pon ");
while ($pon = $pon1->fetch_object()) {
echo "<option $sel_pon value='$pon->name'>$pon->name</option>";
}

echo'</select>';
echo "<input type='hidden' name='step' value='2'>";
echo'<button type="submit" class="btn bg-warning btn-lg btn-block">Далее</button>';
echo'</li>';
echo'</form>';
echo'</div>';
echo'</div>';
include 'inc/foot.php';
exit();
}
if($_SESSION['oboryda'] == 'Фасад' && $_SESSION['step'] == 2 ){
echo'<form method="GET" action="#">';
echo'<li class="list-group-item  justify-content-between align-items-center">';
////////////////////////////Количество подъездов////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Количество подъездов</small>';
echo '<select name="podjezd" class="custom-select mr-sm-2">';
$pod = $connect->query("SELECT * FROM podjezd ");
while ($podjezd = $pod->fetch_object()) {
echo "<option value='$podjezd->name'>$podjezd->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
echo "<input type='hidden' name='step' value='3'>";
echo'<button type="submit" class="btn bg-warning btn-lg btn-block">Далее</button>';
echo'</li>';
echo'</form>';
echo'</div>';
echo'</div>';
include 'inc/foot.php';
exit();
}
if($_SESSION['oboryda'] == 'Подвал' && $_SESSION['step'] == 2){
echo'<form method="GET" action="#">';
echo'<li class="list-group-item  justify-content-between align-items-center">';
////////////////////////////Наличие доп. замка////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Наличие доп. замка</small>';
echo '<select name="dopzamok" class="custom-select mr-sm-2">';
$dop = $connect->query("SELECT * FROM dopzamok ");
while ($dopzamok = $dop->fetch_object()) {
echo "<option value='$dopzamok->name'>$dopzamok->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////В какой квартире ключ////////////////////////////////////////////////
echo'<small  class="form-text text-muted">В какой квартире ключ</small>';
echo'<input name="klych" type="text" class="form-control" placeholder="В какой квартире ключ" aria-label="В какой кв. ключ">';
//////////////////////////////////////////////////////////////////////////////////
echo'<small  class="form-text text-muted">В каком подъезде выход на чердак';
echo'</small>';
echo'	<select multiple name="vihod[]" class="custom-select mr-sm-2">';
$vih = $connect->query("SELECT * FROM vihod ");
while ($vihod = $vih->fetch_object()) {
echo "<option value='$vihod->name'>$vihod->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////Количество подъездов////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Количество подъездов</small>';
echo '<select name="podjezd" class="custom-select mr-sm-2">';
$pod = $connect->query("SELECT * FROM podjezd ");
while ($podjezd = $pod->fetch_object()) {
echo "<option value='$podjezd->name'>$podjezd->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
echo "<input type='hidden' name='step' value='3'>";
echo'<button type="submit" class="btn bg-warning btn-lg btn-block">Далее</button>';
echo'</li>';
echo'</form>';
echo'</div>';
echo'</div>';
include 'inc/foot.php';
exit();
}
if($_SESSION['oboryda'] == 'Чердак' && $_SESSION['step'] == 2){
echo'<form method="GET" action="#">';
echo'<li class="list-group-item  justify-content-between align-items-center">';
////////////////////////////Какая крыша?////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Какая крыша?</small>';
echo '<select name="krisha" class="custom-select mr-sm-2">';
$kri = $connect->query("SELECT * FROM krisha ");
while ($krisha = $kri->fetch_object()) {
echo "<option value='$krisha->name'>$krisha->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////Наличие лестницы////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Наличие лестницы</small>';
echo '<select name="lesnica" class="custom-select mr-sm-2">';
$les = $connect->query("SELECT * FROM lesnica ");
while ($lesnica = $les->fetch_object()) {
echo "<option value='$lesnica->name'>$lesnica->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////Наличие доп. замка////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Наличие доп. замка</small>';
echo '<select name="dopzamok" class="custom-select mr-sm-2">';
$dop = $connect->query("SELECT * FROM dopzamok ");
while ($dopzamok = $dop->fetch_object()) {
echo "<option value='$dopzamok->name'>$dopzamok->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////В какой квартире ключ////////////////////////////////////////////////
echo'<small  class="form-text text-muted">В какой квартире ключ</small>';
echo'<input name="klych" type="text" class="form-control" placeholder="В какой квартире ключ" aria-label="В какой кв. ключ">';
/////////////////////////////////////////////////////В каком подъезде выход на чердак/////////////////////////////
echo'<small  class="form-text text-muted">В каком подъезде выход на чердак';
echo'</small>';
echo'	<select multiple name="vihod[]" class="custom-select mr-sm-2">';
$vih = $connect->query("SELECT * FROM vihod ");
while ($vihod = $vih->fetch_object()) {
echo "<option value='$vihod->name'>$vihod->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////Количество подъездов////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Количество подъездов</small>';
echo '<select name="podjezd" class="custom-select mr-sm-2">';
$pod = $connect->query("SELECT * FROM podjezd ");
while ($podjezd = $pod->fetch_object()) {
echo "<option value='$podjezd->name'>$podjezd->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
echo "<input type='hidden' name='step' value='3'>";
echo'<button type="submit" class="btn bg-warning btn-lg btn-block">Далее</button>';
echo'</li>';
echo'</form>';
echo'</div>';
echo'</div>';
include 'inc/foot.php';
exit();
}
if($_SESSION['oboryda'] == 'Подъезд' && $_SESSION['step'] == 2){
echo'<form method="GET" action="#">';
echo'<li class="list-group-item  justify-content-between align-items-center">';
////////////////////////////Наличие доп. замка////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Наличие доп. замка</small>';
echo '<select name="dopzamok" class="custom-select mr-sm-2">';
$dop = $connect->query("SELECT * FROM dopzamok ");
while ($dopzamok = $dop->fetch_object()) {
echo "<option value='$dopzamok->name'>$dopzamok->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////В каком подъезде выход на чердак/////////////////////////////
echo'<small  class="form-text text-muted">В каком подъезде выход на чердак';
echo'</small>';
echo'	<select multiple name="vihod[]" class="custom-select mr-sm-2">';
$vih = $connect->query("SELECT * FROM vihod ");
while ($vihod = $vih->fetch_object()) {
echo "<option value='$vihod->name'>$vihod->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////Количество подъездов////////////////////////////////////////////////
echo '<small  class="form-text text-muted">Количество подъездов</small>';
echo '<select name="podjezd" class="custom-select mr-sm-2">';
$pod = $connect->query("SELECT * FROM podjezd ");
while ($podjezd = $pod->fetch_object()) {
echo "<option value='$podjezd->name'>$podjezd->name</option>";
}
echo '</select>';
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
echo "<input type='hidden' name='step' value='3'>";
echo'<button type="submit" class="btn bg-warning btn-lg btn-block">Далее</button>';
echo'</li>';
echo'</form>';
echo'</div>';
echo'</div>';
include 'inc/foot.php';
exit();
}
if($_SESSION['step'] == 3){
echo'<form method="GET" action="#">';
echo'<li class="list-group-item  justify-content-between align-items-center">';
////////////////////////////Ф.И.О. председателя////////////////////////////////////////////////-->
echo'	<small class="form-text text-muted">Ф.И.О. председателя</small>';
echo'<input name="pred" type="text" class="form-control" placeholder="Председатель Ф.И.О и Кв." aria-label="Председатель">';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////Номер телефона председателя////////////////////////////////////////////////-->
echo'<small class="form-text text-muted">Номер телефона председателя</small>';
echo'<input name="phone" type="tel" name="phone" id="phone" placeholder="+79781234567" class="form-control bfh-phone" data-format="+7 (978) ddd-dddd" value="" pattern="(\+[\d\ \(\)\-]{16})" />';
echo'<small class="form-text text-muted">Для заметок</small>';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////Примечание////////////////////////////////////////////////-->
echo'<textarea name="text" class="form-control" rows="3">Примечание</textarea>';
//////////////////////////////////////////////////////////////////////////////////
////////////////////////////КНОПКА////////////////////////////////////////////////
echo "<input type='hidden' name='step' value='final'>";
echo'<button type="submit" class="btn bg-warning btn-lg btn-block">Добавить дом</button>';
echo'</li>';
echo'</form>';
echo'</div>';
echo'</div>';
include 'inc/foot.php';
exit();
}
session_start();
$_SESSION['adress'] = '';
$_SESSION['vihod'] = '';
$_SESSION['dopzamok'] = '';
$_SESSION['klych'] = '';
$_SESSION['pred'] = '';
$_SESSION['phone'] = '';
$_SESSION['krisha'] = '';
$_SESSION['podjezd'] = '';
$_SESSION['lesnica'] = '';
$_SESSION['region'] = '';
$_SESSION['pon'] = '';
$_SESSION['oboryda'] = '';
$_SESSION['step'] = '';