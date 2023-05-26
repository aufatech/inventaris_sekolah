<?php
include "koneksi.php";
?>
<?php
if (isset($_GET['delete'])){
$id=$_GET['delete'];
$qry=mysql_query("delete from bangunan where kode_bangunan ='$id'");
if ($qry) {
echo '<script>alert("Berhasil Hapus Data");
window.location.assign("user.php?user=bangunan");</script>';
}else{
echo '<script>alert("Data gagal dihapus")</script>';
}
}
?>
