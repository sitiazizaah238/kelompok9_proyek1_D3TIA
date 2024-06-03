<?php
// memanggil library FPDF
require('library/fpdf.php');
include 'db.php';

// instance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(190, 10, 'DATA KAMAR', 0, 1, 'C');

$pdf->Cell(10, 10, '', 0, 1); // Pindah baris

$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(30, 7, 'ID', 1, 0, 'C');
$pdf->Cell(40, 7, 'TITLE', 1, 0, 'C');
$pdf->Cell(50, 7, 'DESKRIPSI', 1, 0, 'C');
$pdf->Cell(30, 7, 'HARGA', 1, 0, 'C');
$pdf->Cell(30, 7, 'LOKASI', 1, 1, 'C'); // Ganti 'FOTO' dengan 'LOKASI' karena lebih masuk akal dalam lebar halaman

$pdf->SetFont('Times', '', 10);
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM kamar");
while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($d['id_kamar']), 1, 0);
    $pdf->Cell(40, 6, utf8_decode($d['no_kamar']), 1, 0);
    $pdf->Cell(50, 6, utf8_decode($d['deskripsi']), 1, 0);
    $pdf->Cell(30, 6, utf8_decode($d['harga']), 1, 0);
    $pdf->Cell(30, 6, utf8_decode($d['lokasi']), 1, 1);
}

$pdf->Output();
?>
