<?php include("koneksi.php");
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
    $bb=date('Y');
  $awal=$bb-1;
?>
<html>
<head>
	<title>Cetak Tanah | SI Inventaris</title>
</head>
<body>
 
	<center>
  <table border='0' width='90%'>

<tr>
<td rowspan='4' width='150' height="50" align='center'><img src='logosip.png' width='70'></td>
<td colspan='2'  align='center'><h1><b>SMP Negeri 2 Rembang</b></h1></td>
<td rowspan='7' width='100' align='center'></td>
</tr>
 <tr>
<td colspan='2' align='center'><h3><b>DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA KABUPATEN REMBANG<BR></b></h3></td>
</tr>
<tr>
<td colspan='2' align='center'><i><h5>Jl.P Sudirman No 127, Kabongan Lor, Kecamatan Rembang Kabupaten Rembang, Jawa Tengah 59219</h5> </i></td>
</tr>  
</table>
<hr>
<table border='0' width='100%'>
<tr>
<td align='center'><h2><b>LAPORAN DATA BANGUNAN</b></h2></td>
</tr>
</table>
            <table border="1" width="100%">
                 <thead>
                 <tr bgcolor="pink">
                  <th width="10px">Kode Barang</th>
                  <th width="30px">Nama Barang</th>
                  <th width="30px">Tanggal Pembelian</th>
                  <th width="30px">Jumlah Barang</th>
                  <th width="30px">Type</th>
                  <th width="30px">Harga Satuan</th>
                  <th width="20px">Ruang</th>
                  <th width="10px">Keterangan</th>
                </tr>
                </thead>
                <tbody>
                  <?php
    			  include("koneksi.php");
    			  $qry=mysql_query("SELECT r.nama_ruang, b.* FROM barang b INNER JOIN ruang r on b.kode_ruang=r.kode_ruang")or die(mysql_error());
    			  $no=1;
    			  while($data=mysql_fetch_array($qry)){
    			  ?>
                <tr>
                  <td><?php echo $data[1] ?></td>
                  <td><?php echo $data[3] ?></td>
                  <td><?php echo $data[4] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <td><?php echo $data[6] ?></td>
                  <td><?php echo $data[7] ?></td>
                  <td><?php echo $data[0] ?></td>
                  <td><?php echo $data[8] ?></td>
                </tr>
                <?php
        }
        ?>
              </table>

             
           
  <table width="100%">
              <tr>
                <td align="right"><br><br><br><br><h4>Rembang,<?php echo date("d").' '.$bulan= getBulan(date("m")).' '.date("yy") ?> </td>
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
                <td align="right"><h4>            
              </td>
              </tr>
             </table>
	<script>
		window.print();
	</script>
	
</body>
</html>