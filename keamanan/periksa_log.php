<?php
include_once('../class/class_login.php');

 $nama = $_POST['nama'];
 $password =$_POST['password'];

 
 $log = new login($nama, $password);
 $log->validasi();
 
?>
