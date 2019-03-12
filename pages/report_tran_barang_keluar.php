<?php
include "dbcon.php";
require('pdf/fpdf.php');
session_start();
if(isset($_SESSION['pengguna']) && isset($_SESSION['pass'])){


$result=mysqli_query($koneksi,"SELECT * FROM detail_jual ORDER BY id_jual ASC");

//Inisiasi untuk membuat header kolom
$column_id_jual = "";
$column_kode_jual = "";
$column_kode_barang = "";
$column_jumlah_jual = "";



//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
    $id_jual = $row["id_jual"];
    $kode_jual = $row["kode_jual"];
    $kode_barang = $row["kode_barang"];
    $jumlah_jual = $row["jml_jual"];
    
 
    

    $column_id_jual= $column_id_jual.$id_jual."\n";
    $column_kode_jual = $column_kode_jual.$kode_jual."\n";
    $column_kode_barang = $column_kode_barang.$kode_barang."\n";
    $column_jumlah_jual = $column_jumlah_jual.$jumlah_jual."\n";
    
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DETAIL PENJUALAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'NDC PRATAMA WAREHOUSE',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);

$pdf->SetX(30);
$pdf->Cell(40,8,'Id Jual',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(25,8,'Kode Jual',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(25,8,'Kode Barang',1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(50,8,'Jumlah Penjualan',1,0,'C',1);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);


$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(40,6,$column_id_jual,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(25,6,$column_kode_jual,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(25,6,$column_kode_jual,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(50,6,$column_jumlah_jual,1,'C');


$pdf->Output();

}else{

        header('location:\inventory\index.php');
    }
?>