<?php

include 'inc/head.php';

if (isset($_GET['err'])) {
//ОШИБКА АВТОРИЗАЦИИ

    $error = h(e($_GET['err']));

//alrt("Ошибка $error", "danger", "2");





    ?>

<script type="text/javascript">
alert('Ошибка <?=$error?>')

document.location.replace("/auth");
</script>

<?php

exit();

}







if (isset($_GET['reg'])) { ?>



<head>

    <title>Регистрация</title>

</head>

<center>Придумайте логин и пароль.<br>Пример: <i><b>

            <font color="red">UserName</font>

        </b></i> </center>

<center>Так же внимательно укажите свой регион</center>

<form method="GET" action="/reg.php">

    <div class="form-row">

        <div class="col-md-8 col-sm-12  mx-auto">

            <li class="list-group-item">

                <input type="text" name="login" class="form-control" required title="Введите от 4 символов"
                    placeholder="Логин">

                <input type="text" name="pass" class="form-control" required title="Введите от 4 символов"
                    placeholder="Пароль">

                <?php

            //////ВЫВОД ИЗ БАЗЫ ВСЕХ РЕГИОНОВ/////////

                echo '<small  class="text-danger form-text">Регион</small><select name="region" class="form-select mr-sm-2">';

                            $reg = $connect->query("SELECT * FROM region ");

                while ($region = $reg->fetch_object()) {
                    echo "<option $sel_region value='$region->name'>$region->name</option>";
                }

                echo '</select>';

            //////////////////////////////////////////

                ?>

                <hr>
                <div class="d-grid gap-2">

                    <button type="submit" class="btn btn-warning btn-lg ">Регистрация</button>
                </div>

            </li>

        </div>

    </div>

</form>

</div>

<?php

    include 'inc/foot.php';

    exit();
}

///////////////////////////////////////закончилась регистрация///////////////////////////////////////////////////////////



//////АВТОРИЗАЦИЯ

?>



<head>

    <title>Авторизация</title>

</head>

<li class="list-group-item">

    <form method="POST" action="/auth_obr.php">

        <div class="m-3">

            <center>Для пользования сервисом авторизуйтесь или зарегистрируйтесь под своей учетной записью</center>

            <br>

            <input name="login" id="exampleInputlogin" type="text" class="form-control" placeholder="Введите логин">

        </div>

        <div class="m-3">

            <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">

        </div>

        <hr>


        <div class="d-grid gap-2">

            <button type="submit" class="btn btn-warning btn-lg ">Вход</button>

        </div>



    </form> <br>
    <div class="d-grid gap-2">

        <a class="btn btn-danger btn-lg" href="/auth.php?reg">Новый пользователь?</a>
    </div>

    </div>

    <?php ///низ сайта

    include 'inc/foot.php';

    ?>