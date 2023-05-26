<?php
include "koneksi.php";
// include "kode.php";
include("fungsi.php");
$auto=koderuang();

?>

<div class="col-12 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Data Ruang</h3>
              <div class="card-tools">
              <button class='btn btn-sm btn-flat btn-success animated swing' data-toggle='modal' data-target='#tambahruang'><i class='fa fa-check'></i> Tambah Ruang</button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th width="10px">Kode Ruang</th>
                  <th width="30px">Jenis Ruang</th>
                  <th width="10px">Nama Bangunan</th>
                  <th width="20px">Nama Ruang</th>
                  <th width="30px">Lantai Ke</th>
                  <th width="30px">Luas</th>
                  <th width="10px">Keterangan</th>
                  <th width="10px">Aksi</th>
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
                  <td><a href="?user=editruang&&update=<?php echo $data[1] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="?user=hapusruang&&delete=<?php echo $data[1] ?>" onclick="return confirm('Apa Anda Yakin Mau dihapus??')" class="btn btn-danger btn-sm">Hapus</a>
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

      <div class="modal fade" id="tambahruang">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header bg-info">
              <h4 class="modal-title">Tambah Ruang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method='post'>
            <div class="row">
              <div class="col-sm-6">
                <div class='form-group'>
                  <label>Kode Ruang</label>
                  <input type='text' name='kode_ruang' value='<?= $auto; ?>' disabled='true' class='form-control'  required='true'/>
                </div>
              </div>
            <div class="col-sm-6">
            <div class='form-group'>
                  <label>Bangunan</label>
                  <select name="k_bangun" class="form-control select2" id="t_bangun">
                    <option value="">----Pilih Bangunan----</option>
                    <?php
    								$bng=mysql_query("select * from bangunan");
    								while($b=mysql_fetch_array($bng)){
    									?>
                      <option value="<?php echo $b['kode_bangunan']; ?>"><?php echo $b['kode_bangunan']; ?> - <?php echo $b['nama_bangunan'] ?></option>
    									<?php
    								}
    								?>
                  </select>
                </div>
              </div>
              </div>
              <div class='form-group'>
                <label>Nama Ruang</label>
                <input type='text' name='nama'  class='form-control' required='true'/>
              </div>
              <div class="row">
              <div class="col-sm-6">
              <div class='form-group'>
                  <label>Luas Ruang</label>
                  <input type='number' name='luas'  class='form-control' required='true'/>
                </div>
                </div>
                
              <div class="col-sm-6">
              <div class='form-group'>
                  <label>Lantai Ke</label>
                  <input type='number' name='lantai'  class='form-control' required='true'/>
                </div>
                </div>
                </div>
                <div class='form-group'>
                  <label>Jenis Ruang</label>
                  <select name="jenis" class="form-control select2" id="t_level">
                    <option value="">----Pilih Jenis Ruang----</option>
                    <option value="RUANG TEORI/KELAS">RUANG TEORI/KELAS</option>
                    <option value="LABORATORIUM IPA">LABORATORIUM IPA</option>
                    <option value="LABORATORIUM FISIKA">LABORATORIUM FISIKA</option>
                    <option value="LABORATORIUM BIOLOGI">LABORATORIUM BIOLOGI</option>
                    <option value="LABORATORIUM BAHASA">LABORATORIUM BAHASA</option>
                    <option value="LABORATORIUM IPS">LABORATORIUM IPS</option>
                    <option value="LABORATORIUM KOMPUTER">LABORATORIUM KOMPUTER</option>
                    <option value="LABORATORIUM MULTIMEDIA">LABORATORIUM MULTIMEDIA</option>
                    <option value="RUANG PERPUSTAKAAN">RUANG PERPUSTAKAAN</option>
                    <option value="RUANG KETERAMPILAN">RUANG KETERAMPILAN</option>
                    <option value="RUANG SERBA GUNA/AULA">RUANG SERBA GUNA/AULA</option>
                    <option value="RUANG UKS">RUANG UKS</option>
                    <option value="RUANG PRAKTIK KERJA">RUANG PRAKTIK KERJA</option>
                    <option value="KOPERASI/TOKO">KOPERASI/TOKO</option>
                    <option value="RUANG BP/BK">RUANG BP/BK</option>
                    <option value="RUANG KEPALA SEKOLAH">RUANG KEPALA SEKOLAH</option>
                    <option value="RUANG GURU">RUANG GURU</option>
                    <option value="RUANG TU">RUANG TU</option>
                    <option value="RUANG OSIS">RUANG OSIS</option>
                    <option value="KAMAR MANDI/WC GURU">KAMAR MANDI/WC GURU</option>
                    <option value="KAMAR MANDI/WC SISWA">KAMAR MANDI/WC SISWA</option>
                    <option value="GUDANG">GUDANG</option>
                    <option value="MUSOLA">MUSOLA</option>
                    <option value="RUANG KETERAMPILAN">RUANG KETERAMPILAN</option>
                    <option value="RUANG WAKIL KEPALA SEKOLAH">RUANG WAKIL KEPALA SEKOLAH</option>
                    <option value="RUANG AGAMA">RUANG AGAMA</option>
                    <option value="LAINNYA">LAINNYA</option>
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
        $kr=$auto;
        $kb=$_POST['k_bangun'];
        $nama=$_POST['nama'];
        $luas=$_POST['luas'];
        $jenis=$_POST['jenis'];
        $lantai=$_POST['lantai'];
        $ket=$_POST['ket'];
        $user=$_SESSION['id'];
        $sql = "INSERT INTO `ruang`(`kode_ruang`, `kode_bangunan`, `nama_ruang`, `lantai_ke`, `luas`, `jenis_ruang`, `keterangan`, `created_by`) VALUES ('$kr','$kb','$nama','$lantai','$luas','$jenis','$ket','$user')";
        $qry=mysql_query($sql) or die(mysql_error());
        if($qry){
             echo '<script>alert("Berhasil Disimpan.");window.location.assign("user.php?user=ruang");</script>';
        }else{
            echo '<script>alert("Data Gagal di Simpan")</script>';
        }
        }
      ?>
