<?php
include "koneksi.php";
// include "kode.php";
include("fungsi.php");
$auto=kodetanah();
?>
<div class="row">
<div class="col-6 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Data Tanah</h3>
              <div class="card-tools">
              <a href="?admin=cetaktanah" class="btn btn-sm btn-flat btn-success animated swing"><i class='fa fa-print'></i> Cetak Tanah</a>
            </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th width="10px">Kode Tanah</th>  
                  <th width="20px">No Sertifikat</th>
                  <th width="30px">Nama Tanah</th>
                  <th width="30px">Luas Tanah</th>
                  <th width="30px">Tanggal Sertifikat</th>
                  <th width="10px">Harga</th>
                  <th width="10px">Keterangan</th>
                </tr>
                </thead>
                <tbody>
                  <?php
    			  include("koneksi.php");
    			  $qry=mysql_query("SELECT * FROM tanah")or die(mysql_error());
    			  $no=1;
    			  while($data=mysql_fetch_array($qry)){
    			  ?>
                <tr>
                  <td><?php echo $data[0] ?></td>
                  <td><?php echo $data[1] ?></td>
                  <td><?php echo $data[2] ?></td>
                  <td><?php echo $data[3] ?></td>
                  <td><?php echo $data[4] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <td><?php echo $data[6] ?></td>
                </tr>
                <?php
        }
        ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-6 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Data Bangunan</h3>
              <div class="card-tools">
              <a href="?admin=cetakbangunan" class="btn btn-sm btn-flat btn-success animated swing"><i class='fa fa-print'></i> Cetak Bangunan</a>
            </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive">
            <table class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th width="10px">Kode Bangunan</th>
                  <th width="20px">Nama Bangunan</th>
                  <th width="30px">Nama Tanah</th>
                  <th width="30px">Luas Bangunan</th>
                  <th width="30px">Jumlah Lantai</th>
                  <th width="10px">Tahun Dibangun</th>
                  <th width="10px">Harga</th>
                  <th width="30px">Kepemilikan</th>
                  <th width="30px">Tanggal SK</th>
                  <th width="10px">Keterangan</th>
                </tr>
                </thead>
                <tbody>
                  <?php
    			  include("koneksi.php");
    			  $qry=mysql_query("SELECT t.nama_tanah, b.* FROM bangunan b INNER JOIN tanah t on b.`kode _tanah`=t.kode_tanah")or die(mysql_error());
    			  $no=1;
    			  while($data=mysql_fetch_array($qry)){
    			  ?>
                <tr>
                  <td><?php echo $data[1] ?></td>
                  <td><?php echo $data[0] ?></td>
                  <td><?php echo $data[3] ?></td>
                  <td><?php echo $data[4] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <td><?php echo $data[6] ?></td>
                  <td><?php echo $data[7] ?></td>
                  <td><?php echo $data[8] ?></td>
                  <td><?php echo $data[9] ?></td>
                  <td><?php echo $data[10] ?></td>
                </tr>
                <?php
        }
        ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>
        <div class="row">
<div class="col-6 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Data Ruang</h3>
              <div class="card-tools">
              <a href="?admin=cetakruang" class="btn btn-sm btn-flat btn-success animated swing"><i class='fa fa-print'></i> Cetak Ruang</a>
            </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive">
            <table class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th width="10px">Kode Ruang</th>
                  <th width="30px">Nama Ruang</th>
                  <th width="30px">Lantai Ke</th>
                  <th width="30px">Luas</th>
                  <th width="10px">Harga</th>
                  <th width="20px">Nama Bangunan</th>
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
                  <td><?php echo $data[3] ?></td>
                  <td><?php echo $data[4] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <td><?php echo $data[6] ?></td>
                  <td><?php echo $data[0] ?></td>
                  <td><?php echo $data[7] ?></td>
                </tr>
                <?php
        }
        ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-6 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Data Barang</h3>
              <div class="card-tools">
              <a href="?admin=cetakbarang" class="btn btn-sm btn-flat btn-success animated swing"><i class='fa fa-print'></i> Cetak Barang</a>
            </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive">
            <table class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th width="10px">Kode Barang</th>
                  <th width="30px">Nama Barang</th>
                  <th width="30px">Tanggal Pembelian</th>
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
                  <td><?php echo $data[0] ?></td>
                  <td><?php echo $data[8] ?></td>
                </tr>
                <?php
        }
        ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>