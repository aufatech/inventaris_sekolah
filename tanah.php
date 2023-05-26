<?php
include "koneksi.php";
// include "kode.php";
include("fungsi.php");
$auto=kodetanah();
?>

<div class="col-12 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Data Tanah</h3>
              <div class="card-tools">
              <button class='btn btn-sm btn-flat btn-success animated swing' data-toggle='modal' data-target='#tambahtanah'><i class='fa fa-check'></i> Tambah Tanah</button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th>No</th>
                  <th>Kode Lokasi</th>
                  <th>Kode Tanah</th>
                  <th>No Sertifikat</th>
                  <th>Nama Tanah</th>
                  <th>Luas Tanah</th>
                  <th>Tahun</th>
                  <th>Harga</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
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
                  <td><?php echo $no++ ?></td>
                  <td><?php echo "12.11.21.08.02." . substr(date("yy", strtotime($data[4])), 2) . ".16"?></td>
                  <td><?php echo "01.01.11.04.02.".$data[0] ?></td>
                  <td><?php echo $data[1] ?></td>
                  <td><?php echo $data[2] ?></td>
                  <td><?php echo $data[3] ?></td>
                  <td><?php echo $data[4] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <td><?php echo $data[6] ?></td>
                  <td><a href="?user=edittanah&&update=<?php echo $data[0] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="?user=hapustanah&&delete=<?php echo $data[0] ?>" onclick="return confirm('Apa Anda Yakin Mau dihapus??')" class="btn btn-danger btn-sm">Hapus</a>
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

      <div class="modal fade" id="tambahtanah">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header bg-info">
              <h4 class="modal-title">Tambah Tanah</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method='post'>

                <div class="row">

              <div class="col-sm-6">
                <div class='form-group'>
                  <label>Kode Registrasi</label>
                  <input type='text' name='kode_tanah' value='01.01.11.04.02.<?= $auto; ?>' class='form-control' disabled required='true'/>
                </div>
              </div>
            <div class="col-sm-6">
                <div class='form-group'>
                  <label>No Sertifikat</label>
                  <input type='text' name='no_sert'  class='form-control' required='true' oninvalid="this.setCustomValidity('No Sertifikat tidak boleh kosong')" oninput="setCustomValidity('')"/>
                </div>
              </div></div>
              <div class='form-group'>
                <label>Nama Tanah</label>
                <input type='text' name='nama'  class='form-control' autofocus='true' required='true' oninvalid="this.setCustomValidity('Nama Tanah tidak boleh kosong')" oninput="setCustomValidity('')"/>
              </div>
              <div class='form-group'>
                  <label>Luas Tanah</label>
                  <input type='number' name='luas'  class='form-control' required='true' oninvalid="this.setCustomValidity('Luas Tanah tidak boleh kosong')" oninput="setCustomValidity('')"/>
                </div>
                <div class='form-group'>
                  <label>Tahun Pengadaan</label>
                  <input type='text' name='t_sert' class='form-control' required='true' id='yearpicker' oninvalid="this.setCustomValidity('Tahun Pengadaan tidak boleh kosong')" oninput="setCustomValidity('')"/>
                </div>
                <div class='form-group'>
                  <label>Harga</label>
                  <input type='number' name='harga'  class='form-control' value="0" />
                </div>
                <div class='form-group'>
                <label>Keterangan</label>
                <input type='text' name='ket'  class='form-control'/>
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
        $kt=$auto;
        $ns=$_POST['no_sert'];
        $nama=$_POST['nama'];
$luas=$_POST['luas'];
$ts=$_POST['t_sert'];
$harga=$_POST['harga'];
$ket=$_POST['ket'];
$user=$_SESSION['id'];
$sql = "INSERT INTO `tanah`(`kode_tanah`, `no_sertifikat`, `nama_tanah`, `luas_tanah`, `tahun`, `harga`, `keterangan`, `created_by`) VALUES ('$kt','$ns', '$nama', '$luas', '$ts', '$harga', '$ket', '$user')";
$qry=mysql_query($sql) or die(mysql_error());
if($qry){
  echo '<script>alert("Berhasil Disimpan.");window.location.assign("user.php?user=tanah");</script>';
  }else{
        echo '<script>alert("Data Gagal di Simpan")</script>';
        }
        }
      ?>
