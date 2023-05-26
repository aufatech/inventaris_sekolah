<?php
include "koneksi.php";
// include "kode.php";
include("fungsi.php");
$auto=kodebarang();
?>

<div class="col-12 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Data Barang</h3>
              <div class="card-tools">
              <button class='btn btn-sm btn-flat btn-success animated swing' data-toggle='modal' data-target='#tambahbarang'><i class='fa fa-check'></i> Tambah Barang</button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body ">

              <form method="post">
                <label>Klasifikasi Barang</label>
              <div class="row">
              <div class="col-sm-4">
              <div class='form-group'>
                  <select name="ruang" class="form-control select2" id="t_level">
                    <option value="">Pilih Bedasarkan Ruang</option>
                    <?php
                    $jb=mysql_query("select * from ruang");
                    while($b=mysql_fetch_array($jb)){
                      ?>
                      <option value="<?php echo $b['kode_ruang']; ?>"> <?php echo $b['nama_ruang'] ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
<div class='form-group'>
                  <select name="barang" class="form-control select2" id="t_level">
                    <option value="">Pilih Bedasarkan Barang</option>
                    <?php
                    $jb=mysql_query("select nama_barang from barang GROUP by nama_barang order by nama_barang asc");
                    while($b=mysql_fetch_array($jb)){
                      ?>
                      <option value="<?php echo $b['nama_barang']; ?>"> <?php echo $b['nama_barang'] ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
        <input type="submit" class="btn btn-info" value="Pilih" name="pilih">
    </div>

              </div>
    </form>
              <table class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Kodefikasi Barang</th>
                  <th>Jumlah Barang</th>
                  <!-- <th width="30px">Type Barang</th> -->
                  <th>Harga Satuan</th>
                  <th>Tahun</th>
                  <th>Ruang</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
           if (isset($_POST['pilih'])) {
            $barang=$_POST['barang'];
            $ruang=$_POST['ruang'];
            $total=mysql_query("SELECT sum(b.jumlah_barang) as total FROM barang b INNER JOIN ruang r on b.kode_ruang=r.kode_ruang INNER JOIN jenis_barang j on j.kodefikasi=b.type WHERE r.kode_ruang like '%$ruang%' and b.nama_barang like '%$barang%'ORDER BY b.nama_barang ASC")or die(mysql_error());
            $dat=mysql_fetch_assoc($total);
            $qry=mysql_query("SELECT r.nama_ruang, j.kodefikasi, b.* FROM barang b INNER JOIN ruang r on b.kode_ruang=r.kode_ruang INNER JOIN jenis_barang j on j.kodefikasi=b.type WHERE r.kode_ruang like '%$ruang%' and b.nama_barang like '%$barang%'ORDER BY b.nama_barang ASC")or die(mysql_error());

        }else {
            $qry=mysql_query("SELECT r.nama_ruang, j.kodefikasi, b.* FROM barang b INNER JOIN ruang r on b.kode_ruang=r.kode_ruang INNER JOIN jenis_barang j on j.kodefikasi=b.type")or die(mysql_error());

        }
        
$cek = mysql_num_rows($qry);
        
              if($cek==0){
echo "<tr>
                  <td colspan='9'>Data Tidak Ada </td> </tr>";
}else{

    			  $no=1;
    			  while($data=mysql_fetch_array($qry)){
              
    			  ?>


                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $data[4] ?></td>
                  <td><?php echo "0".$data[1].".".$data[2] ?></td>
                  <td><?php echo $data[6] ?></td>
                  <td><?php echo $data[8] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <!-- <td><?php echo $data[6] ?></td> -->
                  <td><?php echo $data[0] ?></td>
                  <td><?php echo $data[8] ?></td>
                  <td>
                  <a href="?user=lihatd&&lihat=<?php echo $data[2] ?>" class="btn btn-info btn-sm">Lihat Detail</a>
                  <a href="?user=editbarang&&update=<?php echo $data[2] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="?user=hapusbarang&&delete=<?php echo $data[2] ?>" onclick="return confirm('Apa Anda Yakin Mau dihapus??')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
                </tr>
                <?php
        }

        }
        ?>
<tfoot align="right">
    <tr><th>Total</th><th><?php echo $dat['total']; ?></th><th></th><th></th><th></th><th></th></tr>
  </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      <div class="modal fade" id="tambahbarang">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header bg-info">
              <h4 class="modal-title">Tambah Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method='post' enctype='multipart/form-data'>
              <div class="row">
              <div class="col-sm-6">
                <div class='form-group'>
                  <label>Kode Barang</label>
                  <input type='text' name='kode_barang' disabled='true' value='<?= $auto; ?>' class='form-control'  required='true'/>
                </div>
              </div>
            <div class="col-sm-6">
            <div class='form-group'>
                  <label>Ruang</label>
                  <select name="k_ruang" class="form-control select2" id="t_barang">
                    <option value="">----Pilih Ruang----</option>
                    <?php
    								$bng=mysql_query("select * from ruang");
    								while($b=mysql_fetch_array($bng)){
    									?>
                      <option value="<?php echo $b['kode_ruang']; ?>"><?php echo $b['kode_ruang']; ?> - <?php echo $b['nama_ruang'] ?></option>
    									<?php
    								}
    								?>
                  </select>
                </div>
              </div></div>
              <div class='form-group'>
                <label>Nama Barang</label>
                <input type='text' name='nama'  class='form-control' required='true'/>
              </div>
              
              <div class="row">
              <div class="col-sm-4">
              <div class='form-group'>
                  <label>Tahun Pembelian</label>
                  <input type='text' name='tgl_pem' id="yearpicker" class='form-control' required='true'/>
                </div></div>
              <div class="col-sm-4">
              <div class='form-group'>
                  <label>Jumlah Barang</label>
                  <input type='number' name='jumlah'  class='form-control' required='true' max='9999'/>
                </div></div>
                <div class="col-sm-4">
              <div class='form-group'>
                  <label>Harga Satuan</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                      Rp.
                      </span>
                    </div>
                    <input type="text" name="harga" class="form-control float-right" >
                  </div>
                </div></div></div>
                <div class='form-group'>
                  <label>Jenis Barang</label>
                  <select name="jp" class="form-control select2" id="t_level">
                    <option value="">----Pilih Jenis Barang----</option>
                    <?php
                    $jb=mysql_query("select * from jenis_barang");
                    while($b=mysql_fetch_array($jb)){
                      ?>
                      <option value="<?php echo $b['kodefikasi']; ?>"><?php echo "0".$b['kodefikasi']; ?> - <?php echo $b['jenis_barang'] ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                
                <div class='form-group'>
                <label>Keterangan</label>
                <input type='text' name='ket'  class='form-control' required='true'/>
              </div>
              <div class="form-group">
                    <label for="customFile">Upload Gambar</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="file">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="simpan">Tambah</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      
      <?php 
      if (isset($_POST['simpan'])){
        $kr=$_POST['k_ruang'];
        $kb=$auto;
        $nama_barang=$_POST['nama'];
        $jumlah=$_POST['jumlah'];
        $thn=$_POST['tgl_pem'];
        $harga=$_POST['harga'];
        $type=$_POST['jp'];
        $ket=$_POST['ket'];
        $user=$_SESSION['id'];

      $ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$file_tmp = $_FILES['file']['tmp_name'];	
      if($nama==""){
        $query = mysql_query("INSERT INTO `barang`(`kode_barang`, `kode_ruang`, `nama_barang`, `tahun`, `jumlah_barang`, `type`, `harga_satuan`, `keterangan`, `created_by`, `gambar`) VALUES ('$kb','$kr','$nama_barang','$thn','$jumlah','$type','$harga','$ket','$user','');") or die(mysql_error());
          if($query){
            echo '<script>alert("Berhasil Disimpan.");window.location.assign("user.php?user=barang");</script>';
          }else{
            echo '<script>alert("Gagal Upload.");</script>';
          }
      }else{
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					move_uploaded_file($file_tmp, 'img/'.$nama);
					$query = mysql_query("INSERT INTO `barang`(`kode_barang`, `kode_ruang`, `nama_barang`, `tahun`, `jumlah_barang`, `type`, `harga_satuan`, `keterangan`, `created_by`, `gambar`) VALUES ('$kb','$kr','$nama_barang','$thn','$jumlah','$type','$harga','$ket','$user','$nama');") or die(mysql_error());
					if($query){
						echo '<script>window.location.assign("user.php?user=barang");alert("Berhasil Disimpan.");</script>';
					}else{
						echo '<script>alert("Gagal Upload.");</script>';
					}
			}else{
				echo '<script>alert("Ekstensi tidak diperbolehkan.");</script>';
			}
      }
        }
      ?>

      
