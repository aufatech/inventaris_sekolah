<?php
include "koneksi.php";
?>
<?php
if (isset($_GET['delete'])){
$id=$_GET['delete'];
$qry=mysql_query("SELECT * from detail_pinjam where id_trans='$id'")or die(mysql_error());
while($data=mysql_fetch_array($qry)){
$qry1=mysql_query("UPDATE `barang` SET `jumlah_barang`=jumlah_barang+$data[3] WHERE kode_barang = $data[2]");
}
$qry2=mysql_query("delete from detail_pinjam where id_trans ='$id'");
$qry3=mysql_query("delete from peminjaman where id ='$id'");
if ($qry2 && $qry3) {
echo '<script>alert("Berhasil Hapus Data");
window.location.assign("user.php?user=peminjaman");</script>';
}else{
echo '<script>alert("Data gagal dihapus")</script>';
}
}
?>
