<?php
include "koneksi.php";
// include "kode.php";

include("fungsi.php");
$auto=kodepe();
?>
<div class="row">
<div class="col-4 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Tambah Barang Transaksi</h3>
             </div>
<form method='post'>
            <div class="row">
               <div class="card-body ">
                                <!-- text input -->
                               
                                <div class='form-group'>
                  <label>Barang</label>
                  <select name="kode_barang" class="form-control select2" id="t_level">
                    <option value="">----Pilih Barang----</option>
                    <?php
                                    $brg=mysql_query("SELECT r.nama_ruang as nr, b.* FROM barang b INNER JOIN ruang r on b.kode_ruang=r.kode_ruang WHERE `jumlah_barang` != '0'");
                                    while($b=mysql_fetch_array($brg)){
                                      ?>
                                      <option value="<?php echo $b['kode_barang']; ?>"> <?php echo $b['nama_barang'].' | stok : '.$b['jumlah_barang'].' - '.$b['nr'] ?></option>
                                      <?php
                                    }
                                    ?>
                  </select>
                </div>

                                 <div class='form-group'>
                  <label>Jumlah Barang yang dipinjam</label>
                  <input type='number' name='jumlah' class='form-control' value='0'/>
                </div>

                                   <div class="card-tools">
                              
                            <button type="submit" class="btn btn-primary btn-block" name="tambah">Tambah</button>
                           </div>

                              </div>
                            </div>
          </div>
        </form>
          <!-- /.card -->
        </div>
        <div class="col-8 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Data Transaksi | <?=$auto?></h3>
              <div class="card-tools">
            </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body ">
              <form method='post'>

              <table id="example" class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th width="10px">No</th>
                  <th width="30px">Nama Barang</th>
                  <th width="20px">Ruang</th>
                  <th width="30px">Jumlah </th>
                  <th width="10px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tbody>
                    <?php
                  $qry=mysql_query("SELECT b.nama_barang, r.nama_ruang, dp.jumlah_barang, dp.id, b.kode_barang FROM detail_pinjam dp INNER JOIN barang b ON dp.kode_barang=b.kode_barang INNER JOIN ruang r ON b.kode_ruang = r.kode_ruang WHERE dp.id_trans='0'")or die(mysql_error());
                  $no=1;
                   while($data=mysql_fetch_array($qry)){
                     echo '<tr>
                       <td>'.$no++.'</td>
                       <td>'.$data[0].'</td>
                       <td>'.$data[1].'</td>
                       <td>'.$data[2].'</td>
                       <td><a href="?user=hapusitem&&delete='.$data[3].'&&jumlah='.$data[2].'&&barang='.$data[4].'" onclick="return confirm("Apa Anda Yakin Mau dihapus??"")" class="btn btn-danger btn-sm">Hapus</a>
                     </td>
                     </tr>';

                   }

                   ?>
               
                   </tbody>
               
              </table>
              <hr>

                                <div class="form-group">
                                  <label>Tanggal Peminjaman</label>
                                  <input type="text" name="tanggal" required="true" class="form-control datepicker" id="datepicker" value="<?php echo date('Y-m-d')?>">
                                </div>
              <div class="form-group">
                                  <label>Nama Peminjam</label>
                                  <input type="text" name="nama" required="true" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Keperluan</label>
                                  <input type="text" name="keperluan" required="true" class="form-control">
                                </div>
             <div class="card-footer">
                          <div class="row">
                            <div class="col-sm-12">
                            <div class="card-tools">
                            <button type="submit" class="btn btn-info btn-block" name="simpan">Simpan</button>
                           </div>
                              </div>
                          </div>
                     
              </div>
            </div>
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>

        <?php
                 
                 if (isset($_POST['tambah'])){   
         $barang=$_POST['kode_barang'];
         $jumlah=$_POST['jumlah'];

            $tmpl=mysql_query("SELECT jumlah_barang from barang where kode_barang=$barang")or die(mysql_error());
            $dt=mysql_fetch_assoc($tmpl);
            if($dt['jumlah_barang']-$jumlah<=-1){
          echo '<script>alert("jumlah transaksi barang melebihi stok")</script>';
         }else{
         $qry1=mysql_query("INSERT INTO `detail_pinjam`(`id`, `id_trans`, `kode_barang`, `jumlah_barang`) VALUES ('','0','$barang','$jumlah')") or die(mysql_error());
         $qry3=mysql_query("UPDATE `barang` SET `jumlah_barang`=jumlah_barang-$jumlah WHERE kode_barang = '$barang'") or die(mysql_error());

         if ($qry1){
          echo '<script>window.location.assign("user.php?user=tambahtransaksi");</script>';
         }else{
         echo '<script>alert("silahkan cek data lagi")</script>';
         }
         }
}
         if (isset($_POST['simpan'])){   
          $id_trans=$auto;
           $tanggal=$_POST['tanggal'];
                  $nama=$_POST['nama'];
                  $keperluan=$_POST['keperluan'];

                  $user=$_SESSION['id'];
          $qry5=mysql_query("INSERT INTO `peminjaman`(`id`, `created_by`, `tanggal_pinjam`, `tanggal_kembali`, `nama_peminjam`, `keperluan`) VALUES ('$id_trans','$user','$tanggal','','$nama','$keperluan')") or die(mysql_error());
          if ($qry5){
            $qry4=mysql_query("UPDATE `detail_pinjam` SET `id_trans`='$id_trans' WHERE id_trans='0'") or die(mysql_error());
           echo '<script>window.location.assign("user.php?user=peminjaman");</script>';
          }else{
          echo '<script>alert("silahkan cek data lagi")</script>';
          }
          }
                 ?>