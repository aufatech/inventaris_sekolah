<?php
include "koneksi.php";
?>
<?php
if (isset($_GET['back'])){
$id=$_GET['back'];
$qry=mysql_query("update from detail_pinjam where id ='$id'");
if ($qry) {
echo '<script>alert("Berhasil Hapus Data");
window.location.assign("user.php?user=tambahtransaksi");</script>';
}else{
echo '<script>alert("Data gagal dihapus")</script>';
}
}
?>
