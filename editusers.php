<?php
include"koneksi.php";
?>
<?php
if (isset($_GET['update'])){
$id=$_GET['update'];
$qry=mysql_query("select * from petugas where id='$id'");
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
    <label>ID User</label>
    <input type="text" name="t_username" class="form-control"  required="true" value="'.$data['id'].'" disabled/>
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="t_username" class="form-control"  required="true" value="'.$data['username'].'"/>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="t_password"  class="form-control" value="" required="true"/>
  </div>
  <div class="form-group">
    <label>Nama Lengkap</label>
    <input type="text" name="t_nama" value="'.$data['nama'].'"  class="form-control" required="true"/>
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="t_alamat" value="'.$data['alamat'].'"  class="form-control" required="true"/>
  </div>
  <div class="form-group">
    <label>No Hp</label>
    <input type="text" name="t_no" value="'.$data['no_telp'].'"  class="form-control" required="true"/>
  </div>
  <div class="form-group">
    <label>Level</label>
    <select name="t_level" class="form-control" id="t_level">
 <option value="'.$data['level'].'">'.$data['level'].'</option>
 <option value="admin">Admin</option>
 <option value="petugas">Petugas</option>
 </select>
  </div>
<br />
    <button type="submit" class="btn btn-danger" name="edit">Edit</button>
    <button type="submit" class="btn btn-warning"><a href="?admin=pengguna">Kembali</a></button>
</form>
</div>';

}
if (isset($_POST['edit'])){
$usr=$_POST['t_username'];
$pw=$_POST['t_password'];
$nm=$_POST['t_nama'];
$almt=$_POST['t_alamat'];
$nohp=$_POST['t_no'];
$lvl=$_POST['t_level'];
$qry1=mysql_query("update petugas set username='$usr', password='$pw', nama='$nm',alamat='$almt',no_telp='$nohp', level='$lvl' where id='$id'") or die(mysql_error());
if ($qry1){
echo '<script>window.location.assign("admin.php?admin=pengguna");alert("Data berhasil di Update");</script>';
}else{
echo '<script>alert("Data Gagal di Update")</script>';
}
}
?>
