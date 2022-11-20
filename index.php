<?php 
include 'header.php';
include 'fonksiyonlar.php';
?>

<div class="container-fluid p-2">
	<div class="row" style="margin-bottom: -20px;">

		<!-- Toplam proje sayısı giriş-->
		<?php 
		$projesayisor=$db->prepare("SELECT proje_id FROM proje");
		$projesayisor->execute();
		$projesayisi = $projesayisor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Toplam <b>Proje</b> Sayısı</div>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $projesayisi; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Toplam proje sayısı çıkış-->


		<!-- Toplam biten proje sayısı giriş-->
		<?php 
		$proje_biten_sayi_sor=$db->prepare("SELECT proje_id FROM proje WHERE proje_durum='Bitti'");
		$proje_biten_sayi_sor->execute();
		$proje_biten_sayi_cek = $proje_biten_sayi_sor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Biten <b>Proje</b> Sayısı</div>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $proje_biten_sayi_cek; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Toplam biten proje sayısı  çıkış-->


		<!-- Toplam acil proje sayısı giriş -->
		<?php 
		$projesayisor=$db->prepare("SELECT proje_id FROM proje WHERE proje_aciliyet='Acil'");
		$projesayisor->execute();
		$projesayisi = $projesayisor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Acil <b>Proje</b> Sayısı</div>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $projesayisi; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Toplam acil proje sayısı çıkış -->


		<!-- Toplam acelesi yok proje sayısı giriş-->
		<?php 
		$projesayisor=$db->prepare("SELECT proje_id FROM proje WHERE proje_aciliyet='Acelesi Yok'");
		$projesayisor->execute();
		$projesayicek = $projesayisor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Önemsiz <b>Proje</b> Sayısı</div>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $projesayicek; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!-- Toplam acelesi yok proje sayısı çıkış-->
	<hr style="margin-bottom: 15px !important;">

	<div class="row">
		<!-- Toplam sipariş sayısı giriş -->
		<?php 
		$siparissayisor=$db->prepare("SELECT sip_id FROM siparis");
		$siparissayisor->execute();
		$siparissayisicek = $siparissayisor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Toplam <b>Sipariş</b> Sayısı</div>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $siparissayisicek; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<!-- Toplam sipariş sayısı çıkış -->


		<!-- Toplam biten sipariş sayısı giriş -->
		<?php 
		$siparis_biten_sayi_sor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_durum='Bitti'");
		$siparis_biten_sayi_sor->execute();
		$siparis_biten_sayi_cek = $siparis_biten_sayi_sor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Biten <b>Sipariş</b> Sayısı</div>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $siparis_biten_sayi_cek; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<!-- Toplam biten sipariş sayısı çıkış -->


		<!-- Toplam acil sipariş sayısı giriş-->
		<?php 
		$siparissayisor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_aciliyet='Acil'");
		$siparissayisor->execute();
		$siparissayicek = $siparissayisor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Acil <b>Sipariş</b> Sayısı</div>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $siparissayicek; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Toplam acil sipariş sayısı çıkış-->



		<!-- Toplam acelesi yok sipariş sayısı giriş -->
		<?php 
		$siparis_biten_sayi_sor=$db->prepare("SELECT sip_id FROM siparis  WHERE sip_aciliyet='Acelesi Yok'");
		$siparis_biten_sayi_sor->execute();
		$siparis_biten_sayi_cek = $siparis_biten_sayi_sor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Önemsiz <b>Sipariş</b> Sayısı</div>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $siparis_biten_sayi_cek; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!-- Toplam acelesi yok sipariş sayısı çıkış -->
</div>


