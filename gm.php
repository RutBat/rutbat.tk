<?php
include "inc/head.php";
?>
<head><title>Админ панель</title></head>
<?
echo'<form method="GET" action="#">';
echo'<li class="list-group-item  justify-content-between align-items-center">';
	////////////////////////////РЕГИОН////////////////////////////////////////////////
	if ($usr['admin'] == '1') {
	
	?>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Регион</th>
				<th scope="col">Кол-во домов</th>
				<th scope="col">Должно быть</th>
				<th scope="col">% готовности</th>
			</tr>
		</thead>
		<tbody>


			<?
			$results = $connect->query("SELECT * FROM conf ");

while ($row = $results->fetch_object()) {
	$adrs = $connect->query("SELECT * FROM `adress` WHERE `region` = '$row->name' ");
$percent = ($row->all_dom /	$adrs->num_rows)	* 100;
$adress = $adrs->fetch_array(MYSQLI_ASSOC);

?>

			<tr>
				<th scope="row"><?=$row->id?></th>
				<td><?=$row->name?></td>
				<td><?=$adrs->num_rows?></td>
				<td><?=$row->all_dom?></td>
				<td><?=$percent?>%</td>
			</tr>
<?
}
					?>
		</tbody>
	</table>
	<?
	echo'<button type="submit" class="btn bg-warning btn-lg btn-block">Далее</button>';
	}
echo'</li>';
echo'</form>';
echo'</div>';
include 'inc/foot.php';
exit();