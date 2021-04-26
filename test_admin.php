<?php
include "inc/head.php"; ?>
<li class="list-group-item  justify-content-between align-items-center">
<?php
if(isset($_POST['end'])) // третья форма была введена
{
echo"$_POST[adress]";
echo"$_POST[region]";
echo"$_POST[pon]";
} 
elseif(isset($_POST['adress'])) // вторая форма (ввели первую)
{
    ?>
        <form method="post">
            <input type="hidden" name="adress" value = "<?=$_POST[adress]?>">
            <input type="hidden" name="region" value = "<?=$_POST[region]?>">



<?
							echo '<small  class="form-text text-muted">Тип подключения</small>';
							echo '<select name="pon" class="custom-select mr-sm-2">';
									$pon1 = $connect->query("SELECT * FROM pon ");
									while ($pon = $pon1->fetch_object()) {
									echo "<option $sel_pon value='$pon->name'>$pon->name</option>";
									}
								?>
							</select>




            <input type="submit" name="technology">
        </form>
    <?php
}
elseif(isset($_POST['technology'])) // вторая форма (ввели первую)
{
    ?>
        <form method="post">
 						<input type="hidden" name="adress" value = "<?=$_POST[adress]?>">
            <input type="hidden" name="region" value = "<?=$_POST[region]?>">
            <input type="hidden" name="region" value = "<?=$_POST[pon]?>">
            <input type="submit" name="end">
        </form>
    <?php
}
else // С этого момента начинается именно первая форма
{
    ?>
        <form method="post">
           <div class="input-group mb-3">
							<input type="text" name="adress" class="form-control" placeholder="Адрес">
						</div>


						<?
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
						?>
            <input type="submit" name="adress">
        </form>
    <?php
}?>
						</li>

				<?php include 'inc/foot.php';