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
<td rowspan='4' width='100' align='center'><img src='logorembang.png' width='70'></td>
<td colspan='2'  align='center'>PEMERINTAH KABUPATEN REMBANG<BR>DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA KABUPATEN REMBANG<br><b><font size="5">SMP NEGERI 2 REMBANG</font></b><br><i>Jl.P Sudirman No 127, Kabongan Lor, Kecamatan Rembang Kabupaten Rembang, Jawa Tengah 59219</i></td>
<td rowspan='4' width='100' align='center'><img src='logosip.png' width='70'></td>
</tr> 
</table>
<hr>
<table border='0' width='100%'>
<tr>
<td align='center'><b>LAPORAN DATA TANAH</b></td>
</tr>
</table>
            <table border="1" width="100%">
                 <thead>
                 <tr bgcolor="pink">
                   <th width="10px">Kode Ruang</th>
                  <th width="30px">Jenis Ruang</th>
                  <th width="10px">Nama Bangunan</th>
                  <th width="20px">Nama Ruang</th>
                  <th width="30px">Lantai Ke</th>
                  <th width="30px">Luas</th>
                  <th width="10px">Keterangan</th>
                </tr>
                </thead>
                <tbody>
                  <?php
    			  include("koneksi.php");
    			  $qry=mysql_query("SELECT b.nama_bangunan, r.* FROM ruang r INNER JOIN bangunan b on r.kode_bangunan=b.kode_bangunan")or die(mysql_error());
    			  $no=1;
    			  while($data=mysql_fetch_array($qry)){
    			  ?>
                <tr>
                 <td><?php echo $data[1] ?></td>
                  <td><?php echo $data[6] ?></td>
                  <td><?php echo $data[0] ?></td>
                  <td><?php echo $data[3] ?></td>
                  <td><?php echo $data[4] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <td><?php echo $data[7] ?></td>
                </tr>
                <?php
        }
        ?>
              </table>

              
  <table width="100%">
              <tr>
                <td align="right"><br><br><br>Rembang,<?php echo date("d").' '.$bulan= getBulan(date("m")).' '.date("yy") ?> </td>
              </td>
              </tr>
              <tr>
                <td align="right"><br><br><br>
              </td>
              </tr>
              <tr>
                <td align="right">_____________________
              </td>
              </tr>
              <tr>
                <td align="right">                             
              </td>
              </tr>
             </table>
  <script>
var css = '@page { size: landscape; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

style.type = 'text/css';
style.media = 'print';

if (style.styleSheet){
  style.styleSheet.cssText = css;
} else {
  style.appendChild(document.createTextNode(css));
}

head.appendChild(style);
    window.print();
  </script>
</body>
</html>