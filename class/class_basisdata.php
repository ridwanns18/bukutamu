<?php
class basisdata
{

//function untuk koneksi database    
public function koneksi()
{		
    return $mysqli = new mysqli("localhost","root","","bukutamu");
}

//function untuk menyimpan ke database

public function simpan($tabel, $perintah, $url, $isi, $kunci)
		{
			echo "<input type=hidden value=$url id=url>";
			$konek = $this->koneksi();
			$konek = new mysqli("localhost", "root", "" , "bukutamu");
			
			//periksa apakah data sudah ada atau belum
			$qp = $konek->query("select * from ".$tabel." where ".$isi."='".$kunci."'");
			$jmbrs = $qp->num_rows;
			if ($jmbrs==1)
			{
				?>
				 <script type=text/javascript>
				  alert("Data sudah ada");
				  var url = document.getElementById('url').value;
				  window.location = url;
				 </script>
				<?php
			}
			else
			{
			$qs = $konek->query("insert into ".$tabel." set ".$perintah);
				if($qs)
				{
				?>
				 <script type=text/javascript>
				  alert("Data Berhasil Disimpan");
				  var url = document.getElementById('url').value;
				  window.location = url;
				 </script>
				<?php
				}
			}
		}
		

public function simpan_alternatif($tabel, $perintah, $url, $isi1, $isi2)
		{
			echo "<input type=hidden value=$url id=url>";
			$konek = $this->koneksi();
			$konek = new mysqli("localhost", "root", "" , "dinas");
			
			//periksa apakah data sudah ada atau belum
			$qp = $konek->query("select * from ".$tabel." where nip='".$isi1."' and kode_kriteria='".$isi2."'");
			$jmbrs = $qp->num_rows;
			if ($jmbrs==1)
			{
				?>
				 <script type=text/javascript>
				  alert("Data sudah ada");
				  var url = document.getElementById('url').value;
				  window.location = url;
				 </script>
				<?php
			}
			else
			{
			$qs = $konek->query("insert into ".$tabel." set ".$perintah);
				if($qs)
				{
				?>
				 <script type=text/javascript>
				  alert("Data Berhasil Disimpan");
				  var url = document.getElementById('url').value;
				  window.location = url;
				 </script>
				<?php
				}
			}
		}



	
		public function hapus($tabel, $syarat, $urll)
			{
				$koneksi= $this->koneksi();	
				$hapus = $koneksi->query("DELETE from ".$tabel." WHERE ".$syarat." ");

				if ($hapus)
				{
					echo "<script type=text/javascript>alert('Data berhasil di Hapus'); window.location= '".$urll."' </script>
							";			
				}else{
						
					echo "<script type=text/javascript>alert('Data Gagal Di Hapus'); window.location= '".$urll."' </script>
							";
				}
			}	


			//function untuk Mutakhir
			public function mutakhir($tabel, $perintah, $kode, $url1) 
			{
				echo "<input type=hidden value=$url1 id=url1>";
				$kn = new mysqli("localhost", "root", "" , "dinas");
				$mutakhir =$kn->query("update ".$tabel." set ".$perintah." where ".$kode." ");
				
				if($mutakhir) 
				{
					?>
					<script type="text/javascript">
							alert("Data Berhasil Dimutakhir");
							var url1 = document.getElementById('url1').value; //deklarasi var url
							window.location = url1; //menuju url yang diinginkan
					</script>
					<?php
				}
			}
			
		public function tambah($tabel, $data1)
		{
			$koneksi= $this->koneksi();	
			$alter = $koneksi->query("ALTER TABLE ".$tabel." add ".$data1." int(3) not null");
		}
		
		public function kurang($tabel, $data1)
		{
			$koneksi= $this->koneksi();	
			$alter = $koneksi->query("ALTER TABLE ".$tabel." drop ".$data1." ");
		}
			
			//function mutakhir password
		public function mutakhir_sandi_admin($nip,$data1, $data2, $data3)
		{
			
			$this->data1=$data1;
			$this->data2=$data2;
			$this->data3=$data3;
			$this->nip=$nip;
			$koneksi = new mysqli('localhost','root','','dinas');
			$cekpass= $koneksi->query("select * from admin where nip='".$this->nip."'");
			$data = $cekpass->fetch_array();
			
			if(password_verify($this->data1,$data['sandi']))
	
			{
				
				$sandi_baru=password_hash($data2,PASSWORD_DEFAULT);
				if(password_verify($data3,$sandi_baru))
				{
				$kn = new mysqli("localhost", "root", "" , "dinas");
				$mutakhir =$kn->query("update admin set sandi='".$sandi_baru."' where nip='".$this->nip."' ");
				
					if($mutakhir) 
					{
					echo"
						<script type='text/javascript'>
							alert('Data Berhasil DiMutakhir');
							window.location ='ganti_sandi.php'; //menuju url yang diinginkan
					</script>";
					}
					
				}
				else
				{
					echo"
					<script type='text/javascript'>
							alert('Kata Sandi Baru Tidak Cocok !');
							window.location ='ganti_sandi.php';
					</script>
					";
					
					}
				
			}
			else
			{
				echo"
					<script type='text/javascript'>
							alert('Kata Sandi Lama Salah !');
							window.location ='ganti_sandi.php'; //menuju url yang diinginkan
					</script>
					";
			}
		}


}


?>
