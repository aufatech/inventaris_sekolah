<?php
function kodepe(){

	$query = "SELECT max(id) as maxKode FROM peminjaman";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	$kodep = $data['maxKode'];
	$noUrut = (int) substr($kodep, 5, 5);
	$noUrut++;
	$char = "P";
	$kodep = $char . sprintf("%06s", $noUrut);
return $kodep;
}
function kodetanah(){
	$query = "SELECT max(kode_tanah) as maxKode FROM tanah";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	$kodep = $data['maxKode'];
	$noUrut = (int) substr($kodep, 3, 3);
	$noUrut++;
	$kodep =  sprintf("%04s", $noUrut);
return $kodep;
}
function kodebangun(){
	$query = "SELECT max(kode_bangunan) as maxKode FROM bangunan";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	$kodep = $data['maxKode'];
	$noUrut = (int) substr($kodep, 2, 2);
	$noUrut++;
	// $char = "KB";
	$kodep = sprintf("%04s", $noUrut);
return $kodep;
}
function koderuang(){
	$query = "SELECT max(kode_ruang) as maxKode FROM ruang";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	$kodep = $data['maxKode'];
	$noUrut = (int) substr($kodep, 2, 3);
	$noUrut++;
	$char = "KR";
	$kodep = $char . sprintf("%03s", $noUrut);
return $kodep;
}
function kodebarang(){
	$query = "SELECT max(kode_barang) as maxKode FROM barang";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	$kodep = $data['maxKode'];
	$noUrut = (int) substr($kodep, 2, 2);
	$noUrut++;
	$kodep = sprintf("%04s", $noUrut);
return $kodep;
}
?>
