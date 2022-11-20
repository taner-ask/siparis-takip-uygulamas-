<?php include 'header.php'; 

if (isset($_POST['sip_id'])) {
	$siparissor=$db->prepare("SELECT * FROM siparis WHERE sip_id=:id");
	$siparissor->execute(array(
		'id'=>$_POST['sip_id']
	));
	$sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);
} else {
	header("location:index.php");
}



?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h3 class="h3 text-gray-800" style="font-size: 2rem"><?php echo $sipariscek['sip_baslik'] ?></h3>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST">
				<div class="form-row mt-3">
					<div class="col-md-6">
						<label>İsim Soyisim</label>
						<div class="form-control">
							<?php echo $sipariscek['musteri_isim'] ?>
						</div>
					</div>
					<div class="col-md-6">
						<label>Mail Adresi</label>
						<div class="form-control">
							<?php echo $sipariscek['musteri_mail'] ?>
						</div>
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="col-md-6">
						<label>Telefon Numarası</label>
						<div class="form-control">
							<?php echo $sipariscek['musteri_telefon'] ?>
						</div>
					</div>
					<div class="col-md-6">
						<label>Sipariş Başlığı</label>
						<div class="form-control">
							<?php echo $sipariscek['sip_baslik'] ?>
						</div>
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="form-group col-md-6">
						<label>Teslim Tarihi</label>
						<div class="form-control">
							<?php echo $sipariscek['sip_teslim_tarihi'] ?>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label>Ücret (TL)</label>
						<div class="form-control">
							<?php echo $sipariscek['sip_ucret'] ?>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Sipariş Durumu</label>
						<div class="form-control">
							<?php 
							if ($sipariscek['sip_durum']=="Bitti") {
								echo '<span class="badge badge-success" style="font-size:1rem">Bitti</span>';
							} else {
								echo $sipariscek['sip_durum'];
							}
							?>
						</div>
					</div>

					<div class="form-group col-md-6">
						<label>Aciliyet</label>
						<div class="form-control">
							<?php 
							if ($sipariscek['sip_aciliyet']=="Acil") {
								echo '<span class="badge badge-danger" style="font-size:1rem">Acil</span>';
							} else {
								echo $sipariscek['sip_aciliyet'];
							}
							?>
						</div>
					</div> 
				</div>
				<input type="hidden" name="sip_id" value="<?php echo $_POST['sip_id'] ?>">

				<div class="form-row mt-3">
					<div class="form-group col-md-12">
						<label>Sipariş Detayı</label>
						<textarea class="form-control" disabled><?php echo strip_tags($sipariscek['sip_detay'])?></textarea>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>



<?php include 'footer.php' ?>

