<?php
include "class_basisdata.php";
class login
{
	public $nip;
	public $password;
	
	public function __construct($kode, $password)
	{
		$this->kode =$kode;
		$this->password =$password;
	}
	
	public function validasi()
	{
	$db=new basisdata();
	$koneksi=$db->koneksi();
	$ceknip = $koneksi->query("select * from admin where nama='".$this->kode."'");
	$jnip = $ceknip->num_rows;
	
	if($jnip == 0)
	{
		echo "<script type=text/javascript>
		alert('Maaf Username anda belum terdaftar');
		window.location='login.php';
		</script>";
		
	}
	else
	{
		
		
		$cekpass= $koneksi->query("select * from admin where nama='".$this->kode."'");
		$data =$cekpass->fetch_array();
			
		if(password_verify($this->password,$data['sandi']))
	
		{
			session_start();
			$_SESSION['nip'] = $data['nip'];
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['level'] = $data['level'];
			
				header('Location: ../halaman_utama.php');
			
			
		}
		else
			{
			echo "<script type=text/javascript>
			alert('Kata Sandi salah');
			window.location='../index.php';
			</script>
			";
		}
	}
		
	}
	
	
	
	public function keluar()
	{
	session_start();
	session_destroy();
	echo "<script type=text/javascript>
	alert('Anda berhasil keluar');
	window.location='../index.php';
	</script>";
	}
	

}
?>
