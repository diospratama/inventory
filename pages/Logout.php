<?php 
session_start();
//mebuang semua variabel session
session_unset();



session_destroy();
header('location:../index.php');


 ?>