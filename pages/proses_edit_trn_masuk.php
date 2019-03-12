
<?php
	include "dbcon.php";
	$kode_barang=$_POST['kode_barang'];
	$jml=$_POST['jml_beli'];
	$id_beli = $_POST['id_beli'];
	$jml_beli = $_POST['jml_beli'];
	$jml_brg=mysqli_query($koneksi,"update barang set stok_awal=stok_awal+'$jml' where kode_barang='$kode_barang'");
	$barang=mysqli_query($koneksi,"UPDATE detail_beli SET jml_beli ='$jml_beli' WHERE id_beli = '$id_beli'");
	header('location:barang_masuk.php');
?>