<?php
include"koneksi.php";
?>
<?php
if (isset($_GET['update'])){
$id=$_GET['update'];
$qry=mysql_query("SELECT b.kode_bangunan as kd, b.nama_bangunan, r.* FROM ruang r INNER JOIN bangunan b on r.kode_bangunan=b.kode_bangunan where kode_ruang='$id'");
$data=mysql_fetch_assoc($qry);
echo'
<div class="card animated bounce">
  <div class="card-header">
    <h5 class="card-title">Ubah Data Pengguna</h5
    </div>
  </div>
  <div class="card-body">
  <div class="table-responsive">
  <form method="post">
                <div class="form-group">
                  <label>Kode Ruang</label>
                  <input type="text" name="kode_ruang" value="'.$data['kode_ruang'].'" disabled class="form-control"  required="true"/>
                </div>
            <div class="form-group">
          <label>Bangunan</label>
          <select name="k_bangun" class="form-control select2" id="t_level">
      ';
       $akn=mysql_query("select * from bangunan");
      while($bi=mysql_fetch_array($akn)){
        if($data['kd']==$bi['kode_bangunan']){
          $selected="selected";
          }else{
          $selected="";
        }
        echo '
              <option '.$selected.' value="'.$bi['kode_bangunan'].'">'.$bi['kode_bangunan'] .' - '.$bi['nama_bangunan'].'</option>'; } echo '</select>
        </div>
              <div class="form-group">
                <label>Nama Ruang</label>
                <input type="text" name="nama" value="'.$data['nama_ruang'].'" class="form-control" required="true"/>
              </div>
              <div class="row">
              <div class="col-sm-6">
              <div class="form-group">
                  <label>Luas Ruang</label>
                  <input type="number" name="luas" value="'.$data['luas'].'" class="form-control" required="true"/>
                </div>
                </div>
                
              <div class="col-sm-6">
              <div class="form-group">
                  <label>Lantai Ke</label>
                  <input type="number" name="lantai" value="'.$data['lantai_ke'].'" class="form-control" required="true"/>
                </div>
                </div>
                </div>
                <div class="form-group">
                  <label>Jenis Ruang</label>
                  <select name="jenis" class="form-control select2" id="t_level">
                    <option value="'.$data['jenis_ruang'].'">'.$data['jenis_ruang'].'</option>
                    <option value="RUANG TEORI/KELAS">RUANG TEORI/KELAS</option>
                    <option value="LABORATORIUM IPA">LABORATORIUM IPA</option>
                    <option value="LABORATORIUM FISIKA">LABORATORIUM FISIKA</option>
                    <option value="LABORATORIUM BIOLOGI">LABORATORIUM BIOLOGI</option>
                    <option value="LABORATORIUM BAHASA">LABORATORIUM BAHASA</option>
                    <option value="LABORATORIUM IPS">LABORATORIUM IPS</option>
                    <option value="LABORATORIUM KOMPUTER">LABORATORIUM KOMPUTER</option>
                    <option value="LABORATORIUM MULTIMEDIA">LABORATORIUM MULTIMEDIA</option>
                    <option value="RUANG PERPUSTAKAAN">RUANG PERPUSTAKAAN</option>
                    <option value="RUANG PERPUSTAKAAN MULTIMEDIA">RUANG PERPUSTAKAAN MULTIMEDIA</option>
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
                    <option value="LAINNYA">LAINNYA</option>
                  </select>
                </div>
                <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" value="'.$data['keterangan'].'" class="form-control" required="true"/>
              </div>
            </div>

  <br />
    <button type="submit" class="btn btn-danger" name="edit">Edit</button>
    <button type="submit" class="btn btn-warning"><a href="?user=ruang">Kembali</a></button>
</form>
</div>';

}
if (isset($_POST['edit'])){
  $kb=$_POST['k_bangun'];
  $nama=$_POST['nama'];
  $luas=$_POST['luas'];
  $jenis=$_POST['jenis'];
  $lantai=$_POST['lantai'];
  $ket=$_POST['ket'];
  $user=$_SESSION['id'];
$qry1=mysql_query("UPDATE `ruang` SET `kode_bangunan`='$kb',`nama_ruang`='$nama',`lantai_ke`='$lantai',`luas`='$luas',`jenis_ruang`='$jenis',`keterangan`='$ket' WHERE kode_ruang = '$id'") or die(mysql_error());
if ($qry1){
echo '<script>window.location.assign("user.php?user=ruang");alert("Data berhasil di Update");</script>';
}else{
echo '<script>alert("Data Gagal di Update")</script>';
}
}
?>