<!-- projeler tablosu giriş kısmı -->
<div class="row justify-content-center">
	<div class="col-md-10">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Projeler</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="projeler" width="100%" cellspacing="0">
						<thead> <!--üst başlık kısmı-->
							<tr> 
								<th>No</th>
								<th>Başlık</th>
								<th>Bitiş Tarihi</th>
								<th>Aciliyet</th>
								<th>Durum</th>
								<th>İşlem</th>
							</tr>
						</thead>
						<!--While döngüsü ile projeler veritabanında ki verilerin tabloya çekilme işlemi giriş-->
						<tbody>
							<?php 
							$say=0;
							$projesor=$db->prepare("SELECT * FROM proje ORDER BY proje_id DESC");
							$projesor->execute();
							while ($projecek=$projesor->fetch(PDO::FETCH_ASSOC)) { $say++?>

								<tr>
									<td><?php echo $say; ?></td>
									<td><?php echo $projecek['proje_baslik']; ?></td>
									<td><?php echo $projecek['proje_teslim_tarihi']; ?></td>
									<td><?php 
									if ($projecek['proje_aciliyet']=="Acil") {
										echo '<span class="badge badge-danger" style="font-size:1rem">Acil</span>';
									} else {
										echo $projecek['proje_aciliyet'];
									}
								?></td>
								<td><?php 
								if ($projecek['proje_durum']=="Bitti") {
									echo '<span class="badge badge-success" style="font-size:1rem">Bitti</span>';
								} else {
									echo $projecek['proje_durum'];
								}
							?></td>
							<td>

								<div class="d-flex justify-content-center">
									<form action="projeduzenle.php" method="POST">
										<input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
										<button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split">
											<span class="icon text-white-60">
												<i class="fas fa-edit"></i>
											</span>
										</button>
									</form>
									<form class="mx-1" onclick="return sil_alert()" action="islemler/islem.php" method="POST">
										<input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
										<button type="submit" name="projesilme" class="btn btn-danger btn-sm btn-icon-split">
											<span class="icon text-white-60">
												<i class="fas fa-trash"></i>
											</span>
										</button>
									</form>
									<form action="proje_gor.php" method="POST">
										<input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
										<button type="submit" name="proje_bak" class="btn btn-primary btn-sm btn-icon-split">
											<span class="icon text-white-60">
												<i class="fas fa-eye"></i>
											</span>
										</button>
									</form>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
				<!--While döngüsü ile projeler veritabanında ki verilerin tabloya çekilme işlemi çıkış-->
			</table>
		</div>
	</div>
</div>
</div>

</div>
<!-- projeler tablosu çıkış kısmı -->



<!-- siparişler tablosu giriş kısmı -->
<div class="row mt-5 justify-content-center">
	<div class="col-md-10">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Siparişler</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="siparisler" width="100%" cellspacing="0">
						<thead>
							<tr> 
								<th>No</th>
								<th>Başlık</th>
								<th>Bitiş Tarihi</th>
								<th>Aciliyet</th>
								<th>Durum</th>
								<th>İşlem</th>
							</tr>
						</thead>
						<!--While döngüsü ile siparişler veritabanında ki verilerin tabloya çekilme işlemi giriş-->
						<tbody>
							<?php 
							$say=0;
							$siparissor=$db->prepare("SELECT * FROM siparis ORDER BY sip_id DESC");
							$siparissor->execute();
							while ($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++?>

								<tr>
									<td><?php echo $say; ?></td>
									<td><?php echo $sipariscek['sip_baslik']; ?></td>
									<td><?php echo $sipariscek['sip_teslim_tarihi']; ?></td>
									<td><?php 
									if ($sipariscek['sip_aciliyet']=="Acil") {
										echo '<span class="badge badge-danger" style="font-size:1rem">Acil</span>';
									} else {
										echo $sipariscek['sip_aciliyet'];
									}
								?></td>
								<td><?php 
								if ($sipariscek['sip_durum']=="Bitti") {
									echo '<span class="badge badge-success" style="font-size:1rem">Bitti</span>';
								} else {
									echo $sipariscek['sip_durum'];
								}
							?></td>
							<td>

								<div class="d-flex justify-content-center">
									<form action="siparisduzenle.php" method="POST">
										<input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
										<button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split">
											<span class="icon text-white-60">
												<i class="fas fa-edit"></i>
											</span>
										</button>
									</form>
									<form class="mx-1" onclick="return sil_alert()" action="islemler/islem.php" method="POST">
										<input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
										<button type="submit" name="siparissilme" class="btn btn-danger btn-sm btn-icon-split">
											<span class="icon text-white-60">
												<i class="fas fa-trash"></i>
											</span>
										</button>
									</form>

									<form action="siparis_gor.php" method="POST">
										<input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
										<button type="submit" name="siparis_bak" class="btn btn-primary btn-sm btn-icon-split">
											<span class="icon text-white-60">
												<i class="fas fa-eye"></i>
											</span>
										</button>
									</form>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>

				<!--While döngüsü ile siparişler veritabanında ki verilerin tabloya çekilme işlemi çıkış-->
			</table>
		</div>

	</div>
</div>
</div>

</div>
<!-- siparişler tablosu çıkış kısmı -->


<?php include 'footer.php'; ?>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script> 
<script src="vendor/datatables/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/buttons.flash.min.js"></script>
<script src="vendor/datatables/jszip.min.js"></script>
<script src="vendor/datatables/pdfmake.min.js"></script>
<script src="vendor/datatables/vfs_fonts.js"></script>
<script src="vendor/datatables/buttons.html5.min.js"></script>
<script src="vendor/datatables/buttons.print.min.js"></script>

<script type="text/javascript">

	/* projeler tablosu ayarları giriş */

	var dataTables = $('#projeler').DataTable({
		initComplete: function () {
			this.api().columns([2,3,4]).every( function () {
				var column = this;
				var select = $('<select class="filtre"><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
				.on( 'change', function () {
					var val = $.fn.dataTable.util.escapeRegex(
						$(this).val()
						);

					column
					.search( val ? '^'+val+'$' : '', true, false )
					.draw();
				});

				column.data().unique().sort().each( function ( d, j ) {
					var val = $('<div/>').html(d).text();

					if (val.length>29) {
						filtremetin =  val.substr(0,30)+"...";
					} else {
						filtremetin=val;
					}
					select.append( '<option value="' + val + '">' + filtremetin + '</option>' )
				});
			});
		},
    "ordering": true,  //Tabloda sıralama özelliği gözüksün mü? true veya false
    "searching": true,  //Tabloda arama yapma alanı gözüksün mü? true veya false
    "lengthChange": true, //Tabloda öğre gösterilme gözüksün mü? true veya false
    "info": true,
    dom: "<'row mobilgizleexport gizlemeyiac'<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
    "language": {
    	"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/tr.json"
    }

});

</script>

<!-- projeler tablosu ayarları çıkış -->

<!-- siparişler tablosu ayarları giriş -->
<script type="text/javascript">
	var dataTables = $('#siparisler').DataTable({
		initComplete: function () {
			this.api().columns([2,3,4]).every( function () {
				var column = this;
				var select = $('<select class="filtre"><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
				.on( 'change', function () {
					var val = $.fn.dataTable.util.escapeRegex(
						$(this).val()
						);

					column
					.search( val ? '^'+val+'$' : '', true, false )
					.draw();
				});

				column.data().unique().sort().each( function ( d, j ) {
					var val = $('<div/>').html(d).text();

					if (val.length>29) {
						filtremetin =  val.substr(0,30)+"...";
					} else {
						filtremetin=val;
					}
					select.append( '<option value="' + val + '">' + filtremetin + '</option>' )
				});
			});
		},
    "ordering": true,  //Tabloda sıralama özelliği gözüksün mü? true veya false
    "searching": true,  //Tabloda arama yapma alanı gözüksün mü? true veya false
    "lengthChange": true, //Tabloda öğre gösterilme gözüksün mü? true veya false
    "info": true,
    dom: "<'row mobilgizleexport gizlemeyiac'<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/tr.json"
    }

});
</script>
<!-- siparişler tablosu ayarları çıkış -->
