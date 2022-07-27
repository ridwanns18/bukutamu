
<?php
session_start();	 
	if(!isset($_SESSION['nip']))
	 {
		 echo "<script type=text/javascript>
				alert('Anda tidak mempunyai hak akses');
				window.location='../../keamanan/login.php';
				</script>";
	 }



echo"
     <head>
        <meta charset=UTF-8>
        <meta name=viewport content='width=device-width, initial-scale=1.0'> 
        <link rel=stylesheet href=../../CSS/formulir.css?version=<?php echo filemtime('formulir.css'); ?>
     </head>
     <body>
        <div class=main>
";

include_once "../../class/class_form.php";
$form = new formulir('User', 'POST', 'simpan_user.php','');
$form->judul('Input Data User');
$form->kolom('NIP','text', 'nip', 'nip', '" "', 'required');
$form->kolom('Username','text', 'nama', 'nama', '" "', 'required');
$form->kolom_sandi();
$form->option_level('');
$form->tombol_form('submit','Simpan');
$form->tutup_form();

echo"</div>";
?>
