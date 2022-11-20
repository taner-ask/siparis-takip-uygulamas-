<?php include 'header.php';

if (isset($_POST['proje_id'])) {
	$projesor=$db->prepare("SELECT * FROM proje WHERE proje_id=:id");
	$projesor->execute(array(
		'id'=> $_POST['proje_id']
	));
	$projecek=$projesor->fetch(PDO::FETCH_ASSOC);
} else {
	header("location:index.php");
}

?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h3 class="display-4" style="font-size: 2rem">Proje Düzenle</h3>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST">
				<div class="form-row mt-2">
					<div class="col-md-6">
						<label>Proje Başlığı</label>
						<input type="text" name="proje_baslik" class="form-control" value="<?php echo $projecek['proje_baslik'] ?>">
					</div>
					<div class="col-md-6">
						<label>Teslim Tarihi</label>
						<input type="date" name="proje_teslim_tarihi" class="form-control" value="<?php echo $projecek['proje_teslim_tarihi'] ?>">
					</div>
				</div>
				<div class="form-row mt-2">
					<div class="col-md-6">
						<label>Proje Aciliyet</label>
						<select name="proje_aciliyet" class="form-control">
							<option value="Acil"<?php if ($projecek['proje_aciliyet']=="Acil"){echo "selected";} ?>>Acil</option>
							<option value="Acelesi Yok"<?php if ($projecek['proje_aciliyet']=="Acelesi Yok"){echo "selected";} ?>>Acelesi Yok</option>
							<option value="Normal"<?php if ($projecek['proje_aciliyet']=="Normal"){echo "selected";} ?>>Normal</option>
						</select>
					</div>
					<div class="col-md-6">
						<label>Proje Durumu</label>
						<select name="proje_durum" class="form-control">
							<option value="Yeni Başladı"<?php if ($projecek['proje_durum']=="Yeni Başladı"){echo "selected";} ?>>Yeni Başladı</option>
							<option value="Devam Ediyor"<?php if ($projecek['proje_durum']=="Devam Ediyor"){echo "selected";} ?>>Devam Ediyor</option>
							<option value="Bitti"<?php if ($projecek['proje_durum']=="Bitti"){echo "selected";} ?>>Bitti</option>
						</select>
					</div>
				</div>
				<input type="hidden" name="proje_id" value="<?php echo $_POST['proje_id'] ?>">


				<div class="form-row mt-2">
					<div class="col-md-12">
						<label>Proje Detayı</label>
						<textarea name="proje_detay" class="form-control" id="proje_detay"><?php echo $projecek['proje_detay'] ?></textarea>
					</div>
				</div>

				<button name="projeduzenle" type="submit" class="btn btn-primary mt-2">Kaydet</button>
			</form>
		</div>
	</div>
</div>



<?php include 'footer.php'; ?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script>
	CKEDITOR.replace('proje_detay');
</script>