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
			<h3 class="h3 text-gray-800" style="font-size: 2rem"><?php echo $projecek['proje_baslik'] ?></h3>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST">

				<div class="form-row">
					<div class="col-md-4">
						<label>Proje Aciliyet</label>
						<div class="form-control">
							<?php 
							if ($projecek['proje_aciliyet']=="Acil") {
								echo '<span class="badge badge-danger" style="font-size:1rem">Acil</span>';
							} else {
								echo $projecek['proje_aciliyet'];
							}
							?>

						</div>					
					</div>
					<div class="col-md-4">
						<label>Proje Durumu</label>
						<div class="form-control">
							<?php 
							if ($projecek['proje_durum']=="Bitti") {
								echo '<span class="badge badge-success" style="font-size:1rem">Bitti</span>';
							} else {
								echo $projecek['proje_durum'];
							}
							?>
						</div>
					</div>
					<div class="col-md-4">
						<label>Teslim Tarihi</label>
						<div class="form-control">
							<?php echo $projecek['proje_teslim_tarihi'] ?>
						</div>
					</div>
				</div>


				<div class="form-row mt-2">
					<div class="col-md-12">
						<label>Proje Detayı</label>
						<textarea class="form-control" disabled><?php echo strip_tags($projecek['proje_detay'])?></textarea>
					</div>
				</div>

			</form>
		</div>
	</div>
</div> <br><br>

<?php include 'footer.php'; ?>
