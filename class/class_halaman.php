<?php
class halaman
{

	//function untuk menampilkan halaman login
	
	function halaman_login($action)
	{
		echo"
		<head>
  			<meta charset=UTF-8>
  			<meta name=viewport content='width=device-width, initial-scale=1.0'> 
  			<link rel=stylesheet href=CSS/login.css?version=<?php echo filemtime('login.css'); ?>
  			<title>Login</title>
		</head>
		<body>
    		<div class=login>
        		<div class=form>
        		 <img class=logo src='image/logo.png' style='width:250px;'>
					<h2>Silahkan Login</h2>
					<form action='$action' method=post>  
          				<table>
            				<tr><td><input name=nama type=text placeholder='Masukkan Username' autocomplete=off></td></tr>
            				<tr><td><input name=password type=password placeholder='*************'></td></tr>
            				<tr><td><button type=submit>Login</button></td></tr>
						</table>
					</form>  
        		</div>
    		</div>
    		
    		<div class=footer>
					<p><br><strong><a href='#' class=linka>Ridwan Nur Sidik</a> - </strong> <span class=copyleft>&copy;</span> Copyleft 2022</p>
			</div>
		</body>";
	}
	


//function untuk menampilkan halaman pengaturan
	function halaman_data_pengguna()
	{
	if ($_SESSION['level']=="Operator" || $_SESSION['level']=="Analis")
		{
			$hak="ganti_sandi.php";
		}			
		else
		{
			$hak="lihat_admin.php?nr&&laman=";
			}	
		
	echo"
  	<head>
   	 <meta charset=UTF-8>
   	 <meta name=viewport content='width=device-width, initial-scale=1.0'> 
   	 <link rel=stylesheet href='../../CSS/stylesheet.css?version=<?php echo filemtime('stylesheet.css'); ?>'>
   	 <title>Data Pengguna</title>
 	</head>
  	<body>
   		 <!--Header -->
   		 <div class=header>
     		 <div class=header-logo>
      			  <img class=logo src='../../image/header-logo.png'>  
     		 </div>
     		 <div class=header-menu>
        		<a href=../../halaman_utama.php>Beranda</a>
      		</div>
   		 </div>

   		<!-- Body main -->
     	<div class=main>
			 <iframe name=area src=$hak>
			 
			 </iframe> 	
    	</div>

    	
			<div class=footer>
					<p><br><strong><a href='#' class=linka>Ridwan Nur Sidik</a> - </strong> <span class=copyleft>&copy;</span> Copyleft 2022</p>
			</div>
 	</body>";
	}




	function halaman_tamu()
	{
	echo"
  	<head>
   	 <meta charset=UTF-8>
   	 <meta name=viewport content='width=device-width, initial-scale=1.0'> 
   	 <link rel=stylesheet href='CSS/stylesheet.css?version=<?php echo filemtime('stylesheet.css'); ?>'>
   	 <title>Beranda</title>
 	</head>
  	<body>
   		 <!--Header -->
   		 <div class=header>
     		 <div class=header-logo>
      			  <img class=logo src='image/logo.png'>
     		 </div>
     		 <div class=header-menu>
        		<a href=index.php>Beranda</a>
       			<a href=#>Tentang</a>   
				<a href=#>Kontak</a>   
      		</div>
   		 </div>

   		<!-- Body main -->
     	<div class=selamat>
     		
     		<p class=spk>Selamat Datang Di Perusahaan Kami
     		Dharma Group</p>
			<p class=underline></p>
			<div class=header-regis>
        		<a href=registrasi/index.php>Registrasi Kehadiran</a>
      		</div>
    	</div>

		<div class=footer>
					<p><br><strong><a href='#' class=linka>Ridwan Nur Sidik</a> - </strong> <span class=copyleft>&copy;</span> Copyleft 2022</p>
			</div>
 	</body>";
	}







function halaman_index()
	{
	
	echo"
  
  	<head>
   	 <meta charset=UTF-8>
   	 <meta name=viewport content='width=device-width, initial-scale=1.0'> 
   	 <link rel=stylesheet href='CSS/stylesheet.css?version=<?php echo filemtime('stylesheet.css');?>
   	 <link rel=stylesheet href='CSS/style.css'>
   	 <title>Beranda</title>
   	 <style>
		.main{
			background-image: url('image/SDI.png');
			background-size: cover;
			background-attachment: fixed;
			background-repeat: no-repeat;
			background-position:center;
		}	
   	 </style>
 	</head>
  	<body>
   		 <!--Header -->
   		

<div class='w3-sidebar w3-bar-block w3-border-right' style='display:none' id='mySidebar'>
	<button onclick='w3_close()' class='w3-bar-item w3-large'>Buku Tamu &times;</button>
			<a href='halaman_utama.php' class='w3-bar-item w3-button'><input type=image src=image/dashboard.png width=25 height=25>&nbspDashboard</a>
			<a href=registrasi/lihat_tamu.php?nr&&laman= target=area class='w3-bar-item w3-button'><input type=image src=image/pagawe.png width=25 height=25>&nbspData Tamu</a>
			<a href=keamanan/pengaturan/lihat_admin.php?nr&&laman= target=area class='w3-bar-item w3-button'><input type=image src=image/pegawai.png width=25 height=25>&nbspData Pengguna</a>
			<a href=keamanan/logout.php class='w3-bar-item w3-button'><input type=image src=image/logout.png width=25 height=25>&nbspLogout</a>
</div>
<div class='w3-teal'>
	<button class='w3-button w3-teal w3-xlarge' onclick=w3_open()>☰</button>
		<img class=logo src='image/logo.png'>
</div>
   		<!-- Body main -->
     	<div class=main>
       		 <iframe name=area>
			 
			 </iframe> 
					
    	</div>

			<div class=footer>
					<p><br><strong><a href='#' class=linka>Ridwan Nur Sidik</a> - </strong> <span class=copyleft>&copy;</span> Copyleft 2022</p>
			</div>
			";
		?>
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>	
<?php			
 	echo"</body>";
  
	}

}

?>
