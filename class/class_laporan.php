<?php
	class laporan
	{
			
function cetak($id)
{
			
ob_start();			

require('../fpdf/fpdf.php');
$waktu=date('d-M-Y');
$date='Karawang, '.$waktu.'';

$koneksi = new mysqli("localhost", "root", "" , "bukutamu");
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->Image('../image/logo.png',10,15,50);


$pdf->SetFont('Times','B',32);
$pdf->Text(10, 50,'Visitor');
$pdf->SetLineWidth(1);
$pdf->Line(10,55,115,55);
$pdf->SetFont('Times','',14);
$pdf->Text(10, 70,'ID Tamu');
$pdf->Text(10, 80,'Nama Tamu');
$pdf->Text(10, 90,'Kantor / Instansi');
$pdf->Text(10, 100,'Waktu Registrasi');
$pdf->Text(55, 70,':');
$pdf->Text(55, 80,':');
$pdf->Text(55, 90,':');
$pdf->Text(55, 100,':');

$sql =$koneksi->query(" select * from daftar_tamu where id_tamu='$id'");
$row = $sql->fetch_array();	
$pdf->Text(60, 70,$row[0]);
$pdf->Text(60, 80,$row[1]);
$pdf->Text(60, 90,$row[2]);
$pdf->Text(60, 100,"$row[5] $row[4]");
 
$pdf->SetLineWidth(1);
$pdf->Line(10,115,115,115);

$pdf->SetFont('Times','',10);
$pdf->Text(10, 130,'Harap gunakan ID Card ini selama di lingkungan Perusahaan');
$pdf->Text(10, 135,'Dharma Group, jika kartu ini hilang atau rusak segera hubungi Reseptionis. ');





$pdf->Output();

		}



		
		
	}
?>

