
<?php
session_start();	 
	if(!isset($_SESSION['nip']))
	 {
		 echo "<script type=text/javascript>
				alert('Anda tidak mempunyai hak akses');
				window.location='../../keamanan/login.php';
				</script>";
	 }

include "../../class/class_basisdata.php";
include_once "../../class/class_form.php";
	$style="'height:30px;'";
	$kode	= $_GET['kunci'];
		
	$bd= new basisdata();
	$koneksi= $bd->koneksi();
	$lihat=$koneksi->query("select * from admin where nip='$kode'");
	$data = $lihat->fetch_array();
    
    

    echo"
    <head>
       <meta charset=UTF-8>
       <meta name=viewport content='width=device-width, initial-scale=1.0'> 
       <link rel=stylesheet href='../../CSS/formulir.css?version=<?php echo filemtime('formulir.css'); ?>
       </head>
    <body>
       <div class=main>
";


$form = new formulir('Admin', 'POST', 'simpan_mutakhir_user.php','');
$form->judul('Mutakhir Data User');
$form->kolom_isi('NIP','text', 'nip', 'nip', '" "', 'required',$data[0], 'readonly');
$form->kolom_isi('Nama User','text', 'nama', 'nama', '" "', 'required',$data[1],' ');
$form->kolom_sandi();
$form->option_level($data[3]);
$form->tombol('submit','Simpan');
$form->tutup_form();
echo"</div>";
?>
