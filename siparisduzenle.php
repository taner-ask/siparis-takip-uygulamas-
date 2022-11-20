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
			<h5 class="card-title">Sipariş Düzenleme</h5>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST">
				<div class="form-row mt-3">
					<div class="col-md-6">
						<label>İsim Soyisim</label>
						<input type="text" class="form-control" name="musteri_isim" value="<?php echo $sipariscek['musteri_isim'] ?>">
					</div>
					<div class="col-md-6">
						<label>Mail Adresi</label>
						<input type="mail" class="form-control" name="musteri_mail" value="<?php echo $sipariscek['musteri_mail'] ?>">
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="col-md-6">
						<label>Telefon Numarası</label>
						<input type="number" class="form-control" name="musteri_telefon" value="<?php echo $sipariscek['musteri_telefon'] ?>">
					</div>
					<div class="col-md-6">
						<label>Sipariş Başlığı</label>
						<input type="text" class="form-control" name="sip_baslik" value="<?php echo $sipariscek['sip_baslik'] ?>">
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="form-group col-md-6">
						<label>Sipariş Durumu</label>
						<select required name="sip_durum" class="form-control">
							<option <?php if($sipariscek['sip_durum']=="Yeni Başladı"){echo "selected";} ?>value="Yeni Başladı" >Yeni Başladı</option>
							<option <?php if($sipariscek['sip_durum']=="Devam Ediyor"){echo "selected";} ?>value="Devam Ediyor" >Devam Ediyor</option>
							<option <?php if($sipariscek['sip_durum']=="Bitti"){echo "selected";} ?>value="Bitti" >Bitti</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Ücret (TL)</label>
						<input type="number" class="form-control" required name="sip_ucret" value="<?php echo $sipariscek['sip_ucret'] ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Teslim Tarihi</label>
						<input type="date" class="form-control" required name="sip_teslim_tarihi" value="<?php echo $sipariscek['sip_teslim_tarihi'] ?>">
					</div>

					<div class="form-group col-md-6">
						<label>Aciliyet</label>
						<select required name="sip_aciliyet" class="form-control">
							<option <?php if($sipariscek['sip_aciliyet']=="Acil"){echo "selected";} ?>value="Acil" >Acil</option>
							<option <?php if($sipariscek['sip_aciliyet']=="Normal"){echo "selected";} ?>value="Normal" >Normal</option>
							<option <?php if($sipariscek['sip_aciliyet']=="Acelesi Yok"){echo "selected";} ?>value="Acelesi Yok" >Acelesi Yok</option>
						</select>
					</div> 
				</div>
				<input type="hidden" name="sip_id" value="<?php echo $_POST['sip_id'] ?>">

				<div class="form-row mt-3">
					<div class="form-group col-md-12">
						<label>Sipariş Detayı</label>
						<textarea name="sip_detay" class="form-control" id="sip_detay"><?php echo $sipariscek['sip_detay'] ?></textarea>
					</div>
				</div>
				<button type="submit" name="siparisduzenle" class="btn btn-primary">Kaydet</button>
			</form>
		</div>
	</div>
</div>



<?php include 'footer.php' ?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script>
	CKEDITOR.replace('sip_detay');
</script>