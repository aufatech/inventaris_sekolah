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
                  <th width="10px">Kode Peminjaman</th>
                  <th width="20px">Nama Peminjam</th>
                  <th width="30px">Tanggal Peminjaman</th>
                  <th width="30px">Jumlah Barang</th>
                  <th width="30px">Tanggal Kembali</th>
                </tr>
                </thead>
                <tbody>
                  <?php
    			  include("koneksi.php");
    			  $qry=mysql_query("SELECT
            p.*,
            SUM( dp.jumlah_barang ),
          CASE
              p.tanggal_kembali 
              WHEN '0000-00-00' THEN
              'Belum Kembali' 
               ELSE 'Sudah Kembali' 
            END status_kembali
          FROM
            peminjaman p
            JOIN detail_pinjam dp ON p.id = dp.id_trans 
          GROUP BY
            p.id")or die(mysql_error());
    			  $no=1;
    			  while($data=mysql_fetch_array($qry)){
    			  ?>
                <tr>
                  <td><?php echo $data[1] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <td><?php echo $data[3] ?></td>
                  <td><?php echo $data[7] ?></td>
                  <td>
                  <?php 
                  if($data[8] == "Belum Kembali"){
                    echo $data[8];
                  }else{
                    echo $data[4];
                  }  ?>
                  
                  </td>
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