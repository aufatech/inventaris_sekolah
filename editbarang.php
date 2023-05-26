<?php
include"koneksi.php";
?>
<?php
if (isset($_GET['update'])){
$id=$_GET['update'];
$qry=mysql_query("SELECT r.kode_ruang as kr, r.nama_ruang, b.* FROM barang b INNER JOIN ruang r on b.kode_ruang=r.kode_ruang where kode_barang='$id'");
$data=mysql_fetch_assoc($qry);
echo'
<div class="card animated bounce">
  <div class="card-header">
    <h5 class="card-title">Ubah Data Pengguna</h5
    </div>
  </div>
  <div class="card-body">
  <div class="table-responsive">
  <form method="post" enctype="multipart/form-data">
  <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" name="kode_barang" value="'.$data['kode_barang'].'" disabled class="form-control"  required="true"/>
                </div>
              </div>
            <div class="col-sm-6">
            <div class="form-group">
          <label>Ruang</label>
          <select name="k_ruang" class="form-control select2" id="t_level">
      ';
       $akn=mysql_query("select * from ruang");
      while($bi=mysql_fetch_array($akn)){
        if($data['kr']==$bi['kode_ruang']){

          $selected="selected";
        }else{
          $selected="";
        }
        echo '
              <option '.$selected.' value="'.$bi['kode_ruang'].'">'.$bi['kode_ruang'] .' - '.$bi['nama_ruang'].'</option>'; } echo '
          </select>
        </div>
              </div></div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama" value="'.$data['nama_barang'].'" class="form-control" required="true"/>
              </div>
              
              <div class="row">
              <div class="col-sm-4">
              <div class="form-group">
                  <label>Tahun Pembelian</label>
                  <input type="text" name="tgl_pem" id="yearpicker" value="'.$data['tahun'].'" class="form-control" required="true"/>
                </div></div>
              <div class="col-sm-4">
              <div class="form-group">
                  <label>Jumlah Barang</label>
                  <input type="number" name="jumlah" value="'.$data['jumlah_barang'].'" class="form-control" required="true" max="9999"/>
                </div></div>
                <div class="col-sm-4">
              <div class="form-group">
                  <label>Harga Satuan</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                      Rp.
                      </span>
                    </div>
                    <input type="text" name="harga" value="'.$data['harga_satuan'].'" class="form-control float-right" >
                  </div>
                </div></div></div>
                <div class="form-group">
                  <label>Type Barang</label>
                  <select name="jb" class="form-control select2" id="t_level">
      ';
       $jb=mysql_query("select * from jenis_barang");
      while($bi=mysql_fetch_array($jb)){
        if($data['type']==$bi['id']){
          $selected="selected";
        }else{
          $selected="";
        }
        echo '
              <option '.$selected.' value="'.$bi['id'].'">'.$bi['kodefikasi'] .' - '.$bi['jenis_barang'].'</option>'; } echo '
          </select>
                </div>
                
                <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" value="'.$data['keterangan'].'" class="form-control" required="true"/>
              </div>
              <div class="form-group">
              <label for="exampleInputFile">Gambar</label>
              <img src="img/'.$data['gambar'].'" width="50" class="img-responsive">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="f_gambar" value="'.$data['gambar'].'">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
            </div>
            </div>
  <br />
    <button type="submit" class="btn btn-danger" name="edit">Edit</button>
    <button type="submit" class="btn btn-warning"><a href="?user=barang">Kembali</a></button>
</form>
</div>';

}
if (isset($_POST['edit'])){
  $kr=$_POST['k_ruang'];
  $nama_barang=$_POST['nama'];
  $jumlah=$_POST['jumlah'];
  $tgl=$_POST['tgl_pem'];
  $harga=$_POST['harga'];
  $type=$_POST['jb'];
  $ket=$_POST['ket'];
  $user=$_SESSION['id'];
  $gambar=$_FILES['f_gambar']['name'];
  $move=move_uploaded_file($_FILES['f_gambar']['tmp_name'],"img/".$gambar);
if ($move){
  $data = mysql_query("SELECT gambar FROM barang WHERE kode_barang='$id'");
$dataImage = mysql_fetch_assoc($data);
$oldImage = $dataImage['gambar'];
$link = "img/" . $oldImage;
unlink($link);
  mysql_query("UPDATE `barang` SET `kode_ruang`='$kr',`nama_barang`='$nama_barang',`tahun`='$tgl',`jumlah_barang`='$jumlah',`type`='$type',`harga_satuan`='$harga',`keterangan`='$ket',`gambar`='$gambar' where kode_barang='$id'") or die(mysql_error());
echo '<script>alert("Data berhasil di Update");window.history.go(-2);</script>';
}else{
  mysql_query("UPDATE `barang` SET `kode_ruang`='$kr',`nama_barang`='$nama_barang',`tahun`='$tgl',`jumlah_barang`='$jumlah',`type`='$type',`harga_satuan`='$harga',`keterangan`='$ket' where kode_barang='$id'") or die(mysql_error());
echo '<script>alert("Data berhasil di Ubah");window.history.go(-2);</script>';
}

}
?>
