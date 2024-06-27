<?php
session_start();

// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    // Tambahkan pesan notifikasi ke session
    $_SESSION['login_message'] = "Silahkan login terlebih dahulu.";
    header("Location: login.php");
    exit();
}

// Include file koneksi database
require_once 'db.php';

// Inisialisasi variabel
$nama_kamar = "";
$deskripsi = "";
$lokasi = "";
$harga = "";
$foto = "";
$foto2 = "";
$foto3 = "";

if (isset($_GET['id_penyewa'])) {
    $id_penyewa = $_GET['id_penyewa'];

    // Query untuk mengambil data kamar berdasarkan id_kamar
    $sql = "SELECT * FROM penyewa WHERE id_penyewa = $id_penyewa";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            $id_penyewa = $row['id_penyewa'];

        }
    } else {
        echo "Data kamar tidak ditemukan.";
    }
}


// Query untuk mengambil data kamar jika parameter id_kamar ada
if (isset($_GET['id_kamar'])) {
    $id_kamar = $_GET['id_kamar'];

    // Query untuk mengambil data kamar berdasarkan id_kamar
    $sql = "SELECT * FROM kamar WHERE id_kamar = $id_kamar";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            $id_kamar = $row['id_kamar'];
            $no_kamar = $row['no_kamar'];
            $deskripsi = $row['deskripsi'];
            $lokasi = $row['lokasi'];
            $harga = $row['harga'];
            $foto = $row['foto'];
            $foto2 = $row['foto2'];
            $foto3 = $row['foto3'];
        }
    } else {
        echo "Data kamar tidak ditemukan.";
    }
} else {
    $_SESSION['login_message'] = "Silahkan login terlebih dahulu.";
    header("Location: login.php");
    exit();;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Kamar <?php echo isset($nama_kamar) ? $nama_kamar : ''; ?></title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        /* Gaya tambahan untuk halaman info kamar */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            height: auto;
            margin: 0 auto;
            padding: 20px;
            background-color: #2f1348;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 30px;
        }



        .room-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .room-description {
            color: #666;
            margin-bottom: 20px;
        }

        .room-details {
            margin-bottom: 20px;
        }

        .detail-item {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-text {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .button-text:hover {
            background-color: #0056b3;
        }

        .swiper-container {
            width: 100%;
            height: 600px;
            margin-bottom: 20px;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header>
        <nav style="background: #2f1348; padding: 20px 0;">
            <div class="" style="   font-size: 34px;
                                        font-weight: bold;
                                        margin-left: 80px;
                                        margin-right: -70px;">
                <div class="">
                    <img src="logoo.png" alt="Logo" />
                </div>
            </div>
        </nav>
    </header>

    <div class="container" >
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?php echo $foto; ?>" alt="Room Image 1">
                </div>
                <!-- Tambahkan tiga gambar lainnya di sini -->
                <div class="swiper-slide">
                    <img src="<?php echo $foto2; ?>" alt="Room Image 2">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo $foto3; ?>" alt="Room Image 2">
                </div>
                <div class="swiper-slide">
                    <img src="kamar18.jpg" alt="Room Image 4">
                </div>
            </div>
            <!-- Tambahkan tombol navigasi jika diperlukan -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>


        <h1 class="room-title" style="color: #fff;"><?php echo $no_kamar; ?></h1>
        <p class="room-description" style="color: #fff;"><?php echo $deskripsi; ?></p>

        <div class="room-details" style="color: #fff;">
            <?php if (!empty($harga)) : ?>
                <div class="detail-item"><strong style="color: #fff;">Harga:</strong> Rp <?php echo number_format($harga, 0, ',', '.'); ?>/bulan</div>
            <?php endif; ?>
            <div class="detail-item"><strong style="color: #fff;">Lokasi:</strong> <?php echo $lokasi; ?></div>
        </div>

        <div class="button-container">
            <a href="payment.php?id_kamar=<?php echo urlencode($id_kamar); ?>&no_kamar=<?php echo urlencode($no_kamar); ?>&deskripsi=<?php echo urlencode($deskripsi); ?>&harga=<?php echo urlencode($harga); ?>&lokasi=<?php echo urlencode($lokasi); ?>&foto=<?php echo urlencode($foto); ?>" class="button-text">Sewa</a>
        </div>
    </div>

        <div class="deskripsi" style="
            width: 90%;
            height: auto;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 30px;
            background-color:#2f1348;
          
        
        ">
            <h1 style="color:#fff">detail</h1>
            <p style="color:#fff">corner Residence hanya berjarak sekitar 200 meter ke Plaza Indonesia, The Plaza, Grand Indonesia, Menara BCA, Thamrin City, Bunderan HI maupun akses ke MRT atau Trans Ja</p>
        </div>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>

</html>
