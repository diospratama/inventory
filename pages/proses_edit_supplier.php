<?php 
	include "dbcon.php";
	$kode_supp = $_POST['kode_supp'];
	$nama_supp = $_POST['nama_supp'];
	$alamat_supp = $_POST['alamat_supp'];
	$barang=mysqli_query($koneksi,"UPDATE supplier SET nama_supp = '$nama_supp',alamat_supp = '$alamat_supp' WHERE kode_supp = '$kode_supp'");
	header('location:supplier.php');


 ?>