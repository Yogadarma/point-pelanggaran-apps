<?php
include '../config/koneksi.php';
require('../fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->Image('../assets/logo.png',10,10,20);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,10,'SMA NEGERI 1 CONTOH',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,8,'Laporan Poin Pelanggaran Siswa',0,1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,10,'Nama',1);
$pdf->Cell(40,10,'Total Poin',1);
$pdf->Cell(40,10,'Status',1);
$pdf->Ln();

$data = mysqli_query($conn,"
SELECT siswa.nama,
SUM(jenis_pelanggaran.poin) as total
FROM pelanggaran
JOIN siswa ON siswa.id = pelanggaran.siswa_id
JOIN jenis_pelanggaran ON jenis_pelanggaran.id = pelanggaran.jenis_id
GROUP BY siswa.id
");

$pdf->SetFont('Arial','',12);

while($row = mysqli_fetch_assoc($data)){

$total = $row['total'];

if($total >= 100){
    $status = "SP3";
}elseif($total >= 75){
    $status = "SP2";
}elseif($total >= 50){
    $status = "SP1";
}else{
    $status = "Aman";
}

$pdf->Cell(80,10,$row['nama'],1);
$pdf->Cell(40,10,$total,1);
$pdf->Cell(40,10,$status,1);
$pdf->Ln();
}

$pdf->Output();
?>
