<?php
include "inc/head.php";
AutorizeProtect(); ?>
<head><title>Инструкция</title></head>
<ul class="list-group">
<!-- 					<li class="list-group-item list-group-item-warning">О <b>багах</b> и <b>пожеланиях</b> говорите, не молчите, сервис сделан для нашего же удобства. Нам же хорошо когда всё работает хорошо и удобно</li>
-->
<li class="list-group-item list-group-item-danger"> При авторизации/регистрации в данном сервисе вы окажетесь на странице поиска, так же вы увидите навигационную панель.
<br>О ней подробнее ниже: </li>
<li class="text-center list-group-item-success list-group-item">Добавить дом/Шаблон</li>
<li class="list-group-item">
	В меню добавления дома можно поэтапно добавить информацию в общую базу данных. <br>
	В меню Шаблон можно добавить просто адрес (для дальнейшего заполнения).<br>
	Дом добавляется в тот регион пользователем какого вы явлетесь.<br>
</li>
<li class="text-center list-group-item-success list-group-item">Поиск домов</li>
<li class="list-group-item">
	В данном меню(оно же главная страница) можно найти любой дом из базы.
	Если вы работаете (пример) в 1 регионе а вам нужно найти дом (пример) 11 региона то введя его в поиске вы сможете посмотреть информацию о нем.
	Редактирование дома доступно только в своем регионе. <br>
	Поиск работает по таким запросам:<br>
	<b>по улице</b> (Киевская)<br>
	<b>по адресу</b> (Киевская 100)<br>
	<b>по номеру дома</b> (100)<br>
	<b>по готовности</b> (Готово)<br>
	<b>по технологии подключения</b> (pon/ethernet)
</li>
<li class="text-center list-group-item-success list-group-item">Все</li>
<li class="list-group-item">
	Перейдя в данное меню вы увидите все дома своего региона.<br>
	При нажатии соответствуещей кнопки можно посмотреть абсолютно все адреса которые есть в базе.
</li>
<li class="text-center list-group-item-success list-group-item">Дополнительно</li>
<li class="list-group-item ">В этом меню можно скачать мобильную версию приложения для удобства доступа.
	<br> Можно скачать "Пингер",
</li>
<li class="text-center list-group-item-success list-group-item"><?=$usr[name]?></li>
<li class="list-group-item ">Меню пользователя:
	<br> Смена аватара
	<br>Администраторам можно посмотреть log активностей пользователей
	<br>Выйти из системы
	<br><i>Меню будет модернизироватся</i>
</li>
</ul>
<?php include 'inc/foot.php';
?>