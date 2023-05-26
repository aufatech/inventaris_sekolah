<?php
function kodeauto($table,$initial){
$struktur = mysql_query("SELECT 'id_user' FROM ".$table);
$field = mysql_field_name($struktur,0);
$panjang = mysql_field_len($struktur,0);
$qry=mysql_query("SELECT MAX(".$field.") FROM ".$table);
$row=mysql_fetch_array($qry);
if($row[0]==""){
	$angka=0;
}else{
	$angka=substr($row[0],strlen($initial));

	}
	$angka++;
	$angka=strval($angka);
	$tmp="";
	for($i=1; $i<=($panjang-strlen($initial)-strlen($angka));$i++){
		$tmp=$tmp."0";
	}
return $initial.$tmp.$angka;
}
?>
