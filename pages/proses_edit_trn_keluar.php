
<?php
	include "dbcon.php";
	$jml=$_POST['jml_jual'];
	$kode_barang=$_POST['kode_barang'];
	$id_jual = $_POST['id_jual'];
	$jml_jual = $_POST['jml_jual'];
	$jml_brg=mysqli_query($koneksi,"update barang set stok_awal=stok_awal-'$jml'where kode_barang='$kode_barang'");
	$barang=mysqli_query($koneksi,"UPDATE detail_beli SET jml_jual ='$jml_jual' WHERE id_jual = '$id_jual'");
	header('location:barang_keluar.php');
?>