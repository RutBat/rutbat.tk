<?php
include "inc/head.php"; ?>
		<br>
		<center>Поиск информации о конкретных домах или улице входящих в сеть интернет провайдера 
			<i>
				<b><font color="red">Ardinvest</font></b>
			</i>.
			<br>Пример: 
			<i>
				<b><font color="red">Набережная 85</font></b> или просто 
				<b><font color="red">Набережная</font></b>
			</i> 
		</center>
		<br>
		<form method="GET" action="/result.php">
			<div class="form-row">
				<div class="col-9">
					<input autocomplete="on" list="provlist" type="text" name="adress" class="form-control" required title="Введите от 4 символов" placeholder="Введите адрес">
				</div>
				<div class="col-3">
					<b><input type="submit" class="bg-warning btn" value="Поиск"> </b>
				</div>
			</div>
		</form>
	</div>
	<?php include 'inc/foot.php';?>