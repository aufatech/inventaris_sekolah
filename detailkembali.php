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
                <td>'.$data[4].'</td></tr>
              ';
      }
      echo '
            </table>
            <a href="javascript:window.history.go(-1);">
            <div class="btn btn-success btn-lg btn-flat">
              <i class="fas fa-chevron-left  fa-sm"></i> 
            </div></a>
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
                <td><h4 class="mt-3">Keperluan    </h4></td>
                <td><h4 class="mt-3">'.$dat['keperluan'].'</h4></td>
              </tr>
              
              <tr>
                <td><br>';
                if($dat['tanggal_kembali'] == "0000-00-00"){
                  echo '<button class="btn btn-sm btn-flat btn-info animated swing" data-toggle="modal" data-target="#kembali"><i class="fa fa-check"></i> Kembalikan Barang</button>';
                }else{
                  echo '';
                } echo '                
                </td>
                <td><br>
               </td>
              </tr>
             </table>
            </div>
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="modal fade" id="kembali">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header bg-info">
              <h4 class="modal-title">Kembalikan Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>ID Peminjaman </label>
                  <input type="text" name="id" class="form-control" value="'.$dat['id'].'" disabled="true"/>
                </div>
              </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label>Tanggal Pengembalian</label>
                  <input type="text" name="tanggal" class="form-control datepicker" id="datepicker" value="'.date('Y-m-d').'" required="true" autofocus="true"/>
                </div>
              </div>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" name="save">Kembalikan</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>';
}?>
 <?php 
      if (isset($_POST['save'])){
        $idd=$dat['id'];
        $tgl=$_POST['tanggal'];
        $user=$_SESSION['id'];
        $qr=mysql_query("SELECT * from detail_pinjam where id_trans='$idd'")or die(mysql_error());
        while($data=mysql_fetch_array($qr)){
          $qry1=mysql_query("UPDATE `barang` SET `jumlah_barang`=jumlah_barang+$data[3] WHERE kode_barang = $data[2]");
        }
        $sql = "UPDATE `peminjaman` SET `tanggal_kembali`='$tgl' WHERE id='$idd'";
        $qry=mysql_query($sql) or die(mysql_error());
        if($qry){
             echo '<script>alert("Berhasil Disimpan.");window.location.assign("?user=detailkembali&&lihat='.$idd.'");</script>';
        }else{
            echo '<script>alert("Data Gagal di Simpan")</script>';
        }
        }
      ?>
