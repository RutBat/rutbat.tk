<?php
include 'inc/head.php';
if (isset($_GET['reg'])) { ?>
<head><title>Регистрация</title></head>
<center>Придумайте логин и пароль.<br>Пример: <i><b><font color="red">UserName</font></b></i>	</center>
<center>Так же внимательно укажите свой регион</center>
<form method="GET" action="/reg.php">
<div class="form-row">
	<div class="col-md-8 col-sm-12  mx-auto">
		<li class="list-group-item">
			<input type="text" name="login" class="form-control" required title="Введите от 4 символов" placeholder="Логин">
			<input type="text" name="pass" class="form-control" required title="Введите от 4 символов" placeholder="Пароль">
			<?php
			//////ВЫВОД ИЗ БАЗЫ ВСЕХ РЕГИОНОВ/////////
			echo '<small  class="text-danger form-text">Регион</small><select name="region" class="custom-select mr-sm-2">';
						$reg = $connect->query("SELECT * FROM region ");
						while ($region = $reg->fetch_object()) {
						echo "<option $sel_region value='$region->name'>$region->name</option>";
						}
			echo '</select>';
			//////////////////////////////////////////
			?>
			
		<hr><button type="submit" class="btn btn-warning btn-lg btn-block">Регистрация</button></li>
	</div>	</div>
</form>
</div>
<?php
include 'inc/foot.php';
exit();
}
///////////////////////////////////////закончилась регистрация///////////////////////////////////////////////////////////
if (isset($_GET['err'])) {
//ОШИБКА АВТОРИЗАЦИИ
echo '
<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Ошибка!</strong> Пользователь не найден
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>';
echo '<meta http-equiv="refresh" content="1;URL=/auth.php">';
exit();
}
//////АВТОРИЗАЦИЯ
?>
<head><title>Авторизация</title></head>
<li class="list-group-item">
	<form method="POST" action="/auth_obr.php">
		<div class="form-group">
			<center>Для пользования сервисом авторизуйтесь или зарегистрируйтесь под своей учетной записью</center>
			<br>
			<input name="login" id="exampleInputlogin" type="text" class="form-control" placeholder="Введите логин">
		</div>
		<div class="form-group">
			<input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
		</div>
		<hr>
		<div class="form-group">
			<button type="submit" class="btn btn-warning btn-lg btn-block">Вход</button>
		</div>
	</form> <a class="btn btn-danger btn-lg btn-block" href="/auth.php?reg">Новый пользователь?
</a>
</div>
<?php ///низ сайта
include 'inc/foot.php';
?>