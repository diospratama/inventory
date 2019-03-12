<?php  
	include "dbcon.php";
	$user=$_POST['pengguna'];
	$password=$_POST['pass'];

	$sql="select * from admin where username='$user' and password='$password'";
	//echo $sql;
	$query=mysqli_query($koneksi,$sql);
	$data=mysqli_fetch_array($query);


//if($data==false){

//	trigger_error('error SQL: '.$sql.'Error'.$mysqli_error,E_USER_ERROR);
//}
if($user==$data['username'] && $password==$data['password']){
	//if($user=="dios" && $password=="since007"){
		session_start();
		$_SESSION["pengguna"]=$user;
		$_SESSION["pass"]=$password;
		//echo "<script> window.location='admin.php';</script>";
		
		header('location: admin.php');

	}

	else{
		
		echo "<script>alert('Username atau Password salah')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../index.php'>";


	}


?>

