<?php 
	include "dbcon.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$level = $_POST['level'];
	$data=mysqli_query($koneksi,"UPDATE admin SET nama_lengkap = '$nama_lengkap',password = '$password',level='$level' WHERE username = '$username'");
	header('location:tambah.php');


 ?>