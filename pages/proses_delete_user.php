
<?php
	include "dbcon.php";
	$username=$_GET['username'];
	$modal=mysqli_query($koneksi,"delete FROM admin WHERE username='$username'");
	header('location:tambah.php');
?>