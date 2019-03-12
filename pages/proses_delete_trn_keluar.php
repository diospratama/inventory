
<?php
	include "dbcon.php";
	$id_beli=$_GET['id_jual'];
	$modal=mysqli_query($koneksi,"delete FROM detail_jual WHERE id_jual='$id_beli'");
	header('location:barang_keluar.php');
?>