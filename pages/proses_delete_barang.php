
<?php
	include "dbcon.php";
	$kode_barang=$_GET['kode_barang'];
	$modal=mysqli_query($koneksi,"delete FROM barang WHERE kode_barang='$kode_barang'");
	header('location:master_barang.php');
?>