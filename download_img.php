<?php
include "inc/head.php"; ?>
        <ul class="list-group">
          <li class="list-group-item">
            <?
$uploaddir = 'img/';
// это папка, в которую будет загружаться картинка
$apend="$usr[name].png"; 
// это имя, которое будет присвоенно изображению 
$uploadfile = "$uploaddir$apend"; 
//в переменную $uploadfile будет входить папка и имя изображения

// В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
// И проходит ли изображение по весу. В нашем случае до 512 Кб
if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=10240000)) 
{ 
// Указываем максимальный вес загружаемого файла. Сейчас до 512 Кб 
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
   { 
   //Здесь идет процесс загрузки изображения 
   $size = getimagesize($uploadfile); 
   // с помощью этой функции мы можем получить размер пикселей изображения 
     if ($size[0] < 2800 && $size[1]<2500) 
     { 
     // если размер изображения не более 500 пикселей по ширине и не более 1500 по  высоте 
     alrt("Файл загружен","success","1"); 
     redir("user","1");
     } else {
     echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 800; высота не более 1500)"; 
     unlink($uploadfile); 
     // удаление файла 
     } 
   } else {
   echo "Файл не загружен, вернитеcь и попробуйте еще раз";
   } 
} else { 
echo "Размер файла не должен превышать 1mb";
} ?>
          </li>
        </ul>
<?php include 'inc/foot.php';?>