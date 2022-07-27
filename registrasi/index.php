
<?php

echo"
     <head>
        <meta charset=UTF-8>
        <meta name=viewport content='width=device-width, initial-scale=1.0'> 
        <link rel=stylesheet href=../CSS/formulir.css?version=<?php echo filemtime('formulir.css'); ?>
     </head>
     <body>
        <div class=main>
";
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d");
$jam = date("H:i:s");
include_once "../class/class_form.php";
$form = new formulir('Tamu', 'POST', 'simpan.php','');
$form->judul('Form Input Tamu');
$form->kolom_kode('daftar_tamu');
$form->kolom('Nama Tamu','text', 'nama', 'nama', '"Nama Lengkap"', 'required');
$form->kolom('Kantor / Instansi','text', 'instansi', 'instansi', '"Nama Kantor / Instansi"', 'required');
$form->kolom('Keperluan','text', 'keperluan', 'keperluan', '"Isi keperluan anda.."', 'required');
$form->kolom_isi('Tanggal','text', 'tanggal', 'tanggal', '" "', 'required',$tanggal,'readonly');
$form->kolom_isi('Jam','text', 'jam', 'jam', '" "', 'required',$jam,'readonly');
$form->tombol_form('submit','Simpan');
$form->tutup_form();

echo"</div>";
?>
