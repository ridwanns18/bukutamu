
<?php

class formulir


{
	public $nama_form;
	public $method;
	public $action;
	public $onSubmit;
	
	public function __construct ($nama_form, $method, $action, $enctype)
	{
		$this->nama_form=$nama_form;
		$this->method=$method;
		$this->action=$action;
		$this->enctype=$enctype;
	}
	
	
	public function judul($judul)
		{
        echo"        
        <body>
		<div class=form>
		<form name=".$this->nama_form." method=".$this->method." action=".$this->action." ".$this->enctype." >
		<h2>".$judul."</h2>
		<div class=underline></div>
		<table> ";
        }
           
     public function kolom($judul, $type, $name, $id, $placeholder, $required)
     {
		echo"<tr><td class=judul>".$judul."</td><td>:</td><td class=kolom><input type=$type name=$name id=$id placeholder=".$placeholder." $required autocomplete=off></td></tr>";
	 }   
	 
	 public function kolom_sandi()
     {
		echo"<tr><td class=judul>Password</td><td>:</td><td class=kolom><input type=password name=sandi required></td></tr>";
	 }   
	 
	


 public function kolom_kode($table)
	 {
		  $koneksi = new mysqli('localhost','root','','bukutamu');
		 $date = date('ym');
		 $sql = "SELECT max(id_tamu) FROM $table";
		 $query = $koneksi->query($sql) or die (mysqli_error());
		 $kode = $query->fetch_array();
 
	if($kode){
		$nilai = substr($kode[0],2);
		$id = (int) $nilai;
 
		//tambahkan sebanyak + 1
		$id = $id + 1;
		$auto_kode = "A".str_pad($id, 3 , "0",  STR_PAD_LEFT);
	} else {
		$auto_kode ="A001";
	}

		echo"<tr><td class=judul>ID Tamu</td><td>:</td><td class=kolom><input type=text name=id_tamu value='".$auto_kode."' readonly></td></tr>";
	 	
		 	 }

	
	 
	 
	   public function kolom_isi($judul, $type, $name, $id, $placeholder, $required, $value ,$readonly)
     {
		
		echo"<tr><td class=judul>".$judul."</td><td>:</td><td class=kolom><input type=$type name=$name placeholder=$placeholder id=$id value='".$value."' $readonly autocomplete=off></td></tr>";
	 } 
	 
	 
	 
	
	
	
	public function option_kelamin($judul, $isi)
	{
		$laki = "Laki-laki";
		$perempuan = "Perempuan";
		
		if ($laki == $isi)
		{$select_laki="selected";}
		else if($perempuan == $isi)
		{$select_perempuan="selected";}
		else
		{
			}
		 echo"
		<tr><td class=judul>".$judul."</td><td>:</td>
			<td class=kolom>
		    <select name=jenis_kelamin>";
		 echo "<option>--Pilih Jenis Kelamin--</option>";
		 echo "<option value='Laki-laki' $select_laki>Laki-laki</option>";
		 echo "<option value='Perempuan' $select_perempuan>Perempuan</option>
		 </select>
		 </td></tr>";
	}
	
	
	public function option_level($isi)
	{
		$admin = "Administrator";
		$operator = "Operator";
		$analis = "Analis";
		
		if ($admin == $isi)
		{$select_admin="selected";}
		else if($operator == $isi)
		{$select_operator="selected";}
		else if($analis == $isi)
		{$select_analis="selected";}
		
		else
		{
			}
		 echo"
		<tr><td class=judul>Level User</td><td>:</td>
			<td class=kolom>
		    <select name=level>";
		 echo "<option>--Pilih Level User--</option>";
		 echo "<option value='Administrator' $select_admin>Administrator</option>";
		 echo "<option value='Analis' $select_analis>Operator</option>
		 </select>
		 </td></tr>";
	}
	
	
	
	
	

     
     public function tombol($type,$value)
     {
		echo"
		
			<tr><td colspan=3><br></td></tr>
			<tr><td colspan=3 align=center><input type=$type value=$value></td></tr>
		";
     }   
     
     
     public function tombol_form($type,$value)
     {
		echo"
		
			<tr><td colspan=3><br></td></tr>
			<tr><td colspan=3 align=center><input type=$type value=$value>  <button type=reset>Bersihkan</button></td></tr>
		";
     }      
     
     public function tutup_form()
     {
		 echo"
         </table>
	</form>
	</div>
</body>";
	 }
	 
	
	
	 
 }

?>
