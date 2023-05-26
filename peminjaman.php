<?php
include "koneksi.php";
?>

<div class="col-12 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Transaksi Peminjaman</h3>
              <div class="card-tools">
              <a href="?user=tambahtransaksi" class="btn btn-sm btn-flat btn-success animated swing"><i class='fa fa-check'></i> Tambah Peminjaman</a>
            
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th width="10px">Kode Peminjaman</th>
                  <th width="20px">Nama Peminjam</th>
                  <th width="30px">Tanggal Peminjaman</th>
                  <th width="30px">Jumlah Barang</th>
                  <th width="10px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
    			  include("koneksi.php");
    			  $qry=mysql_query("SELECT p.*, SUM(dp.jumlah_barang) as quanty FROM peminjaman p JOIN detail_pinjam dp ON p.id=dp.id_trans where p.tanggal_kembali = '0000-00-00' GROUP BY p.id")or die(mysql_error());
    			  $no=1;
    			  while($data=mysql_fetch_array($qry)){
    			  ?>
                <tr>
                  <td><?php echo $data[0] ?></td>
                  <td><?php echo $data[4] ?></td>
                  <td><?php echo $data[2] ?></td>
                  <td><?php echo $data[6] ?></td>
                  <td>
                  <a href="?user=lihatt&&lihat=<?php echo $data[0] ?>" class="btn btn-info btn-sm">Lihat Detail</a>
                  <a href="?user=edittransaksi&&update=<?php echo $data[0] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="?user=hapuspeminjaman&&delete=<?php echo $data[0] ?>" onclick="return confirm('Apa Anda Yakin Mau dihapus??')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
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
