
<?php
	include "dbcon.php";
	$kode_supp=$_GET['kode_supp'];
	$modal=mysqli_query($koneksi,"delete FROM supplier WHERE kode_supp='$kode_supp'");
	header('location:supplier.php');
?>