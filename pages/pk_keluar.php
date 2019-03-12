<?php
include('dbcon.php'); 
$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='ambilbarang'){
    $data=mysqli_query($koneksi,"select * from barang");
    echo"<option>Nama Barang</option>";
    while($r=mysqli_fetch_array($data)){
        echo "<option value='$r[nama_barang]'>$r[nama_barang]</option>";
    }
}
if($op=='suppbarang'){
    $data=mysqli_query($koneksi,"select * from supplier");
    echo"<option>Supplier</option>";
    while($r=mysqli_fetch_array($data)){
        echo "<option value='$r[nama_supp]'>$r[nama_supp]</option>";
    }
}elseif($op=='ambildata'){
    $kode=$_GET['kode'];
    $dt=mysql_query("select * from tblbarang where kode='$kode'");
    $d=mysql_fetch_array($dt);
    echo $d['nama']."|".$d['hrg_jual']."|".$d['stok'];
}elseif($op=='barang'){
    $brg=mysqli_query($koneksi,"select * from temporari_copy");
    echo "<thead>
            <tr>
                <td>Id Jual</td>
                <td>Kode Jual</td>
                <td>Kode Barang</td>
                <td>Jumlah Jual</td>
                <td>Harga Jual</td>
                <td>Tools</td>
            </tr>
        </thead>";
    //$total=mysqli_fetch_array(mysql_query("select sum(subtotal) as total from tblsementara"));
    while($r=mysqli_fetch_array($brg)){
        echo "<tr>
                <td>$r[id_beli]</td>
                <td>$r[kode_beli]</td>
                <td>$r[kode_brg]</td>
                <td><input type='text' name='jum' value='$r[jml_beli]' class='span2'></td></td>
                <td>$r[harga_beli]</td>
                <td><a href='pk_keluar.php?op=hapus&kode=$r[id_beli]' id='hapus'>Hapus</a></td>
            </tr>";
    }
    
}elseif($op=='tambah1'){
    
    $kode_jual=$_GET['kode_jual'];
    $kode_brg=$_GET['kode'];
    $jumlah=$_GET['jumlah'];
    $harga=$_GET['harga'];
    
    $tambah=mysqli_query($koneksi,"INSERT into temporari_copy (kode_beli,kode_brg,jml_beli,harga_beli)
                        values ('$kode_jual','$kode_brg','$jumlah','$harga')");
    
    if($tambah){
        echo "sukses";
    }else{
        echo "sukses1";
    }
}elseif($op=='hapus'){
    $id_beli=$_GET['kode'];
    $del=mysqli_query($koneksi,"delete from temporari_copy where id_beli='$id_beli'");
    if($del){
        echo "<script>window.location='barang_keluar.php? act=tambah1';</script>";
    }else{
        echo "<script>alert('Hapus Data Berhasil');
            window.location='barang_keluar.php? act=tambah1';</script>";
    }
}elseif($op=='proses'){
    $kode_jual=$_GET['kode_jual'];
    $tanggal=$_GET['tanggal'];
    $username=$_GET['username'];
    //$to=mysql_fetch_array(mysql_query("select sum(subtotal) as total from tblsementara"));
    //$tot=$to['total'];
    $simpan=mysqli_query($koneksi,"insert into h_jual(kode_jual,tgl_jual,username)
                        values ('$kode_jual','$tanggal','$username')");
    if($simpan){
        $query=mysqli_query($koneksi,"select * from temporari_copy");
        while($r=mysqli_fetch_row($query)){
            mysqli_query($koneksi,"insert into detail_jual(kode_jual,kode_barang,jml_jual)
                        values('$r[1]','$r[2]','$r[3]')");
            mysqli_query($koneksi,"update barang set stok_awal=stok_awal-'$r[3]'
                        where kode_barang='$r[2]'");
        }
        //hapus seluruh isi tabel sementara
        mysqli_query($koneksi,"truncate table temporari_copy");
        echo "sukses";
    }

    else{
        echo "ERROR";
    }
}
?>