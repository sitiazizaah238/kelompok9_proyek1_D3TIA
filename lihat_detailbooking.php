<?php
session_start();

require_once('db.php'); // Sesuaikan dengan konfigurasi koneksi database Anda

// Periksa apakah ID booking ada di URL
if (!isset($_GET['id'])) {
    echo "ID booking tidak ditemukan.";
    exit();
}

$id_booking = $_GET['id'];

// Ambil detail booking dari database
$sql = "SELECT * FROM booking WHERE id_booking = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_booking);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Detail booking tidak ditemukan.";
    exit();
}

$booking = $result->fetch_assoc();

// Simpan variabel-variabel yang diperlukan
$id_penyewa = $booking['id_penyewa'];
$no_kamar = $booking['no_kamar'];
$username = $booking['username'];
$durasi = $booking['durasi'];
$total_harga = $booking['total_harga'];
$bukti_transfer = $booking['bukti_transfer'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .back-link {
            display: block;
            text-align: center;
            margin: 20px 0;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Pemesanan</h1>
        <table>
            <tr>
                <th>ID Booking</th>
                <td><?php echo $booking['id_booking']; ?></td>
            </tr>
            <tr>
                <th>ID Penyewa</th>
                <td><?php echo $booking['id_penyewa']; ?></td>
            </tr>
            <tr>
                <th>No Kamar</th>
                <td><?php echo $booking['no_kamar']; ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo $booking['username']; ?></td>
            </tr>
            <tr>
                <th>No HP</th>
                <td><?php echo $booking['no_hp']; ?></td>
            </tr>
            <tr>
                <th>Durasi</th>
                <td><?php echo $booking['durasi']; ?></td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td><?php echo $booking['total_harga']; ?>.000</td>
            </tr>
        </table>
        <a href="lihat_booking.php" class="back-link">Kembali ke Daftar Pemesanan</a>
        <a href="print_notaadmin.php?id_penyewa=<?php echo htmlspecialchars($id_penyewa); ?>&no_kamar=<?php echo htmlspecialchars($no_kamar); ?>&username=<?php echo htmlspecialchars($username); ?>&durasi=<?php echo htmlspecialchars($durasi); ?>&total_harga=<?php echo htmlspecialchars($total_harga); ?>&bukti_transfer=<?php echo htmlspecialchars($bukti_transfer); ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp Cetak Bukti</a>

    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
