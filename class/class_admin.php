<?php
class admin
	{
        public $nip;
		public $key;
	
	
		public function __construct ($nip)
		{
			$this->nip=$nip;
		}
			
		
		public function setkey()
		{
			return $key = $this->nip;
		}

		public function lihat($koneksi, $key, $laman)
		{
					
		echo"
		 <link rel=stylesheet href=../../CSS/view.css?version=<?php echo filemtime('view.css');?>
		 <body>
		 <fieldset id=fil_lihat>
				<font class=font_lihat>
				<table class=tabel_lihat>
				<tr class='kepala'>
					<td colspan=11 align=center>
					<legend id=judul_tabel><h3>DAFTAR USER</h3></legend>
					</td>
				</tr>
				
				<div class=cari>
					<form name=fcari method=get action=lihat_admin.php>
						<input type=hidden name=laman>
						<input class=kolom_cari type=text name=nr placeholder='Cari berdasarkan...' autocomplete=off>
					</form>
				</div>
			";
			$per_laman = 8;
			$laman_sekarang=1;
			if ($laman)
				{
					$laman_sekarang = $laman;
					$laman_sekarang = ($laman_sekarang > 1) ? $laman_sekarang:1;
				}
            $query = $koneksi->query("select * from admin where nip like '%$key%' or nama like '%$key%' 
										or level like '%$key%' order by nip");
			$total_data = $query->num_rows;
			$total_laman =ceil($total_data/$per_laman);
			$awal = ($laman_sekarang - 1)*$per_laman;
			$no = $awal+1;
			
			
            $ql =$koneksi->query("select * from admin where nip like '%$key%' or nama like '%$key%' 
										or level like '%$key%' order by nip LIMIT $per_laman OFFSET $awal");

			$j = $ql->num_rows;
	
			if($key)
			{
                $ql =$koneksi->query("select * from admin where nip like '%$key%' or nama like '%$key%' 
										or level like '%$key%' order by nip");
			$j = $ql->num_rows;
			}
			
			if($j==0)
				{	
					echo "<script language='javascript'> alert ('Data tidak ada !!!');
							window.location='register.php'; 
					</script>";
				}
			else
				{
?>
			
				<tr class='list'>
					<td>
					<a href=tambah_user.php><button><text class=judul>Tambah Data</text><input type=image src=../../image/create.png width=25 height=25></button></a>
					</td> 	
				</tr>
					<table class='lihat'>
						<tr class='menu' align=center>
							<td class=judul width=30px;>No</td>
							<td class=judul width=300px;>NIP</td>
                            <td class=judul align=left>Username</td>
                            <td class=judul>Level</td>
							<td class=judul>Pilih Aksi</td>
						</tr>
			
<?php
			for ($a=1; $a<=$j; $a++)
			{
				$data = $ql->fetch_array();
				$k ='';
				if ($data['level'] == 'Analis') {
					$k = "Operator";
				} else if ($data['level'] == 'Administrator') {
					$k = "Administrator";
				} else {
					$k = "Tidak Diketahui";
				}
				if($a % 2 == 1)
					{	 
						echo "<tr class=a>

								<td align=center>".$no++."</td>
								<td align=center>".$data['nip']."</td>
                                <td>".$data['nama']."</td>
                                <td align=center>".$k."</td>
								<td align=center width=100px;>
									<a href='mutakhir_user.php?kunci=".$data["nip"]."'><input type=image src=../../image/edit.png alt='button' class=tombol></a>
									<a href='hapus_user.php?kode=".$data["nip"]."'  onClick=\"return confirm('Apakah anda ingin menghapus data ini ?')\"><input type=image src=../../image/delete.png alt='button' class=tombol></a>
								</td>
							</tr>";
					}
						else
					{
						echo "<tr class=b>
                        <td align=center>".$no++."</td>
                        <td align=center>".$data['nip']."</td>
                        <td>".$data['nama']."</td>
                        <td align=center>".$k."</td>
                        <td align=center width=100px;>
                            <a href='mutakhir_user.php?kunci=".$data["nip"]."'><input type=image src=../../image/edit.png alt='button' class=tombol></a>
                            <a href='hapus_user.php?kode=".$data["nip"]."'  onClick=\"return confirm('Apakah anda ingin menghapus data ini ?')\"><input type=image src=../../image/delete.png alt='button' class=tombol></a>
                        </td>
							</tr>";
					}
			}
			
			$que =$koneksi->query("select * from admin where nip like '%$key%' or nama like '%$key%' 
										or level like '%$key%' order by nip");
				
			$sql = $que->num_rows;	
				echo "</table>";
				echo "<p class=jumlah-data align=center>Jumlah Data : $sql</p>";
					  	
				}
				echo"<div class=page>";
				if (isset($total_laman))
				{ if($total_laman > 1)
					{ if ($laman_sekarang > 1)
					   { $n = $laman_sekarang-1;
						echo"<a href=lihat_admin.php?nr=&&laman=$n class=page aria-label=Sebelumnya>
							<span aria-hidden=true class=page>Sebelumnya |</span></a>";
						}
				     else
						{
						echo"<span aria-hidden=true class=page>Sebelumnya |</span>";
						}
					if ($laman_sekarang < $total_laman)
						{ $n = $laman_sekarang+1;
						echo"<a href=lihat_admin.php?nr=&&laman=$n aria-label=Selanjutnya class=page>
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
