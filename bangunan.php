<?php
include "koneksi.php";
// include "kode.php";
include("fungsi.php");
$auto=kodebangun();

?>

<div class="col-12 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Data Bangunan</h3>
              <div class="card-tools">
              <button class='btn btn-sm btn-flat btn-success animated swing' data-toggle='modal' data-target='#tambahbangunan'><i class='fa fa-check'></i> Tambah Bangunan</button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th>No</th>
                  <th>Kode Bangunan</th>
                  <th>Nama Bangunan</th>
                  <!-- <th>Nama Tanah</th> -->
                  <th>Luas Bangunan</th>
                  <th>Jumlah Lantai</th>
                  <th>Tahun Dibangun</th>
                  <th>Harga</th>
                  <th>Kepemilikan</th>
                  <th>Tanggal SK</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
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
                  <td><?php echo $no++ ?></td>
                  <td><?php echo "03.11.01.10.01." . $data[1] ?></td>
                  <td><?php echo $data[3] ?></td>
                  <!-- <td><?php echo $data[0] ?></td> -->
                  <td><?php echo $data[4] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <td><?php echo $data[6] ?></td>
                  <td><?php echo $data[7] ?></td>
                  <td><?php echo $data[8] ?></td>
                  <td><?php echo $data[9] ?></td>
                  <td><?php echo $data[10] ?></td>
                  <td><a href="?user=editbangunan&&update=<?php echo $data[1] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="?user=hapusbangunan&&delete=<?php echo $data[1] ?>" onclick="return confirm('Apa Anda Yakin Mau dihapus??')" class="btn btn-danger btn-sm">Hapus</a>
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

      <div class="modal fade" id="tambahbangunan">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header bg-info">
              <h4 class="modal-title">Tambah Bangunan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method='post'>
                <div class="row">

              <div class="col-sm-6">
                <div class='form-group'>
                  <label>Kode Bangungan</label>
                  <input type='text' name='kode_bangun' class='form-control' value='03.11.01.10.01.<?= $auto; ?>' disabled='true' required='true'/>
                </div>
              </div>
            <div class="col-sm-6">
            <div class='form-group'>
                  <label>Tanah</label>
                  <select name="k_tanah" class="form-control select2" id="t_level">
                    <option value="">----Pilih Tanah----</option>
                    <?php
    								$tnh=mysql_query("select * from tanah");
    								while($b=mysql_fetch_array($tnh)){
    									?>
                      <option value="<?php echo $b['kode_tanah']; ?>"><?php echo $b['kode_tanah']; ?> - <?php echo $b['nama_tanah'] ?></option>
    									<?php
    								}
    								?>
                  </select>
                </div>
              </div></div>
              <div class='form-group'>
                <label>Nama Bangunan</label>
                <input type='text' name='nama'  class='form-control' required='true'/>
              </div>
              <div class ="row">
              <div class="col-sm-6">
              <div class='form-group'>
                  <label>Luas Bangunan (m<sup>2</sup>)</label>
                  <input type='number' name='luas'  class='form-control' required='true'/>
                </div>
                </div>
                
              <div class="col-sm-6">
              <div class='form-group'>
                  <label>Jumlah Lantai</label>
                  <input type='number' name='lantai'  class='form-control' required='true'/>
                </div>
                </div></div>

                <div class='form-group'>
                  <label>Tanggal SK</label>
                  <input type='text' name='tanggal_sk' id="datepicker" class='form-control' required='true'/>
                </div>
                <div class ="row">
              <div class="col-sm-6">
                <div class='form-group'>
                  <label>Tahun Dibangun</label>
                  <input type='text' name='tahun' class='form-control' required='true' id="yearpicker" />
                </div>
                </div>
                
              <div class="col-sm-6">
              <div class='form-group'>
                  <label>Harga</label>
                  <input type='number' name='harga' class='form-control' value='0'/>
                </div>
                </div>
                </div>
                <div class='form-group'>
                  <label>Kepemilikan</label>
                  <select name="kepemilikan" class="form-control" id="t_level" required='true'>
              <option value="milik">Milik</option>
              <option value="bukan milik">Bukan Milik</option>
              </select>
                </div>
                <div class='form-group'>
                <label>Keterangan</label>
                <input type='text' name='ket'  class='form-control' required='true'/>
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
        $kb=$auto;
        $kt=$_POST['k_tanah'];
        $nama=$_POST['nama'];
        $luas=$_POST['luas'];
        $tahun=$_POST['tahun'];
        $harga=$_POST['harga'];
        $ts=$_POST['tanggal_sk'];
        $lantai=$_POST['lantai'];
        $milik=$_POST['kepemilikan'];
        $ket=$_POST['ket'];
        $user=$_SESSION['id'];
        $sql = "INSERT INTO `bangunan`(`kode_bangunan`, `kode _tanah`, `nama_bangunan`, `luas_bangunan`, `jumlah_lantai`, `tahun_dibangun`, `harga`, `kepemilikan`, `tgl_sk_dipakai`, `keterangan`, `created_by`) VALUES ('$kb','$kt','$nama','$luas','$lantai','$tahun','$harga','$milik','$ts','$ket','$user')";
        $qry=mysql_query($sql) or die(mysql_error());
        if($qry){
             echo '<script>alert("Berhasil Disimpan.");window.location.assign("user.php?user=bangunan");</script>';
        }else{
            echo '<script>alert("Data Gagal di Simpan")</script>';
        }
        }
      ?>
