<?php
include "koneksi.php";
?>

<div class="col-12 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Transaksi Pengembalian</h3>
              <div class="card-tools">
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
                  <th width="30px">Tanggal Kembali</th>
                  <th width="10px">Aksi</th>
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
                    echo '<button class="btn btn-sm btn-flat btn-warning">'. $data[8] .'</button>';
                  }else{
                    echo '<button class="btn btn-sm btn-flat btn-success">'. $data[4] .'</button>';
                  }  ?>
                  
                  </td>
                  <td>
                  <a href="?user=detailkembali&&lihat=<?php echo $data[1] ?>" class="btn btn-info btn-sm">Lihat Detail</a>
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
