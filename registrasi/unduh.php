
<?php
	include_once('../class/class_laporan.php');
	$id= $_GET['kode'];

	$jl=new laporan();
	$jl->cetak($id);
	
	
	
?>
