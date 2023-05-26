<?php
include "koneksi.php";
?>
<?php
if (isset($_GET['delete'])){
$id=$_GET['delete'];
// AMBIL NAMA FILE FOTO SEBELUMNYA
$data = mysql_query("SELECT gambar FROM barang WHERE kode_barang='$id'");
$dataImage = mysql_fetch_assoc($data);
$oldImage = $dataImage['gambar'];
// DELETE GAMBAR LAMA
$link = "img/" . $oldImage;
unlink($link);

$qry=mysql_query("delete from barang where kode_barang ='$id'");
if ($qry) {
echo '<script>alert("Berhasil Hapus Data");
window.location.assign("user.php?user=barang");</script>';
}else{
echo '<script>alert("Data gagal dihapus")</script>';
}
}
?>
