<?php
  include "dbcon.php";
  $kode_barang=$_POST['kode_barang'];
  $nama=$_POST['nama_barang'];
  $satuan = $_POST['satuan_barang'];
  $harga_beli = $_POST['harga_beli'];
  $harga_jual = $_POST['harga_jual'];
  $stok = $_POST['stok_awal'];
  $barang=mysqli_query($koneksi,"UPDATE barang SET nama_barang = '$nama',satuan = '$satuan',harga_beli ='$harga_beli', harga_jual='$harga_jual', stok_awal='$stok' WHERE kode_barang = '$kode_barang");
  header('location:master_barang.php');
?>