<?php 
	include "dbcon.php";
	$kode_barang=$_POST['kode_barang'];
	$nama_barang=$_POST['nama_barang'];
	$satuan=$_POST['satuan'];
	$harga_jual=$_POST['harga_jual'];
	$harga_beli=$_POST['harga_beli'];
	$sql="insert into barang values('$kode_barang','$nama_barang','$satuan','$harga_beli','$harga_jual','0')";
	mysqli_query($koneksi,$sql);
	header('location:master_barang.php');

 ?>