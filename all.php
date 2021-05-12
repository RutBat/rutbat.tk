<?php
include "inc/head.php";
?>
<head><title>Список домов</title></head>
<?
if (!isset($_GET['all']))
{
echo '<a href = "/all.php?all" class="btn bg-warning btn-block">Посмотреть все адреса</a>';
}
else
{
echo '<a href = "/all.php" class="btn bg-warning btn-block">Посмотреть все адреса: ' . "$usr[region]" . '</a>';
}
if ($_GET['id'] == "ok")
{
alrt("Успешно удаленно", "success", "2");
}
$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
$size_page = 9;
$offset = ($pageno - 1) * $size_page;
$adrs = $_GET['adress'];
$tech = $_GET['tech'];
if (!empty($_GET['adress']))
{
$sql = "SELECT * FROM `adress` WHERE adress LIKE '%$adrs%' ORDER BY `adress` ASC LIMIT $offset, $size_page";
$pages_sql = "SELECT COUNT(*) FROM `adress` WHERE adress LIKE '%$adrs%'";
$split = "&adress=$adrs";
}
else
{
$all = $_GET['all'];
$sql = "SELECT * FROM adress WHERE region LIKE '$usr[region]' ORDER BY `adress` ASC LIMIT $offset, $size_page";
$pages_sql = "SELECT COUNT(*) FROM `adress` WHERE region LIKE '$usr[region]'";
if (isset($all))
{
$sql = "SELECT * FROM adress  ORDER BY `adress` ASC LIMIT $offset, $size_page";
$pages_sql = "SELECT COUNT(*) FROM `adress`";
}
}
if($tech == 'complete'){
$sql = "SELECT * FROM `adress` WHERE complete LIKE '1' ORDER BY `adress` ASC LIMIT $offset, $size_page";
$pages_sql = "SELECT COUNT(*) FROM `adress` WHERE complete LIKE '1'";
$split = "&adress=$adrs";
$types = "&tech=$tech";
}
if($tech == 'pon'){
$sql = "SELECT * FROM `adress` WHERE pon LIKE 'Gpon' ORDER BY `adress` ASC LIMIT $offset, $size_page";
$pages_sql = "SELECT COUNT(*) FROM `adress` WHERE pon LIKE 'Gpon'";
$split = "&adress=$adrs";
$types = "&tech=$tech";
}
if($tech == 'ethernet'){
$sql = "SELECT * FROM `adress` WHERE pon LIKE 'Ethernet' ORDER BY `adress` ASC LIMIT $offset, $size_page";
$pages_sql = "SELECT COUNT(*) FROM `adress` WHERE pon LIKE 'Ethernet'";
$split = "&adress=$adrs";
$types = "&tech=$tech";
}
////////Поиск по адресу
//$pages_sql = "SELECT COUNT(*) FROM `adress`";
$result = mysqli_query($connect, $pages_sql);
$total_rows = mysqli_fetch_array($result) [0];
$total_pages = ceil($total_rows / $size_page);
$res_data = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($res_data))
{

$color = $row['new'] == 1 ? 'text-danger' : '';
$complete_color = $row['complete'] ? 'style = "color: forestgreen;"' : '';
$text = $row['new'] == 1 ? 'NEW' : '';
?>
<script type="text/javascript">
function startdel(i) {
if(confirm("Точно удалить дом из базы?")) {
parent.location = 'del.php?id=' + i;
}
}
</script>

<li class="list-group-item">
<a <?=$complete_color?> class = "<?=$color?>" href = "/result?adress=<?=$row['adress']?>">
	<label for="exampleInputEmail1"><?=$text?> <?=$row['adress']?></label>
</a>
<? if ($usr['region'] == $row['region'] || $usr['admin'] == '1')
{?>
<a href="JavaScript:startdel(<?=$row['id']?>)" class="close">
	<span aria-hidden="true">&times;</span>
</a>
<?  }
echo '</li>';
}
mysqli_close($connect);
?>
<ul class="pagination"> <a href="?pageno=1" type="button" class="col-md-3 col-sm-3  mx-auto btn btn-warning">1</a>
<a
href="<?php if ($pageno <= 1){echo '#';}else{echo " ?pageno=" . ($pageno - 1) . $split . $types;}?>"
type="button"
class="col-md-3 col-sm-3  mx-auto btn btn-warning <?php if ($pageno <= 1){echo 'disabled';} ?>">
<i class="fa fa-angle-double-left" aria-hidden="true"></i>
</a>
<a
href="<?php if ($pageno >= $total_pages){echo '#';}else{echo " ?pageno=" . ($pageno + 1) . $split . $types;} ?>"
type="button"
class="col-md-3 col-sm-3  mx-auto btn btn-warning <?php if ($pageno >= $total_pages){echo 'disabled';} ?>">
<i class="fa fa-angle-double-right" aria-hidden="true"></i>
</a>
<a
href="?pageno=<?=$total_pages ?>"
type="button"
class="col-md-3 col-sm-3  mx-auto btn btn-warning">
<?=$total_pages?>
</a>
</ul>
</div>

<?php
include 'inc/foot.php';
?>