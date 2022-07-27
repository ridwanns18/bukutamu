<?php

$data1 = $_POST['id_tamu'];
$data2 = $_POST['nama'];
$data3 = $_POST['instansi'];
$data4 = $_POST['keperluan'];
$data5 = $_POST['tanggal'];
$data6 = $_POST['jam'];


	$per = "id_tamu ='".$data1."', nama ='".$data2."',  instansi='".$data3."', keperluan='".$data4."', tanggal='".$data5."', jam='".$data6."'   ";
			
	$kunci = 'id_tamu';
	
	$url = 'index.php';	
	
	include_once('../class/class_basisdata.php');				
	$bsd=new basisdata();
	$bsd->koneksi();
	$bsd->simpan('daftar_tamu', $per, $url, 'id_tamu', $kunci);
?>
