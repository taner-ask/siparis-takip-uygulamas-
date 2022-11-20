<?php include 'islemler/baglan.php' ;
$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $ayarcek['site_aciklama'] ?>">
  <meta name="author" content="<?php echo $ayarcek['site_sahibi'] ?>">

  <title><?php echo $ayarcek['site_baslik'] ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container align-items-center" style="margin-top: 7%">
    <div class="row justify-content-center align-content-center">
      <div class="card o-hidden border-0 shadow-md" style="min-width: 45%">
       <div class="p-5">
        <div class="text-center">
          <h2 class="h2 text-gray-900 mb-4">Hoşgeldin</h2>
        </div>
        <form class="user" action="islemler/islem.php" method="POST">
          <div class="form-group">
            <input name="kul_mail" required type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder=" E-Mail ">
          </div>
          <div class="form-group">
            <input type="password" required name="kul_sifre" class="form-control form-control-user" id="exampleInputPassword" placeholder="Şifre">
          </div>
          <button name="oturumac" type="submit" class="btn text-white btn-primary btn-user btn-block">Oturum Aç</button>
          <hr>           
          <p class="text-muted text-center"><?php echo $ayarcek['site_baslik'] ?></p>
        </form>
      </div>
    </div>
  </div>

</div>






