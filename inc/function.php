<?php
session_start();
include('inc/db.php');
function alrt($text,$why,$tim)
{
?>
<script src="js/bootstrap.min.js"></script>
<div class="toast" role="alert" data-delay="<?=$tim?>000" data-autohide="true">
	<div class=" alert alert-<?=$why?>">
		<?=$text?>
	</div>
</div>
<script>
$('.toast').toast('show');
</script>
<?php
}
function e($string)
{
return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
<link rel="stylesheet" type="text/css" href="css/preloader.css" />
<?php
function redirect ($url) {
?>
<div class="d-flex justify-content-center" style = "
		padding: 25% 25%;
    height: 70%;">
<div class="loader">
</div>
</div>
<?php
echo'<meta http-equiv="refresh" content="0;URL='."$url".'">';
}
function red_index ($url) {
echo'<meta http-equiv="refresh" content="0;URL='."$url".'">';
}
function redir ($url,$tim) {
?>
<meta http-equiv="refresh" content="<?=$tim?>;URL=<?=$url?>">
<?php
		}
		function preloader () {
			echo'
<div id="p_prldr">
	<div class="contpre">
		<br>
		<img src = "/img/logo.png" >
		<br>
		<br>
		<br>
		<div class="d-flex justify-content-center">
			<div class="spinner-border" role="status">
			</div>
		</div>
	</div>
</div>
			';
		}
$user = $_COOKIE['user'];
		// if(empty($user)){
		// 	$gde = $_SERVER["REQUEST_URI"];
		// 	if($gde != "/auth.php" && $gde != "/auth.php?reg" && $gde != "/reg.php" && $gde != "auth.php?err" ){
		// 		red_index('/auth.php');
		// 	}
		// }

$user = $connect->query("SELECT * FROM `user` WHERE `name` = '". $user ."'");
if ($user->num_rows != 0) {
//Глобальная переменная пользователя
$usr = $user->fetch_array(MYSQLI_ASSOC);
}




$name = $_COOKIE['user'];
$pass = $_COOKIE['pass'];
$user = $connect->query("SELECT * FROM `user` WHERE `name` = '". $name ."' and `pass` = '". $pass ."'");
if ($user->num_rows == 0) {
			$gde = $_SERVER["REQUEST_URI"];
			if($gde != "/auth.php" && $gde != "/auth.php?reg" && $gde != "/reg.php" && $gde != "auth.php?err" && $gde != "reg.php?success" ){
				red_index('/auth.php');
exit();
			}
}












//функция вывода результата из базы данных
function out_sel ($val1,$val2,$val3) {
global $connect;
$results = $connect->query("SELECT * FROM adress WHERE adress LIKE '$val2' ");

while ($row = $results->fetch_object()) {

echo"<small  class='form-text text-muted'>$val3</small><select name='$val1' class='custom-select mr-sm-2'>";
	$krish = $connect->query("SELECT * FROM $val1");
	while ($krisha = $krish->fetch_object()) {
	if ($row->$val1 == $krisha->name) {
	$sel_krisha = "selected";
	} else {
	$sel_krisha = "";
	}
	
	echo "<option $sel_krisha value='$krisha->name'>$krisha->name</option>";
	
	}
echo '</select>';
										}
							}


function out_in ($val1,$val2,$val3) {
global $connect;
$results = $connect->query("SELECT * FROM adress WHERE adress LIKE '$val2' ");

while ($row = $results->fetch_object()) {


print '

<small  class="form-text text-muted">
'.$val3.'
</small>
<input name = "'.$val1.'" 
type="text" 
class="form-control" 
value = "'.$row->$val1.'" 
placeholder="'.$row->$val1.'">

';




					}
				}