<?php
session_start();	 
	if(!isset($_SESSION['nip']))
	 {
		 echo "<script type=text/javascript>
				alert('Anda tidak mempunyai hak akses');
				window.location='../../keamanan/login.php';
				</script>";
	 }

$nip = $_SESSION['nip'];
$data1 = $_POST['sandi_lama'];
$data2 = $_POST['sandi_baru'];
$data3 = $_POST['sandi'];

	include_once('../../class/class_basisdata.php');				
	$bsd=new basisdata();
	$bsd->mutakhir_sandi_admin($nip, $data1, $data2, $data3);	
?>
