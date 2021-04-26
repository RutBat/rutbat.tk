<?php
include 'inc/db.php';
$log = trim(htmlspecialchars($_POST['login']));
$pass = trim(htmlspecialchars($_POST['pass']));
//////////////////ВЫХОД ИЗ СИСТЕМЫ//////////
if (isset($_GET['off'])) {
session_start();
setcookie('user', '', 1);
$_SESSION['current_user'] = [];
setcookie('pass', '', 1);
$_SESSION['pass256'] = [];

echo '<script type="text/javascript">location.replace("/auth.php");</script>';
}
////////////////////////если авторизация верна то пишем куки, если нет на стр. ошибок///////
if (!empty($log) && !empty($pass)) {
$us = $connect->query("SELECT * FROM `user` WHERE `name` = '" . $log . "'");
if ($us->num_rows != 0) {
$user = $us->fetch_array(MYSQLI_ASSOC);
$pass_256 = hash('sha256', $pass); // Хэш по алгоритму sha256
if ($pass_256 == $user['pass']) {
setcookie('user', $log, time() + 60 * 60 * 24 * 365);
setcookie('pass', $pass_256, time() + 60 * 60 * 24 * 365);
echo '<script type="text/javascript">location.replace("/index.php");</script>';




$user = $log;
$date = date("d.m.Y H:i:s");
$text = 'успешно авторизовался';
$log = "Пользователь $user $text";
$zap = "INSERT INTO log (kogda, log)
		VALUES (
		'$date',
		'$log'
		)";
		if ($connect->query($zap) === false) {
	echo "Ошибка: " . $sql . "<br>" . $connect->error;	} 



} else {
echo '<script type="text/javascript">location.replace("/auth.php?err");</script>';
}
exit();
} else {
echo '<script type="text/javascript">location.replace("/auth.php?er99r");</script>';
}
}
/////////////////////Шапка сайта со всеми стилями и прочим (так проще чем переписывать function)////////////////////////////////////
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="favicon.ico">
  <script src="https://use.fontawesome.com/0520cca6ce.js"></script>
  <!--<link rel="stylesheet" href="/css/style.css">-->
  <script src="js/util.js"></script>
  <script src="js/jquery-3.5.1.js"></script>
  <title>Помощник выходов на крышу)</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.css"> 
</head>
<body style = "background: #ffffff url(img/bg.png) repeat;">
  <div class="container-sm">
  <link rel="stylesheet" href="/css/pravki.css">
<?php
				include "inc/navbar.php"; //навбар
				//////////////////////////////////////////////РЕГИСТРАЦИЯ///////////////////////////////////////////
				if (isset($_GET['reg'])) { ?>
				<main role="main">
					<div class="jumbotron" style = "padding: 1rem 0rem;margin-bottom: 0rem;">
						<div class="col-sm-8 mx-auto">
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
							<main role="main">
								<div class="jumbotron" style="padding: 0rem 0rem; margin-bottom: 0rem;">
									<div class="col-sm-8 mx-auto">
										<div class="form-row">
											<div class="col-md-8 col-sm-12  mx-auto">
												<li class="list-group-item">
													<form method="POST" action="/auth.php">
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
										</li>
									</div>
									</div>
								
						<?php ///низ сайта
						include 'inc/foot.php';
						?>