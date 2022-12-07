<?php 
include 'baglan.php';
include '../fonksiyonlar.php';

ob_start();
session_start();

if (isset($_POST['ayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayarlar SET site_baslik=:site_baslik,
		site_aciklama=:site_aciklama,
		site_sahibi=:site_sahibi");

	$ayarkaydet->execute(array(
		'site_baslik' =>$_POST['site_baslik'],
		'site_aciklama' =>$_POST['site_aciklama'],
		'site_sahibi' =>$_POST['site_sahibi'],
	));
	if ($ayarkaydet) {
		header("location:../index.php");
	} else { 
		echo "BAŞARISIZ.";
		exit;
	}
}

if (isset($_POST['oturumac'])) {
	$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE 
		kul_mail=:mail 
		AND 
		kul_sifre=:sifre");
	$kullanicisor->execute(array(
		'mail' =>$_POST['kul_mail'],
		'sifre' =>$_POST['kul_sifre']
	));
	$sonuc=$kullanicisor->rowcount();

	if ($sonuc==0) {
		echo "Mail ya da şifreniz yanlış.";
	} else {
		header("location:../index.php");
		$_SESSION['kul_mail']=$_POST['kul_mail'];
	}
}

if (isset($_POST['projeekle'])) {
	$projeekle=$db->prepare("INSERT INTO proje SET
		proje_baslik=:baslik,
		proje_teslim_tarihi=:teslim_tarihi,
		proje_aciliyet=:aciliyet,
		proje_durum=:durum,
		proje_detay=:detay
		");
	$projeekle->execute(array(
		'baslik' =>$_POST['proje_baslik'],
		'teslim_tarihi' =>$_POST['proje_teslim_tarihi'],
		'aciliyet' =>$_POST['proje_aciliyet'],
		'durum' =>$_POST['proje_durum'],
		'detay' =>$_POST['proje_detay']
	));

	if ($projeekle) {
		header("location:../index.php");
	}else{
		echo "BAŞARISIZ.";
		exit;
	}

}


if (isset($_POST['projeduzenle'])) {
	$projeduzenle=$db->prepare("UPDATE proje SET
		proje_baslik=:baslik,
		proje_teslim_tarihi=:teslim_tarihi,
		proje_aciliyet=:aciliyet,
		proje_durum=:durum,
		proje_detay=:detay WHERE proje_id=:proje_id;
		");
	$projeduzenle->execute(array(
		'baslik' =>$_POST['proje_baslik'],
		'teslim_tarihi' =>$_POST['proje_teslim_tarihi'],
		'aciliyet' =>$_POST['proje_aciliyet'],
		'durum' =>$_POST['proje_durum'],
		'detay' =>$_POST['proje_detay'],
		'proje_id' =>$_POST['proje_id']
	));
	if ($projeduzenle) {
		header("location:../index.php");
	}else{
		echo "BAŞARISIZ.";
		exit;
	}

}

if (isset($_POST['projesilme'])) {
	$sil=$db->prepare("DELETE FROM proje WHERE proje_id=:proje_id");
	$kontrol=$sil->execute(array('proje_id' => $_POST['proje_id']
));


	if ($kontrol) {
		header("location:../index.php");
	}else{
		echo "BAŞARISIZ.";
		exit;
	}

}

if (isset($_POST['siparisekle'])) {
	$siparisekle=$db->prepare("INSERT INTO siparis SET
		musteri_isim=:musteri_isim,
		musteri_mail=:musteri_mail,
		musteri_telefon=:musteri_telefon,
		sip_baslik=:sip_baslik,
		sip_durum=:sip_durum,
		sip_ucret=:sip_ucret,
		sip_teslim_tarihi=:sip_teslim_tarihi,
		sip_aciliyet=:sip_aciliyet,
		sip_detay=:sip_detay

		");
	$siparisekle->execute(array(
		'musteri_isim' =>$_POST['musteri_isim'],
		'musteri_mail' =>$_POST['musteri_mail'],
		'musteri_telefon' =>$_POST['musteri_telefon'],
		'sip_baslik' =>$_POST['sip_baslik'],
		'sip_durum' =>$_POST['sip_durum'],
		'sip_ucret' =>$_POST['sip_ucret'],
		'sip_teslim_tarihi' =>$_POST['sip_teslim_tarihi'],
		'sip_aciliyet' =>$_POST['sip_aciliyet'],
		'sip_detay' =>$_POST['sip_detay']
	));

	if ($siparisekle) {
		header("location:../index.php");
	}else{
		echo "BAŞARISIZ.";
		exit;
	}

}

if (isset($_POST['siparisduzenle'])) {
	$siparisduzenle=$db->prepare("UPDATE siparis SET
		musteri_isim=:musteri_isim,
		musteri_mail=:musteri_mail,
		musteri_telefon=:musteri_telefon,
		sip_baslik=:sip_baslik,
		sip_durum=:sip_durum,
		sip_ucret=:sip_ucret,
		sip_teslim_tarihi=:sip_teslim_tarihi,
		sip_aciliyet=:sip_aciliyet,
		sip_detay=:sip_detay WHERE sip_id=:sip_id

		");
	$siparisduzenle->execute(array(
		'musteri_isim' =>$_POST['musteri_isim'],
		'musteri_mail' =>$_POST['musteri_mail'],
		'musteri_telefon' =>$_POST['musteri_telefon'],
		'sip_baslik' =>$_POST['sip_baslik'],
		'sip_durum' =>$_POST['sip_durum'],
		'sip_ucret' =>$_POST['sip_ucret'],
		'sip_teslim_tarihi' =>$_POST['sip_teslim_tarihi'],
		'sip_aciliyet' =>$_POST['sip_aciliyet'],
		'sip_detay' =>$_POST['sip_detay'],
		'sip_id' =>$_POST['sip_id']
	));

	if ($siparisduzenle) {
		header("location:../index.php");
	}else{
		echo "BAŞARISIZ.";
		exit;
	}

}

if (isset($_POST['siparissilme'])) {
	$sil=$db->prepare("DELETE FROM siparis WHERE sip_id=:sip_id");
	$kontrol=$sil->execute(array('sip_id' => $_POST['sip_id']
));

	if ($kontrol) {
		header("location:../index.php");
	}else{
		echo "BAŞARISIZ.";
		exit;
	}

}



?>
