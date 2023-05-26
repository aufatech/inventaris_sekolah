<?php include("koneksi.php");
$username=$_POST['t_username'];
$name=$_POST['t_nama'];
$password=$_POST['t_password'];
$nohp=$_POST['t_nohp'];
$alamat=$_POST['t_almat'];
$level=$_POST['t_level'];
$qry=mysql_query("INSERT INTO `petugas`(`id`, `nama`, `username`, `password`, `alamat`, `no_telp`, `level`) VALUES (null, '$name', '$username', '$password', '$alamat', '$nohp', '$level')") or die(mysql_error());
if($qry){
  echo '<script>alert("Berhasil Disimpan.");window.location.assign("admin.php?admin=pengguna");</script>';
  }
?>
