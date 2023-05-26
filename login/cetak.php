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


?>
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

	
 
	<br/>
 <?php
if (isset($_GET['cetak'])){
$id=$_GET['cetak'];
$qry=mysql_query("SELECT * FROM user where id_user='$id'") or die(mysql_error());
$data=mysql_fetch_assoc($qry);
echo '
	<p><h2><b>
		ID Pengguna '.$data['user_id'].'</b></h2>
	</p> </center>
 <table width="100%"><center>
              <tr>
                <td><h4>Nama Lengkap </h4></td>
                <td width="70%"><h4>: '.$data['nama'].'</h4></td></tr>
              <tr>
              <tr>
                <td><h4>Username  </h4></td>
                <td><h4>: '.$data['username'].'</h4></td>
              </tr>
              
              </center>
             </table>
             <table width="100%">
				      <tr>
                <td align="right"><br><br><br><br><h4>Rembang,'.date("d").' '.$bulan= getBulan(date("m")).' '.date("yy").'</td>
              </td>
              </tr>
              <tr>
                <td align="right"><br><br><br><br>
              </td>
              </tr>
              <tr>
                <td align="right">______________________________
              </td>
              </tr>
              <tr>
                <td align="right"><h4>( '.$data['nama'].' )              
              </td>
              </tr>
             </table>
'; }?>
	<script>
		window.print();
	</script>
	
</body>
</html>