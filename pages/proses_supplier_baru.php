<?php
	include "dbcon.php";
	$ko_sup=$_POST['ko_sup'];
	$nma_sup=$_POST['nma_sup'];
	$almt_sup=$_POST['almt_sup'];
	$sql="insert into supplier values('$ko_sup','$nma_sup','$almt_sup')";
	mysqli_query($koneksi,$sql);
	header('location:supplier.php');
?>