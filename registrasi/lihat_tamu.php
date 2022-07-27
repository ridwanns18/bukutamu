<head>
  			<meta charset=UTF-8>
  			<meta name=viewport content='width=device-width, initial-scale=1.0'> 
</head>


<?php
session_start();	 
	if(!isset($_SESSION['nip']))
	 {
		 echo "<script type=text/javascript>
				alert('Anda tidak mempunyai hak akses');
				window.location='../keamanan/login.php';
				</script>";
	 }

	$laman=	$_GET['laman'];
	$key = $_GET['nr'];

	include('../class/class_basisdata.php');
	include_once('../class/class_tamu.php');
	$data=new basisdata();
	$koneksi=$data->koneksi();
	$jl=new tamu('');
	$jl->lihat($koneksi,$key,$laman);
?>
