<?php
include "inc/head.php"; ?>
				<form method="GET" action="/adddom.php">
					<li class="list-group-item  justify-content-between align-items-center">
						<div class="input-group mb-3">
							<input type="text" name="adress" class="form-control" placeholder="Адрес">
						</div>
						<small  class="form-text text-muted">В каком подъезде выход на чердак
						</small>
						<select multiple name="vihod[]" class="custom-select mr-sm-2">
							<?php
							$vih = $connect->query("SELECT * FROM vihod ");
							while ($vihod = $vih->fetch_object()) {
							echo "<option $sel_vih value='$vihod->name'>$vihod->name</option>";
							}
						echo '</select>';
						//////как же я заебался это писать/////////
						//////как же я заебался это писать/////////
						echo '<small  class="form-text text-muted">Количество подъездов</small>';
						echo '<select name="podjezd" class="custom-select mr-sm-2">';
							$pod = $connect->query("SELECT * FROM podjezd ");
							while ($podjezd = $pod->fetch_object()) {
							echo "<option $sel_pod value='$podjezd->name'>$podjezd->name</option>";
							}
						echo '</select>';
						//////как же я заебался это писать/////////
						//////как же я заебался это писать/////////
						echo '<small  class="form-text text-muted">Наличие лестницы</small>';
						echo '<select name="lesnica" class="custom-select mr-sm-2">';
							$les = $connect->query("SELECT * FROM lesnica ");
							while ($lesnica = $les->fetch_object()) {
							echo "<option $sel_les value='$lesnica->name'>$lesnica->name</option>";
							}
						echo '</select>';
						//////как же я заебался это писать/////////
						//////как же я заебался это писать/////////
						echo '<small  class="form-text text-muted">Наличие доп. замка</small>';
						echo '<select name="dopzamok" class="custom-select mr-sm-2">';
							$dop = $connect->query("SELECT * FROM dopzamok ");
							while ($dopzamok = $dop->fetch_object()) {
							echo "<option $sel_dop value='$dopzamok->name'>$dopzamok->name</option>";
							}
							echo '</select><small  class="form-text text-muted">В какой квартире ключ</small><input name="klych" type="text" class="form-control" placeholder="В какой квартире ключ" aria-label="В какой кв. ключ">';
							//////как же я заебался это писать/////////
							//////как же я заебался это писать/////////
							echo '<small  class="form-text text-muted">Какая крыша?</small>';
							echo '<select name="krisha" class="custom-select mr-sm-2">';
									$kri = $connect->query("SELECT * FROM krisha ");
									while ($krisha = $kri->fetch_object()) {
									echo "<option $sel_kri value='$krisha->name'>$krisha->name</option>";
									}
							echo '</select>';
							//////как же я заебался это писать/////////
							if ($usr['admin'] == '1') {
							//////как же я заебался это писать/////////
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
							//////как же я заебался это писать/////////
							//////как же я заебался это писать/////////
							echo '<small  class="form-text text-muted">Тип подключения</small>';
							echo '<select name="pon" class="custom-select mr-sm-2">';
									$pon1 = $connect->query("SELECT * FROM pon ");
									while ($pon = $pon1->fetch_object()) {
									echo "<option $sel_pon value='$pon->name'>$pon->name</option>";
									}
								?>
							</select>
							<small class="form-text text-muted">Ф.И.О. председателя</small>
							<input name="pred" type="text" class="form-control" placeholder="Председатель Ф.И.О и Кв." aria-label="Председатель">
							<small class="form-text text-muted">Номер телефона председателя</small>
							<input name="phone" type="tel" name="phone" id="phone" placeholder="+79781234567" class="form-control bfh-phone" data-format="+7 (978) ddd-dddd" value="" pattern="(\+[\d\ \(\)\-]{16})" /> <small class="form-text text-muted">Для заметок</small>
							<textarea name="text" class="form-control" rows="3">Примечание</textarea>
							<button type="submit" class="btn bg-warning btn-lg btn-block">Добавить дом</button>
						</li>
					</form>
				<?php include 'inc/foot.php';