<?php include 'header.php'; 

?>

<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h3 class="text-primary font-weight-bold" >Ayarlar</h3>	
		</div>

		<div class="card-body">
			<form action="islemler/islem.php" method="POST" accept-charset="utf-8">
				<div class="form-row">
					<div class="col-md-6">
						<label>Sitenizin Başlığını Girin</label>
						<input class="form-control" type="text" name="site_baslik" value="<?php echo $ayarcek["site_baslik"] ?>">
					</div>
				</div>
				<div class="form-row my-2">
					<div class="col-md-6">
						<label>Sitenizin Açıklamasını girin</label>
						<input class="form-control" type="text" name="site_aciklama" value="<?php echo $ayarcek["site_aciklama"] ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<label>Site Sahibi</label>
						<input class="form-control" type="text" name="site_sahibi" value="<?php echo $ayarcek["site_sahibi"] ?>">
					</div>
				</div>
				<button type="submit" class="btn btn-primary mt-2" name="ayarkaydet">Kaydet</button>
			</form>
		</div>

	</div>

</div>


<?php include 'footer.php'; ?> 