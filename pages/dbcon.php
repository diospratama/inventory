
<?php
	$host="localhost";
	$user="root";
	$pass="";
	$database="inventory";
	$koneksi=new mysqli($host,$user,$pass,$database);
	if (mysqli_connect_errno()) {
	  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
	}


/*function host(){
	$h = "http://".$_SERVER['HTTP_HOST']."/thesis/";
	return $h;
}

function hRoot(){
	$url = $_SERVER['DOCUMENT_ROOT']."/thesis/";
	return $url;
}

//parse string
function gstr(){
    $qstr = $_SERVER['QUERY_STRING'];
    parse_str($qstr,$dstr);
    return $dstr;
}*/

?>
