<?php
include "koneksi.php";

if (isset($_GET['delete'])){
$id=$_GET['delete'];
$jml=$_GET['jumlah'];
$barang=$_GET['barang'];
$qry=mysql_query("delete from detail_pinjam where id ='$id'");
if ($qry) {
	$qry1=mysql_query("UPDATE `barang` SET `jumlah_barang`=jumlah_barang+$jml WHERE kode_barang = '$barang'");
echo '<script>alert("Berhasil Hapus Data");
window.history.go(-1);</script>';
}else{
echo '<script>alert("Data gagal dihapus")</script>';
}
}
?>
