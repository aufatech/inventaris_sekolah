<?php
include"koneksi.php";
?>
<?php
if (isset($_GET['lihat'])){
$id=$_GET['lihat'];
$qry=mysql_query("SELECT *, CASE
tanggal_kembali 
WHEN '0000-00-00' THEN
'Belum Kembali' 
 ELSE 'Sudah Kembali' 
END status_kembali FROM peminjaman where id='$id'");
$dat=mysql_fetch_assoc($qry);
echo '
 <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">Transaksi</h3>
              <div class="col-12"><br>
              <table id="example1" class="table table-bordered table-striped ">
              <thead>
              <tr bgcolor="pink">
                <th width="10px">Kode Peminjaman</th>
                <th width="20px">Nama Barang</th>
                <th width="30px">Jumlah Barang</th>
              </tr>
              </thead>
              <tbody>';
    $qry=mysql_query("SELECT b.nama_barang, dp.* FROM detail_pinjam dp JOIN barang b ON dp.kode_barang=b.kode_barang where dp.id_trans='$id'");
    $no=1;
          while($data=mysql_fetch_array($qry)){
            echo '
              <tr>
                <td>'.$data[2].'</td>
                <td>'.$data[0].'</td>
                <td>'.$data[4].'</td>
              </tr>
              ';
      }
      echo '
            </table>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><b>ID : '.$dat['id'].'</b></h3>
              <p></p>
              <hr>
              <table>
              <tr>
                <td><h4 class="mt-3">Nama Peminjam </h4></td>
                <td width="40%"><h4 class="mt-3">'.$dat['nama_peminjam'].'</h4></td></tr>
              <tr>
              <tr>
                <td><h4 class="mt-3">Tanggal Pinjam   </h4></td>
                <td><h4 class="mt-3">'.$dat['tanggal_pinjam'].'</h4></td>
              </tr>
              <tr>
                <td><h4 class="mt-3">Tanggal Kembali   </h4></td>
                <td>
                <h4 class="mt-3">';
                if($dat['tanggal_kembali'] == "0000-00-00"){
                  echo '<button class="btn btn-sm btn-flat btn-warning">Belum Kembali</button>';
                }else{
                  echo '<button class="btn btn-sm btn-flat btn-success"><h4 class="mt-2">'. $dat['tanggal_kembali'] .'</h4></button>';
                } echo '</h4>
                </td>
              </tr>
              <tr>
                <td><h4 class="mt-3">Keperluan   </h4></td>
                <td><h4 class="mt-3">'.$dat['keperluan'].'</h4></td>
              </tr>
              
              <tr>
                <td><br></td>
                <td><br><a href="javascript:window.history.go(-1);">
                <div class="btn btn-info btn-lg btn-flat">
                  
                  <i class="fas fa-chevron-left  fa-lg mr-2"></i> 
                  Kembali
                </div></a></td>
              </tr>
             </table>
            </div>
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->';
}?>
