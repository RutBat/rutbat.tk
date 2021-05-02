<?php
session_start();
include ("inc/function.php");
echo '
<!doctype html>
<html lang="ru">';
$gde = $_SERVER["REQUEST_URI"];
if ($gde == "/")
{
    preloader();
}
include ("inc/style.php");
?>

<body style = "background: #ffffff url(img/bg.png) repeat;">
  <div class="container-sm">
  <link rel="stylesheet" href="/css/pravki.css?ver=<?=rand(1,2000)?>">
<?php
include ("inc/navbar.php");
?>
<main role="main">
  <div style="padding: 0rem 0rem;" class="jumbotron">
    <div class="col-md-8 col-sm-12  mx-auto">