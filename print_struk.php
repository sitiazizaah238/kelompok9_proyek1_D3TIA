<?php
require_once('tcpdf/tcpdf.php');

session_start();

if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika belum login
    header("Location: login.php");
    exit();
}

// Periksa apakah semua parameter yang diperlukan ada
if (!isset($_GET['id_penyewa'], $_GET['no_kamar'], $_GET['username'], $_GET['durasi'], $_GET['total_harga'], $_GET['bukti_transfer'])) {
    echo "Detail transaksi tidak lengkap.";
    exit();
}

$id_penyewa = $_GET['id_penyewa'];
$no_kamar = $_GET['no_kamar'];
$username = $_GET['username'];
$durasi = $_GET['durasi'];
$total_harga = $_GET['total_harga'];
$bukti_transfer = $_GET['bukti_transfer'];

// Membuat objek PDF baru
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Atur informasi dokumen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nama Anda');
$pdf->SetTitle('Nota Transaksi');
$pdf->SetSubject('Nota Transaksi');
$pdf->SetKeywords('TCPDF, PDF, nota, transaksi');

// Atur margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Tambahkan halaman
$pdf->AddPage();

// Atur font
$pdf->SetFont('helvetica', '', 12);

// Tulis konten
$html = <<<EOD
<h2 style="text-align: center;">Nota Transaksi</h2>
<div style="text-align: center;">
    <p><strong>ID Penyewa:</strong> $id_penyewa</p>
    <p><strong>No Kamar:</strong> $no_kamar</p>
    <p><strong>Penghuni:</strong> $username</p>
    <p><strong>Durasi:</strong> $durasi (Bulan)</p>
    <p><strong>Total Harga:</strong> $total_harga</p>
    <p><strong>Bukti Transfer:</strong></p>
    <img src="$bukti_transfer" alt="Bukti Transfer" style="width:300px; height:auto; display:block; margin:0 auto;">
</div>
EOD;


$pdf->writeHTML($html, true, false, true, false, '');

// Tutup dan keluarkan PDF
$pdf->Output('nota_transaksi.pdf', 'I');
?>
