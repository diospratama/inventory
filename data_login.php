<?php  
	include "dbcon.php";
	$user=$_POST['username'];
	$password=$_POST['password'];

	$sql="select * from admin where username='$user' and password='$password'";
	//echo $sql;
	$query=mysqli_query($koneksi,$sql);
	$data=mysqli_fetch_array($query);


/*if($data==false){

	trigger_error('error SQL: '.$sql.'Error'.$mysqli_error,E_USER_ERROR);
}*/
if($user==$data['username'] && $password==$data['password']){
	//if($user=="dios" && $password=="since007"){
		session_start();
		$_SESSION["username"]=$user;
		$_SESSION["password"]=$password;
		//echo "<script> window.location='admin.php';</script>";
		
		header('location:pages/admin.html');

	}

	else{
		
		echo "Username dan Password anda tidak terdaftar";
	}


?>