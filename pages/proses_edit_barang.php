<?php 
	include "dbcon.php";
	$kode_barang = $_POST['kode_barang'];
	$nama_barang = $_POST['nama_barang'];
	$satuan = $_POST['satuan'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];
	$data=mysqli_query($koneksi,"UPDATE barang SET nama_barang = '$nama_barang',satuan = '$satuan',harga_beli='$harga_beli',harga_jual='$harga_jual' WHERE kode_barang = '$kode_barang'");
	header('location:master_barang.php');


 ?>