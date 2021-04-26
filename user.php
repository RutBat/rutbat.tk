<?php
include "inc/head.php"; ?>
				<ul class="list-group">
					<li class="list-group-item">
						<div id="ava">
							<?php
							$filename = "img/$usr[name].png";
							$tim = filemtime("img/$usr[name].png");
							if (file_exists($filename)) {
							$ava = "img/$usr[name].png?r=$tim";
							} else {
							$ava = "img/user.png";
							}
							?>
<style>
	.custom-file-label::after {
    display: none;
}
</style>
							<img style = "width: 128px;" data-toggle="tooltip" data-placement="top" title="Для смены нажмите на изображение" class="rounded-circle mx-auto d-block" src="<?=$ava?>" alt="">
						</div>
						<div class="press" style="display: none">
							<form name="upload" action="download_img.php" method="POST" ENCTYPE="multipart/form-data">
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" name="userfile" class="custom-file-input" id="inputGroupFile02">
										<label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Выберите изображение</label>
									</div>
									<div class="input-group-append">
										<input type="submit" name="upload" class="input-group-text" value="Загрузить">
									</div>
								</div>
							</form>
						</div>
						<script>
							$('#ava').click(function(){
						$('.press').show(); // Показывает содержимое диалога.
						});
						</script>


<?
if($usr['admin'] == 1){
?>
  <div class="form-group">
    <textarea class="form-control" id="exampleTextarea" rows="3">
<?
$sql = "SELECT * FROM log";
$res_data = mysqli_query($connect, $sql);
				while($row = mysqli_fetch_array($res_data)){
					$text = trim($row['log']);
					$kogda = trim($row['kogda']);
echo"[$kogda] $text \n";

}
						?>
						</textarea>
  </div>


  <?}
  
  if (isset($_POST['submit'])) {
$sql = "TRUNCATE log";
if ($connect->query($sql) === false)
{
echo "Ошибка: " . $sql . "<br>" . $connect->error;
}
  
  redir("user","0");}



  ?>
  
  <form action="" method="POST" target="_self">
<input class="btn btn-outline-success btn-sm" type="submit" name="submit" value="Очистить логи" />
</form>


						<br>
						<small  style = "margin-top: 1rem;" class="form-text text-muted">Ваш логин:
						<b>
						<?= $usr['name'] ?>
						</b>
						</small>
						<small  style = "margin-top: 1rem;"class="form-text text-muted">Должность:
						<b>
						<?= $usr['comment'] ?>
						</b>
						</small>
						<small  style = "margin-top: 1rem;"class="form-text text-muted">В каком регионе:
						<b>
						<?= $usr['region'] ?>
						</b>
						</small>
						<br>
						<b>
						<a href="/auth.php?off" class="btn btn-outline-success btn-sm btn-block">Выход
						</a>
						</b>
					</li>
				</ul>
			</div>
		</div>
			<?php include 'inc/foot.php';
			?>