<?php
session_start();
include_once "../class/class_halaman.php";
$form = new halaman();
$form->halaman_login('periksa_log.php');
?>
