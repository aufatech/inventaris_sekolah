<?php
include"koneksi.php";
?>
<?php
if (isset($_GET['update'])){
$id=$_GET['update'];
$qry=mysql_query("select * from tanah where kode_tanah='$id'");
$data=mysql_fetch_assoc($qry);
echo'
<div class="card animated bounce">
  <div class="card-header">
    <h5 class="card-title">Ubah Data Tanah</h5
    </div>
  </div>
  <div class="card-body">
  <div class="table-responsive">
  <form method="post">
  <div class="row">

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kode Tanah</label>
                  <input type="text" name="kode_tanah" class="form-control" value="01.01.11.04.02.'.$data['kode_tanah'].'" required="true" disabled/>
                </div>
              </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label>No Sertifikat</label>
                  <input type="text" name="no_sert" value="'.$data['no_sertifikat'].'" autofocus="true" class="form-control" required="true"/>
                </div>
              </div></div>
              <div class="form-group">
                <label>Nama Tanah</label>
                <input type="text" name="nama" value="'.$data['nama_tanah'].'"  class="form-control" required="true"/>
              </div>
              <div class="form-group">
                  <label>Luas Tanah</label>
                  <input type="number" name="luas"  value="'.$data['luas_tanah'].'"  class="form-control" required="true"/>
                </div>
                <div class="form-group">
                  <label>Tahun Pengadaan</label>
                  <input type="text" name="t_sert" id="yearpicker"  value="'.$data['tahun'].'"  class="form-control" required="true"/>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" name="harga" value="'.$data['harga'].'"  class="form-control" required="true"/>
                </div>
                <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" value="'.$data['keterangan'].'"  class="form-control" required="true"/>
              </div>
  <br />
    <button type="submit" class="btn btn-danger" name="edit">Edit</button>
    <button type="submit" class="btn btn-warning"><a href="?user=tanah">Kembali</a></button>
</form>
</div>';

}
if (isset($_POST['edit'])){
  $ns=$_POST['no_sert'];
  $nama=$_POST['nama'];
$luas=$_POST['luas'];
$ts=$_POST['t_sert'];
$harga=$_POST['harga'];
$ket=$_POST['ket'];
$user=$_SESSION['id'];
$qry1=mysql_query("UPDATE `tanah` SET `no_sertifikat`='$ns',`nama_tanah`='$nama',`luas_tanah`='$luas',`tahun`='$ts',`harga`='$harga',`keterangan`='$ket' WHERE kode_tanah = '$id'") or die(mysql_error());
if ($qry1){
echo '<script>window.location.assign("user.php?user=tanah");alert("Data berhasil di Update");</script>';
}else{
echo '<script>alert("Data Gagal di Update")</script>';
}
}
?>
