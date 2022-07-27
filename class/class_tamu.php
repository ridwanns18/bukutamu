<?php
class tamu
	{
        public $id_tamu;
		public $key;
	
	
		public function __construct ($id_tamu)
		{
			$this->id_tamu=$id_tamu;
		}
			
		
		public function setkey()
		{
			return $key = $this->id_tamu;
		}

		public function lihat($koneksi, $key, $laman)
		{
		if ($_SESSION['level']=="Operator")
		{
			$hak="hidden";
		}			
		else
		{
			$hak="";
			}
		
		echo"
		 <link rel=stylesheet href=../CSS/view.css?version=<?php echo filemtime('view.css');?>
		 <body>
		 <fieldset id=fil_lihat>
				<font class=font_lihat>
				<table class=tabel_lihat>
				<tr class='kepala'>
					<td colspan=11 align=center>
					<legend id=judul_tabel><h3>DATA TAMU</h3></legend>
					
					</td>
				</tr>
				
				<div class=cari>
					<form name=fcari method=get action=lihat_tamu.php>
						<input type=hidden name=laman>
						<input class=kolom_cari type=text name=nr placeholder='Cari berdasarkan nama' autocomplete=off>
						
					</form>
				
				</div>
				
			";
			$per_laman = 5;
			$laman_sekarang=1;
			if ($laman)
				{
					$laman_sekarang = $laman;
					$laman_sekarang = ($laman_sekarang > 1) ? $laman_sekarang:1;
				}
            $query = $koneksi->query("select * from daftar_tamu order by id_tamu");
			$total_data = $query->num_rows;
			$total_laman =ceil($total_data/$per_laman);
			$awal = ($laman_sekarang - 1)*$per_laman;
			$no = $awal+1;
			
			
            $ql =$koneksi->query("select * from daftar_tamu where nama like '%$key%' 
										order by id_tamu LIMIT $per_laman OFFSET $awal");
    

			$j = $ql->num_rows;
	

			
			if($j==0)
				{	
					echo "<script language='javascript'> alert ('Data tidak ada !!!');
							window.location='index.php'; 
					</script>";
				}
			else
				{
?>
			
				<tr class='list'>
					<td>
					<a href=index.php><button><text class=judul>Tambah Data</text><input type=image src=../image/create.png width=25 height=25></button></a>
					</td> 	
				</tr>
					<table class='lihat'>
						<tr class='menu' >
							<td class=judul width=30px; align=center>No</td>
							<td class=judul width=150px; align=center>ID Tamu</td>
                            <td class=judul>Nama</td>
                            <td class=judul>Kantor / Instansi</td>
                            <td class=judul>Keperluan</td>
                            <td class=judul>Waktu Berkunjung</td>
                            <td class=judul>ID Card Tamu</td>

<?php				
							echo"
							<td class=judul $hak align=center>Pilih Aksi</td>
						</tr>";
			

			for ($a=1; $a<=$j; $a++)
			{
				$data = $ql->fetch_array();
				if($a % 2 == 1)
					{
						echo "<tr class=a>
								<td align=center>".$no++."</td>
								<td align=center>".$data['id_tamu']."</td>
                                <td>".$data['nama']."</td>
                                <td>".$data['instansi']."</td>
                                <td>".$data['keperluan']."</td>
                                <td>".$data['tanggal']." , ".$data['jam']."</td>
                                <td><a href=unduh.php?kode=".$data["id_tamu"]."><button><text class=judul>Unduh</text><input type=image src=../image/unduh.png width=20 height=20></button></a></td>
								<td align=center width=100px; $hak>
									<a href='hapus_pegawai.php?kode=".$data["id_tamu"]."'  onClick=\"return confirm('Apakah anda ingin menghapus data ini ?')\"><input type=image src=../image/delete.png alt='button' class=tombol></a>
								</td>
							</tr>";
					}
						else
					{
						echo "<tr class=b>
							<td align=center>".$no++."</td>
								<td align=center>".$no++."</td>
								<td align=center>".$data['id_tamu']."</td>
                                <td>".$data['nama']."</td>
                                <td>".$data['instansi']."</td>
                                <td>".$data['keperluan']."</td>
                                <td>".$data['tanggal']." , ".$data['jam']."</td>
                                <td><a href=unduh.php?kode=".$data["id_tamu"]."><button><text class=judul>Unduh</text><input type=image src=../image/unduh.png width=20 height=20></button></a></td>
								<td align=center width=100px; $hak>
									<a href='hapus_pegawai.php?kode=".$data["id_tamu"]."'  onClick=\"return confirm('Apakah anda ingin menghapus data ini ?')\"><input type=image src=../image/delete.png alt='button' class=tombol></a>
								</td>
                        
                        
							</tr>";
					}
			}
			
			$que =$koneksi->query("select * from daftar_tamu where nama like '%$key%'
										order by id_tamu");
				
			$sql = $que->num_rows;	
				echo "</table>";
				echo "<p class=jumlah-data align=center> Total Data : $sql</p>";
					  	
				}
				echo"<div class=page>";
				if (isset($total_laman))
				{ if($total_laman > 1)
					{ if ($laman_sekarang > 1)
					   { $n = $laman_sekarang-1;
						echo"<a href=lihat_pegawai.php?nr=&&laman=$n class=page aria-label=Sebelumnya>
							<span aria-hidden=true class=page>Sebelumnya |</span></a>";
						}
				     else
						{
						echo"<span aria-hidden=true class=page>Sebelumnya |</span>";
						}
					if ($laman_sekarang < $total_laman)
						{ $n = $laman_sekarang+1;
						echo"<a href=lihat_pegawai.php?nr=&&laman=$n aria-label=Selanjutnya class=page>
							<span aria-hidden=true class=page>| Selanjutnya</span>";
						}
					else
						{
						echo"<span aria-hidden=true class=page>| Selanjutnya</span>";
						}
						
					}
				} 
				echo"</div></body>";
				}
				





			
	}
?>
