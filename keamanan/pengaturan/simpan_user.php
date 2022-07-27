<?php
session_start();	 
	if(!isset($_SESSION['nip']))
	 {
		 echo "<script type=text/javascript>
				alert('Anda tidak mempunyai hak akses');
				window.location='../../keamanan/login.php';
				</script>";
	 }

$data1 = $_POST['nip'];
$data2 = $_POST['nama'];
$data3 = password_hash($_POST['sandi'],PASSWORD_DEFAULT);
$data4 = $_POST['level'];

include_once('../../class/class_admin.php');
$in = new admin($data1, $data2, $data3, $data4);

	$per = "nip ='".$data1."', nama ='".$data2."', sandi ='".$data3."' , level ='".$data4."' ";
			
	$kunci = $in->setkey();
	
	$url = 'lihat_admin.php?nr&&laman=';	
	
	include_once('../../class/class_basisdata.php');				
	$bsd=new basisdata();
	$bsd->koneksi();
	$bsd->simpan('admin', $per, $url, 'nip', $kunci);
?>
