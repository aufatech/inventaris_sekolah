<?php include("../koneksi.php");
function getBulan($bln){
    switch ($bln){
     case 1:
      return "Januari";
      break;
     case 2:
      return "Februari";
      break;
     case 3:
      return "Maret";
      break;
     case 4:
      return "April";
      break;
     case 5:
      return "Mei";
      break;
     case 6:
      return "Juni";
      break;
     case 7:
      return "Juli";
      break;
     case 8:
      return "Agustus";
      break;
     case 9:
      return "September";
      break;
     case 10:
      return "Oktober";
      break;
     case 11:
      return "November";
      break;
     case 12:
      return "Desember";
      break;
    }
   }
function kodeauto($table,$initial){
$struktur = mysql_query("SELECT 'id_user' FROM ".$table);
$field = mysql_field_name($struktur,0);
$panjang = mysql_field_len($struktur,0);
$qry=mysql_query("SELECT MAX(".$field.") FROM ".$table);
$row=mysql_fetch_array($qry);
if($row[0]==""){
	$angka=0;
}else{
	$angka=substr($row[0],strlen($initial));

	}
	$angka++;
	$angka=strval($angka);
	$tmp="";
	for($i=1; $i<=($panjang-strlen($initial)-strlen($angka));$i++){
		$tmp=$tmp."0";
	}
return $initial.$tmp.$angka;
}
$kode=kodeauto("user","USR");
$nama=$_POST['nama'];
$user=$_POST['user'];
$password=$_POST['pass'];
$qry=mysql_query("INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `alamat`, `no_telp`, `tempat`, `tgl_lahir`, `no_rekening`, `level`, `status`) VALUES ('$kode', '$nama', '$user', MD5('$password'), '', '', '', '', '', 'user', '0')") or die(mysql_error());
if($qry){

  echo "<script>alert('Berhasil Daftar silahkan cetak kartu pendaftaran dan hubungi pihak basnas untuk konfirmasi pendaftaran.'');</script>
<html>
<head>
	<title>Cetak KARTU PENDAFTARAN | SIA Baznas</title>
</head>
<body>
 
	<center>
		<table border='0' width='100%'>
						<tr>
						<td rowspan='4' width='200' align='center'><img src='../baznas.png' width='200'></td>
						<td colspan='2'  align='center'><h2><b>BADAN AMIL ZAKAT NASIONAL</b></h2></td>
						<td rowspan='7' width='120' align='center'></td>
						</tr>
						 <tr>
						<td colspan='2' align='center'><h3><b>KABUPATEN REMBANG<BR></b></h3></td>
						</tr>
						<tr>
						<td colspan='2' align='center'><i><h4>Jalan Kabongan Kidul</h4> </i></td>
						</tr>  
						</table>
						<hr>

	
 
	<br/>";
$qr=mysql_query("SELECT * FROM user where id_user='$kode'") or die(mysql_error());
$data=mysql_fetch_assoc($qr);
echo "
	<p><h2><b>
		ID Pengguna ".$data['id_user']."</b></h2>
	</p> </center>
 <table width='100%'><center>
              <tr>
                <td><h4>Nama Lengkap </h4></td>
                <td width='70%'><h4>:".$data['nama']."</h4></td></tr>
              <tr>
              <tr>
                <td><h4>Username  </h4></td>
                <td><h4>:".$data['username']."</h4></td>
              </tr>
              
              </center>
             </table>
             <table width='100%'>
				      <tr>
                <td align='right'><br><br><br><br><h4>Rembang,".date('d')." ".$bulan= getBulan(date('m'))." ".date('yy')."</td>
              </td>
              </tr>
              <tr>
                <td align='right'><br><br><br><br>
              </td>
              </tr>
              <tr>
                <td align='right'>______________________________
              </td>
              </tr>
              <tr>
                <td align='right'><h4>( ".$data['nama']." )              
              </td>
              </tr>
             </table>
	<script>
		window.print();
	</script>
	
</body>
</html>


";

  }
?>
