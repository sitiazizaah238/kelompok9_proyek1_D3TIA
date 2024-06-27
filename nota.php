<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika belum login
    header("Location: login.php");
    exit();
}

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

// Koneksi ke database untuk mendapatkan nomor HP
include 'db.php';

$sql = "SELECT no_hp FROM penyewa WHERE id_penyewa = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_penyewa);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $penyewa = $result->fetch_assoc();
    $no_hp = $penyewa['no_hp'];
} else {
    $no_hp = "Tidak ditemukan";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        .nota {
            margin-top: 40px;
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        .nota h2 {
            text-align: center;
        }
        .nota p {
            line-height: 1.6;
        }
        .nota img {
            display: block;
            margin: 10px auto;
            max-width: 100%;
        }

        nav {
            background: #2f1348;
            color: #fff;
            padding: 20px 0;
        }

        .nav-links {
            list-style-type: none;
        }
        .nav-links li {
            display: inline-block;
            text-decoration: none;
            justify-content: center;
            align-items: center;
        }

        .nav-links li a {
            color: #fff;
            text-decoration: none;
        }

        .logo {
            font-size: 34px;
            font-weight: bold;
            margin-left: 80px;
            margin-right: -70px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #ddd;
        }
</style>
</head>
<body>
<nav>
    <div>
        <div class="logo">
            <img src="logoo.png" alt="Logo" />
        </div>
    </div>
</nav>

<div class="container"></div>
<div class="nota">
    <h2>Nota Transaksi</h2>
    <p><strong>ID Penyewa:</strong> <?php echo htmlspecialchars($id_penyewa); ?></p>
    <p><strong>No Kamar:</strong> <?php echo htmlspecialchars($no_kamar); ?></p>
    <p><strong>nama penyewa:</strong> <?php echo htmlspecialchars($username); ?></p>
    <p><strong>No HP:</strong> <?php echo htmlspecialchars($no_hp); ?></p>
    <p><strong>Durasi:</strong> <?php echo htmlspecialchars($durasi); ?>(Bulan)</p>
    <p><strong>Total Harga:</strong> <?php echo htmlspecialchars($total_harga); ?></p>
    <p><strong>Bukti Transfer:</strong></p>
    <img src="<?php echo htmlspecialchars($bukti_transfer); ?>" style="max-width: auto; height: 400px;" alt="Bukti Transfer">
    <
</div>

<a href="print_struk.php?id_penyewa=<?php echo htmlspecialchars($id_penyewa); ?>&no_kamar=<?php echo htmlspecialchars($no_kamar); ?>&username=<?php echo htmlspecialchars($username); ?>&durasi=<?php echo htmlspecialchars($durasi); ?>&total_harga=<?php echo htmlspecialchars($total_harga); ?>&bukti_transfer=<?php echo htmlspecialchars($bukti_transfer); ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp Cetak Bukti</a>

</body>
</html>
