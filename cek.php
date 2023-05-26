<?php
session_start();
include("koneksi.php");
$username=$_POST['f_username'];
$password=$_POST['f_password'];
$qry=mysql_query("SELECT * FROM petugas WHERE username = '$username' AND password = md5('$password')") or die(mysql_error());
$cek=mysql_num_rows($qry);
$row=mysql_fetch_assoc($qry);
if($row['level'] == 'admin'){
	$_SESSION['username'] = $username;
	$_SESSION['admin']=$username;
	header("Location:admin.php?admin=beranda");
	// echo "masuk admin";
				}

				else if($row['level'] == 'petugas'){
	$_SESSION['username'] = $username;
	$_SESSION['petugas']=$username;
	$_SESSION['id']=$row['id'];
	header("Location:user.php?user=beranda");
	// print_r($_SESSION);

				}else{
					echo "<script>alert('Pengguna tidak terdaftar');history.back(self);</script>";
		}
?>
