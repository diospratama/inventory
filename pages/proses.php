<?php
include "dbcon.php";
$data=mysqli_query($koneksi,"select * from barang");

$op=isset($_GET['op'])?$_GET['op']:null;

if($op=='kode'){
    echo"<option>Kode Barang</option>";
    while($r=mysqli_fetch_array($data)){
        echo "<option value='$r[kode_barang]'>$r[kode_barang]</option>";
    }
}elseif($op=='barang'){
    echo'<table id="barang" class="table table-hover">
    <thead>
            <tr>
                <Td colspan="5"><a href="?page=barang&act=tambah" class="btn btn-primary">Tambah Barang</a></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Stok</td>
            </tr>
        </thead>';
	while ($b=mysql_fetch_array($data)){
        echo"<tr>
                <td>$b[kode]</td>
                <td>$b[nama]</td>
                <td>$b[hrg_beli]</td>
                <td>$b[hrg_jual]</td>
                <td>$b[stok]</td>
            </tr>";
        }
    echo "</table>";
}elseif($op=='ambildata'){
    $kode=$_GET['kode'];
    $dt=mysqli_query($koneksi,"select * from barang where nama_barang='$kode'");
    $d=mysqli_fetch_array($dt);
    echo $d['kode_barang']."|".$d['stok_awal']."|".$d['harga_beli'];
}
elseif($op=='ambildata2'){
    $supp=$_GET['supp'];
    $dt=mysqli_query($koneksi,"select * from supplier where nama_supp='$supp'");
    $d=mysqli_fetch_array($dt);
    echo $d['kode_supp'];
}elseif($op=='cek'){
    $kd=$_GET['kd'];
    $sql=mysql_query("select * from tblbarang where kode='$kd'");
    $cek=mysql_num_rows($sql);
    echo $cek;
}elseif($op=='update'){
    $kode=$_GET['kode'];
    $nama=htmlspecialchars($_GET['nama']);
    $beli=htmlspecialchars($_GET['beli']);
    $jual=htmlspecialchars($_GET['jual']);
    $stok=htmlspecialchars($_GET['stok']);
    
    $update=mysql_query("update tblbarang set nama='$nama',
                        hrg_beli='$beli',
                        hrg_jual='$jual',
                        stok='$stok'
                        where kode='$kode'");
    if($update){
        echo "Sukses";
    }else{
        echo "ERROR. . .";
    }
}elseif($op=='delete'){
    $kode=$_GET['kode'];
    $del=mysql_query("delete from tblbarang where kode='$kode'");
    if($del){
        echo "sukses";
    }else{
        echo "ERROR";
    }
}elseif($op=='simpan'){
    $kode=$_GET['kode'];
    $nama=htmlspecialchars($_GET['nama']);
    $jual=htmlspecialchars($_GET['jual']);
    $beli=htmlspecialchars($_GET['beli']);
    $stok=htmlspecialchars($_GET['stok']);
    
    $tambah=mysql_query("insert into tblbarang (kode,nama,hrg_beli,hrg_jual,stok)
                        values ('$kode','$nama','$beli','$jual','$stok')");
    if($tambah){
        echo "sukses";
    }else{
        echo "error";
    }
}
?>