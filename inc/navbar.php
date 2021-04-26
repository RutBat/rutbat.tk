<?php
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded" style = "border-radius: 0rem!important;" >
<a class="navbar-brand" href="/index"><img src = "/img/logo.png?123" ></a>';




if (!empty($_COOKIE['user']))
{
?>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation"> 
  <span class="navbar-toggler-icon">
  </span> 
</button>
<div class="collapse navbar-collapse" id="navbarsExample09">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item"> 
      <a class="nav-link" href="/admin">
        Добавить дом
      </a> 
    </li>
        <li class="nav-item"> 
      <a class="nav-link" href="add_adr_null">
       Шаблон
      </a> 
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/index">
        Поиск домов
      </a> 
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/all">
        Все
      </a> 
    </li>
    <li class="nav-item dropdown"> 
      <a class="nav-link dropdown-toggle" href="/" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Дополнительно
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdown09"> 
        <a class="dropdown-item" href="https://yadi.sk/d/2xbaFxau5H6b3Q">Пингер APK
        </a> 
        <a class="dropdown-item" href="/ard.apk">Приложение
        </a> 
        <a class="dropdown-item" href="/ins">Инструкция!!!
        </a> 
<!--         <a class="dropdown-item" href="http://192.168.0.1">192.168.0.1
        </a> 
        <a class="dropdown-item" href="http://192.168.1.1">192.168.1.1
        </a>  -->
      </div>
    </li>
  </ul>
  <a href="/user.php" class="btn btn-secondary">
    <?=$_COOKIE['user'];?>
  </a>
</div>


<?php
}?>
</nav>