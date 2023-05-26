<?php
include "koneksi.php";
?>
<?php
if (isset($_GET['delete'])){
$id=$_GET['delete'];
$qry=mysql_query("delete from tanah where kode_tanah ='$id'");
if ($qry) {
echo '<script>alert("Berhasil Hapus Data");
window.location.assign("user.php?user=tanah");</script>';
}else{
echo '<script>alert("Data gagal dihapus")</script>';
}
}
?>
