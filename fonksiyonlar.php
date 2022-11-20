<?php 


function turkce_temizle($metin) {
	$turkce=array("ş","Ş","ı","ü","Ü","ö","Ö","ç","Ç","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü");
	$duzgun=array("s","S","i","u","U","o","O","c","C","s","S","i","g","G","I","o","O","C","c","u","U");
	$metin=str_replace($turkce,$duzgun,$metin);
	$metin = preg_replace("@[^a-z0-9\-_şıüğçİŞĞÜÇ]+@i","-",$metin);
	$yeniisim = mb_strtolower($metin, 'utf8');
	return $yeniisim;
};





?>

<script type="text/javascript">
	function onay()
{
  if(confirm('Are you sure you want to submit this form?')){
       Swal.fire({
		type: 'success',
		title: 'silme Başarılı',
	})
  }
}

</script>