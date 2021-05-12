<?php
include "inc/head.php";
?>
<head><title>Главная</title>
	<script type="text/javascript" src="searcher.js"></script>
</head>
<div class="container">
	
	<br>
	<center>Поиск информации о конкретных домах или улице входящих в сеть интернет провайдера
	<i>
	<b><font color="red">Ardinvest</font></b>
	</i>.
	<br>Пример:
	<i>
	<b><font color="red">Набережная 85</font></b> или просто
	<b><font color="red">Набережная</font></b>
	</i> <br>
	<small><b><a href = "/ins" >О том как работает поиск</a></b></small>
	</center>
	<br>
	<form id = 'ard' method="GET" action="/result.php">
		<div class="form-row" style="widows: 80%;">
			<div class="col-9">
				<input type="text" autocomplete="off" id="search" name="adress" class="form-control" required title="Введите от 4 символов" placeholder="Введите адрес">
				
				<ul class="list-group">
					<div id="display"></div>
				</ul>
				
			</div>
			<div class="col-3 block">
				<a onclick="document.getElementById('ard').submit()" class="block btn btnani btn-3">Поиск</a>
			</div>
		</div>
	</form>
</div></div>
<?php include 'inc/foot.php';?>