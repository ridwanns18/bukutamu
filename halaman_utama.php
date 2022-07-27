<?php

session_start();	 
	if(!isset($_SESSION['nip']))
	 {
		 echo "<script type=text/javascript>
				window.location='keamanan/login.php';
				</script>";
	 }

include_once('class/class_halaman.php');	
$index = new halaman();

if($_SESSION['level']=="Administrator")
{
$index->halaman_index();
}
?>
