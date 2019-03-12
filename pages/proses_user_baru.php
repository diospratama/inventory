<?php
  include "dbcon.php";
  $username=$_POST['username'];
  $password=$_POST['password'];
  $nama_lengkap=$_POST['nama_lengkap'];
  $level=$_POST['level'];
  $sql="insert into admin values('$username','$password','$nama_lengkap','$level')";
  mysqli_query($koneksi,$sql);
  header('location:tambah.php');
?>