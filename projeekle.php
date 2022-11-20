<?php 
include 'header.php';
?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h3 class="display-4" style="font-size: 2rem">Proje Ekle</h3>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST">
				<div class="form-row mt-2">
					<div class="col-md-6">
						<label>Proje Başlığı</label>
						<input type="text" name="proje_baslik" class="form-control" placeholder="Projenizin Başlığını Girin">
					</div>
					<div class="col-md-6">
						<label>Teslim Tarihi</label>
						<input type="date" name="proje_teslim_tarihi" class="form-control">
					</div>
				</div>
				<div class="form-row mt-2">
					<div class="col-md-6">
						<label>Proje Aciliyeti</label>
						<select name="proje_aciliyet" class="form-control">
							<option value="Acil">Acil</option>
							<option value="Acelesi Yok">Acelesi Yok</option>
							<option value="Yeni Başladı">Normal</option>
						</select>
					</div>
					<div class="col-md-6">
						<label>Proje Durumu</label>
						<select name="proje_durum" class="form-control">
							<option value="Yeni Başladı">Yeni Başladı</option>
							<option value="Devam Ediyor">Devam Ediyor</option>
							<option value="Bitti">Bitti</option>
						</select>
					</div>
				</div>

				<div class="form-row mt-2">
					<div class="col-md-12">
						<label>Proje Detayı</label>
						<textarea name="proje_detay" class="form-control" id="proje_detay"></textarea>
					</div>
				</div>

				<button name="projeekle" type="submit" class="btn btn-primary mt-2">Kaydet</button>
			</form>
		</div>
	</div>
</div>



<?php include 'footer.php'; ?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script>
	CKEDITOR.replace('proje_detay');
</script>