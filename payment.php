<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Kost</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 50px auto;
        }

        nav {
            background: #2f1348;
            color: #fff;
            padding: 20 px 0;
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

        .card {
            width: calc(50% - 20px);
            height: 440px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
            margin-top: -50px;
        }
        .card-title {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .card-text {
            margin-bottom: 15px;
        }
        .list-group-item {
            border: none;
        }
        .tombol {
            text-align: right;
        }
        .tombol .button-text {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
        }
        .tombol .button-text:hover {
            background-color: #45a049;
        }
        #rentForm {
            width: 45%;
            height: 500px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #rentForm label {
            display: block;
            margin-bottom: 10px;
        }
        #rentForm input[type="text"], #rentForm input[type="number"], #rentForm input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        #rentForm input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        #rentForm input[type="submit"]:hover {
            background-color: #45a049;
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
<div class="container">
    <?php
    if (isset($_GET['id_kamar']) && isset($_GET['no_kamar']) && isset($_GET['deskripsi']) && isset($_GET['harga']) && isset($_GET['lokasi']) && isset($_GET['foto'])) {
        $id_kamar = $_GET['id_kamar'];
        $no_kamar = urldecode($_GET['no_kamar']);
        $deskripsi = urldecode($_GET['deskripsi']);
        $harga = $_GET['harga'];
        $lokasi = urldecode($_GET['lokasi']);
        $foto = urldecode($_GET['foto']);
    ?>
    <div class="card">
        <img src="<?php echo htmlspecialchars($foto); ?>" class="card-img-top" alt="" style="width: 100%; height: 400px;">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($no_kamar); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($deskripsi); ?></p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Harga:</strong> Rp.<?php echo htmlspecialchars($harga); ?>/Bulan</li>
                <li class="list-group-item"><strong>Lokasi:</strong> <?php echo htmlspecialchars($lokasi); ?></li>
            </ul>
        </div>
    </div>
    <form id="rentForm" action="script_payment.php" method="POST" enctype="multipart/form-data">
        <h2>Sewa Sekarang</h2>
        <label for="username">Nama Penyewa:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="durasi">Durasi Sewa (bulan):</label>
        <input type="number" id="durasi" name="durasi" required>
        
        <label for="total_harga">Harga yang dibayar(Rp):</label>
        <input type="text" id="total_harga" name="total_harga" readonly>
        
        <label for="accountNumber">Nomor Rekening Tujuan:</label>
        <input type="text" id="accountNumber" name="accountNumber" value="9122112" readonly>

        <label for="bukti_transfer">Bukti Transfer:</label>
        <input type="file" id="bukti_transfer" name="bukti_transfer" accept="image/*" required>
        
        <input type="hidden" name="id_kamar" value="<?php echo $id_kamar; ?>">
        <input type="hidden" name="no_kamar" value="<?php echo $no_kamar; ?>">
        <input type="hidden" name="harga" value="<?php echo $harga; ?>">
        
        <input type="submit" value="Bayar">
    </form>
    <script>
        document.getElementById('durasi').addEventListener('input', calculateTotal);
        function calculateTotal() {
            var rentDuration = parseInt(document.getElementById('durasi').value);
            var hargaPerBulan = <?php echo $harga; ?>;
            var totalAmount = hargaPerBulan * rentDuration;
            document.getElementById('total_harga').value = totalAmount.toLocaleString('id-ID');
        }
    </script>
    <?php
    } else {
        echo "<p>Detail kamar tidak ditemukan.</p>";
    }
    ?>
</div>
</body>
</html>
