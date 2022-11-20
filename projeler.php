<?php 
include 'header.php';
include 'fonksiyonlar.php';
?>

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style type="text/css" media="screen">
  @media only screen and (max-width: 700px) {
    .mobilgizle {
      display: none;
    }
    .mobilgizleexport {
      display: none;
    }
    .mobilgoster {
      display: block;
    }
  }
  @media only screen and (min-width: 700px) {
    .mobilgizleexport {
      display: flex;
    }
    .mobilgizle {
      display: block;
    }
    .mobilgoster {
      display: none;
    }
  }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Projeler</h1>
  <p class="mb-4">Bu alandan projelerinize ait bilgileri görüntüleyebilirsiniz.</p>

  <div class="row">

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


  <!-- DataTales Giriş -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Projeler</h6>
    </div>
    <div class="card-body" style="width: 100%">
      <!--Tablo filtreleme butonları mobilde gizlendiğinde gözükecek buton-->
      <button type="button"class="btn btn-sm btn-info btn-icon-split mobilgoster">
        <span class="icon text-white-65">
          <i class="fas fa-edit"></i>
        </span>
        <span class="text">Seçenekler</span>
      </button>

      <div class="mobilgizle gizlemeyiac" style="margin-bottom: 10px;">
        <!--Tablo filtreleme butonları bölümü giriş-->
        <button type="button" id="hepsi" style="margin-bottom: 5px;" class="btn btn-sm btn-info btn-icon-split">
          <span class="icon text-white-65">
            <i class="fas fa-edit"></i>
          </span>
          <span class="text">Hepsi</span>
        </button>

        <button type="button" id="acil" style="margin-bottom: 5px;" class="btn btn-sm btn-danger btn-icon-split">
          <span class="icon text-white-65">
            <i class="fas fa-exclamation-triangle"></i>
          </span>
          <span class="text">Acil Olanlar</span>
        </button>

        <button type="button" id="normal" style="margin-bottom: 5px;" class="btn btn-sm btn-primary btn-icon-split">
          <span class="icon text-white-65">
            <i class="fas fa-clock"></i>
          </span>
          <span class="text">Normal</span>
        </button>

        <button type="button" id="acelesiyok" style="margin-bottom: 5px;" class="btn btn-sm btn-warning btn-icon-split">
          <span class="icon text-white-65">
            <i class="fas fa-circle-notch"></i>
          </span>
          <span class="text">Önemsizler</span>
        </button>

        <button type="button" id="yeni" style="margin-bottom: 5px;" class="btn btn-sm btn-dark btn-icon-split">
          <span class="icon text-white-65">
            <i class="fas fa-hourglass-start"></i>
          </span>
          <span class="text">Yeni Başlananlar</span>
        </button>

        <button type="button" id="devam" style="margin-bottom: 5px;" class="btn btn-sm btn-info btn-icon-split">
          <span class="icon text-white-65">
            <i class="fas fa-sync-alt"></i>
          </span>
          <span class="text">Devam Edenler</span>
        </button>

        <button type="button" id="bitti" style="margin-bottom: 5px;" class="btn btn-sm btn-success btn-icon-split">
          <span class="icon text-white-65">
            <i class="fas fa-check"></i>
          </span>
          <span class="text">Bitenler</span>
        </button>
        <!--Tablo filtreleme butonları bölümü çıkış-->

      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
          <!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
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
  <!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi çıkış-->
</table>
</div>
</div>
</div>
<!--Datatables çıkış-->
</div>


<?php include'footer.php' ?>

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
  $("#aktarmagizleme").click(function(){
    $(".dt-buttons").toggle();
  });
</script>
<script type="text/javascript">
  $(".mobilgoster").click(function(){
    $(".gizlemeyiac").toggle();
  });
</script>
<script>
  var dataTables = $('#dataTable').DataTable({
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

  //Tablo filtreleme işlemleri
  $('#hepsi').on('click', function () {
    dataTables
    .columns()
    .search( '' )
    .columns( '.sold_out' )
    .search( 'YES' )
    .draw();
    dataTables.column(3).search("").draw();
  }); 
  $('#acil').on('click', function () {
    dataTables
    .columns()
    .search( '' )
    .columns( '.sold_out' )
    .search( 'YES' )
    .draw();
    dataTables.column(3).search("Acil").draw();
  }); 
  $('#normal').on('click', function () {
    dataTables
    .columns()
    .search( '' )
    .columns( '.sold_out' )
    .search( 'YES' )
    .draw();
    dataTables.column(3).search("Normal").draw();
  }); 
  $('#acelesiyok').on('click', function () {
    dataTables
    .columns()
    .search( '' )
    .columns( '.sold_out' )
    .search( 'YES' )
    .draw();
    dataTables.column(3).search("Acelesi Yok").draw();
  }); 
  $('#bitti').on('click', function () {
    dataTables
    .columns()
    .search( '' )
    .columns( '.sold_out' )
    .search( 'YES' )
    .draw();
    dataTables.column(4).search("Bitti").draw();
  }); 
  $('#devam').on('click', function () {
    dataTables
    .columns()
    .search( '' )
    .columns( '.sold_out' )
    .search( 'YES' )
    .draw();
    dataTables.column(4).search("Devam Ediyor").draw();
  }); 
  $('#yeni').on('click', function () {
    dataTables
    .columns()
    .search( '' )
    .columns( '.sold_out' )
    .search( 'YES' )
    .draw();
    dataTables.column(4).search("Yeni Başladı").draw();
  });
</script>
<?php 
include 'footer.php' 
?>
