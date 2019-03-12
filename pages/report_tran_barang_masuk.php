<?php
include "dbcon.php";
require('pdf/fpdf.php');
session_start();
if(isset($_SESSION['pengguna']) && isset($_SESSION['pass'])){


$result=mysqli_query($koneksi,"SELECT * FROM detail_beli ORDER BY id_beli ASC");

//Inisiasi untuk membuat header kolom
$column_id_beli = "";
$column_kode_beli = "";
$column_kode_barang = "";
$column_jumlah_beli = "";



//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
    $id_beli = $row["id_beli"];
    $kode_beli = $row["kode_beli"];
    $kode_barang = $row["kode_barang"];
    $jumlah_beli = $row["jml_beli"];
    
 
    

    $column_id_beli= $column_id_beli.$id_beli."\n";
    $column_kode_beli = $column_kode_beli.$kode_beli."\n";
    $column_kode_barang = $column_kode_barang.$kode_barang."\n";
    $column_jumlah_beli = $column_jumlah_beli.$jumlah_beli."\n";
    
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DETAIL PEMBELIAN',0,0,'C');
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
$pdf->Cell(40,8,'Id Beli',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(25,8,'Kode Beli',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(25,8,'Kode Barang',1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(50,8,'Jumlah Pembelian',1,0,'C',1);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);


$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(40,6,$column_id_beli,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(25,6,$column_kode_beli,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(25,6,$column_kode_barang,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(50,6,$column_jumlah_beli,1,'C');


$pdf->Output();

}else{

        header('location:\inventory\index.php');
    }
?>