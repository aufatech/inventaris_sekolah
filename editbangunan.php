<?php
include"koneksi.php";
?>
<?php
if (isset($_GET['update'])){
$id=$_GET['update'];
$qry=mysql_query("SELECT t.kode_tanah as kt, t.nama_tanah, b.* FROM bangunan b INNER JOIN tanah t on b.`kode _tanah`=t.kode_tanah where kode_bangunan='$id'");
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
  <div class="row">
              <div class="col-sm-6">
              <div class="form-group">
                <label>Kode Bangungan</label>
                <input type="text" name="kode_bangun" disabled class="form-control" value="'.$data['kode_bangunan'].'" required="true"/>
              </div>
            </div>
          <div class="col-sm-6">
          <div class="form-group">
          <label>Tanah</label>
          <select name="k_tanah" class="form-control select2" id="t_level">
      ';
       $akn=mysql_query("select * from tanah");
      while($bi=mysql_fetch_array($akn)){
        if($data['kt']==$bi['kode_tanah']){

          $selected="selected";
        }else{
          $selected="";
        }
        echo '
              <option '.$selected.' value="'.$bi['kode_tanah'].'">'.$bi['kode_tanah'] .' - '.$bi['nama_tanah'].'</option>'; } echo '
          </select>
        </div>
            </div></div>
            <div class="form-group">
              <label>Nama Bangunan</label>
              <input type="text" name="nama" value="'.$data['nama_bangunan'].'" class="form-control" required="true"/>
            </div>
            <div class ="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label>Luas Bangunan</label>
                <input type="number" name="luas" value="'.$data['luas_bangunan'].'" class="form-control" required="true"/>
              </div>
              </div>
              
            <div class="col-sm-6">
            <div class="form-group">
                <label>Jumlah Lantai</label>
                <input type="number" name="lantai" value="'.$data['jumlah_lantai'].'" class="form-control" required="true"/>
              </div>
              </div></div>

              <div class="form-group">
                <label>Tanggal SK</label>
                <input type="text" name="tanggal_sk" id="datepicker" value="'.$data['tgl_sk_dipakai'].'" class="form-control" required="true"/>
              </div>
              <div class ="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Tahun Dibangun</label>
                <input type="number" name="tahun" id="yearpicker" value="'.$data['tahun_dibangun'].'" class="form-control" required="true"/>
              </div>
              </div>
              
            <div class="col-sm-6">
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" value="'.$data['harga'].'" class="form-control" required="true"/>
              </div>
              </div>
              </div>
              <div class="form-group">
                <label>Kepemilikan</label>
                <select name="kepemilikan" class="form-control" id="t_level" required="true">
                <option value="'.$data['kepemilikan'].'">'.$data['kepemilikan'].'</option>
            <option value="milik">Milik</option>
            <option value="tidak milik">Bukan Milik</option>
            </select>
              </div>
              <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="ket" value="'.$data['keterangan'].'"  class="form-control" required="true"/>
            </div>

  <br />
    <button type="submit" class="btn btn-danger" name="edit">Edit</button>
    <button type="submit" class="btn btn-warning"><a href="?user=bangunan">Kembali</a></button>
</form>
</div>';

}
if (isset($_POST['edit'])){
  $kb=$_POST['kode_bangun'];
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
$qry1=mysql_query("UPDATE `bangunan` SET `kode _tanah`='$kt',`nama_bangunan`='$nama',`luas_bangunan`='$luas',`jumlah_lantai`='$lantai',`tahun_dibangun`='$tahun',`harga`='$harga',`kepemilikan`='$milik',`tgl_sk_dipakai`='$ts',`keterangan`='$ket' WHERE kode_bangunan = '$id'") or die(mysql_error());
if ($qry1){
echo '<script>window.location.assign("user.php?user=bangunan");alert("Data berhasil di Update");</script>';
}else{
echo '<script>alert("Data Gagal di Update")</script>';
}
}
?>
