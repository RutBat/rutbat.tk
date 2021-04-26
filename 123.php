<?php
include "inc/head.php";
?>
<main role="main">
	<div class="jumbotron" style = "padding: 1rem 0rem;margin-bottom: 0rem;">
		<div class="col-sm-8 mx-auto">
			<form method="GET" action="/reg.php">
				<div class="form-row">
					<div class="col-md-8 col-sm-12  mx-auto">
						<li class="list-group-item">
							<input type="adress" name="login" class="form-control" required title="Введите адрес" placeholder="Введите адрес">
							<?php
							if ($usr['admin'] == '1') {
							echo '<small  class="text-danger form-text">Регион</small><select name="region" class="custom-select mr-sm-2">';
									$reg = $connect->query("SELECT * FROM region ");
									echo '<small  class="form-text text-muted">В каком регионе: <b>' .
									$usr['region'] .
									'</b></small><br>';
									while ($region = $reg->fetch_object()) {
									if ($usr['region'] == $region->name) {
									$sel_region = "selected";
									} else {
									$sel_region = "";
									}
									echo "<option $sel_region value='$region->name'>$region->name</option>";
									}
							echo '</select>';
							} else {
							echo "<input type='hidden' name='region' value='$usr[region]'>";
							}
							echo '<small  class="form-text text-muted">Тип подключения</small>';
							echo '<select name="pon" class="custom-select mr-sm-2">';
									$pon1 = $connect->query("SELECT * FROM pon ");
									while ($pon = $pon1->fetch_object()) {
									echo "<option $sel_pon value='$pon->name'>$pon->name</option>";
									}
								?>
							</select>
						<hr><button type="submit" class="btn btn-warning btn-lg btn-block">Регистрация</button></li>
					</div>	</div>
				</form>
			</div>
			<?php include 'inc/foot.php';?>