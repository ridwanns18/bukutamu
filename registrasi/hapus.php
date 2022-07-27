<?php 
session_start();	 
	if(!isset($_SESSION['nip']))
	 {
		 echo "<script type=text/javascript>
				alert('Anda tidak mempunyai hak akses');
				window.location='../keamanan/login.php';
				</script>";
	 }

include_once('../class/class_basisdata.php');
$bd = new basisdata();
$data= $_GET['kode'];
$urll = 'lihat_tamu.php?laman=&&nr=';
$syarat = "id_tamu = '".$data."'";
$bd->hapus('daftar_tamu', $syarat, $urll);
?>

