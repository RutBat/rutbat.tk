<?php
define("DB_HOST","127.0.0.1");
define("DB_NAME","ard"); //Имя базы
define("DB_USER","root"); //Пользователь
define("DB_PASSWORD",""); //Пароль
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysqli -> query("SET NAMES 'utf8'") or die ("Ошибка соединения с базой!");
if(!empty($_POST["referal"])){ //Принимаем данные
    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));
    $db_referal = $mysqli -> query("SELECT * from adress WHERE adress LIKE '%$referal%'")
    or die('Ошибка №'.__LINE__.'<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');
    while ($row = $db_referal -> fetch_array()) {
        echo "\n<li>".$row["adress"]."</li>"; //$row["name"] - имя поля таблицы
    }
}
?>