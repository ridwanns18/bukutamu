

<?php
session_start();	 
	if(!isset($_SESSION['nip']))
	 {
		 echo "<script type=text/javascript>
				alert('Anda tidak mempunyai hak akses');
							window.location='../../keamanan/login.php';
				</script>";
	 }
	  
include_once "../../class/class_form.php";
	 
	 
	 echo"
    <head>
       <meta charset=UTF-8>
       <meta name=viewport content='width=device-width, initial-scale=1.0'> 
       <link rel=stylesheet href='../../CSS/formulir.css?version=<?php echo filemtime('formulir.css'); ?>
    </head>
    <body>
       <div class=main>
";
$form = new formulir('Admin', 'POST', 'simpan_mutakhir_sandi.php','');
$form->judul('Perubahan Password');	
$form->kolom('Password Lama','password', 'sandi_lama', 'sandi_lama', '" "', 'required');
$form->kolom('Password Baru','password', 'sandi_baru', 'sandi_baru', '" "', 'required');
$form->kolom('Verifikasi','password', 'sandi', 'sandi', '" "', 'required');
$form->tombol('submit', 'Simpan');
?>
