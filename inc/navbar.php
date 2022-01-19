<?php
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded p-2" style = "border-radius: 0rem!important;" >
  <a class="navbar-brand" href="/index"><img src = "/img/logo.png" alt = "Логотип" ></a>';
if (!empty(htmlentities($_COOKIE['user']))) {
    ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon">
  </span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExample09">
    <ul class="navbar-nav me-auto">
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
          <a class="dropdown-item" href="https://disk.yandex.ru/d/8JXHnBMnTdg9XA">Пингер APK
          </a>
          <a class="dropdown-item" href="/ard.apk">Приложение
          </a>
          <a class="dropdown-item" href="/ins">Инструкция!!!
          </a>
        </div>
      </li>
    </ul>
    <?php
    $filename = "img/$usr[name].png";
    $tim = filemtime("img/$usr[name].png");
    if (file_exists($filename)) {
        $ava = "img/$usr[name].png?r=$tim";
    } else {
        $ava = "img/user.png";
    }
    ?>
    <a href="/user.php" class="btn btn-secondary">
      <img src="<?=$ava?>" width="32px" height = "32px" style=" border-radius: 1rem;" alt = "Аватарка">
    <?=$usr['name'];?>
    </a>
  </div>
    <?php
}?>
</nav>
