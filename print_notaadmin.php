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
<h1 style="text-align: center;">Nota Pembayaran</h1>
<table border="1" cellpadding="4">
    <tr>
        <th colspan="2" style="background-color:#f2f2f2; text-align: center;">Detail Transaksi</th>
    </tr>
    <tr>
        <td><strong>ID Penyewa:</strong></td>
        <td>$id_penyewa</td>
    </tr>
    <tr>
        <td><strong>No Kamar:</strong></td>
        <td>$no_kamar</td>
    </tr>
    <tr>
        <td><strong>Penghuni:</strong></td>
        <td>$username</td>
    </tr>
    <tr>
        <td><strong>Durasi:</strong></td>
        <td>$durasi Bulan</td>
    </tr>
    <tr>
        <td><strong>Total Harga:</strong></td>
        <td>Rp.$total_harga.000</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;"><strong>Bukti Transfer:</strong></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">
            <img src="$bukti_transfer" alt="Bukti Transfer" style="width:300px; height:auto;">
        </td>
    </tr>
</table>
<p style="text-align: center;">Terima kasih atas pembayaran Anda.</p>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');

// Tutup dan keluarkan PDF
$pdf->Output('nota_transaksi.pdf', 'I');
?>
