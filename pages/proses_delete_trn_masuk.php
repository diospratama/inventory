
<?php
	include "dbcon.php";
	$id_beli=$_GET['id_beli'];
	$modal=mysqli_query($koneksi,"delete FROM detail_beli WHERE id_beli='$id_beli'");
	header('location:barang_masuk.php');
?>