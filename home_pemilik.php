<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$username = $_SESSION['username'];

// Periksa apakah notifikasi selamat datang sudah ditampilkan
$showWelcomeMessage = false;
if (!isset($_SESSION['welcome_message_shown'])) {
    $_SESSION['welcome_message_shown'] = true;
    $showWelcomeMessage = true;
}

$sql = "SELECT username FROM pemilik WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $display_username = $user['username'];
} else {
    $display_username = "User not found"; // Handle case where user data is not found
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/4592f70558.js" crossorigin="anonymous"></script>
    <!-- Youu can add any additional stylesheets or scripts here -->


</head>

    <!-- navigasi -->
    <body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <img src="logoo.png"/>
                </div>
                <!-- <form class="search-box" action="#" method="GET">
                    <input type="text" name="search" placeholder="Search"> -->
                </form>
                <ul class="nav-icons">
                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-2x1" style="padding-right: 35px; color: #e4c6ff;"></i></a>
                    <a href="Register.php"><i class="fa-solid fa-user fa-2xl" style="padding-right: 25px; color: #e4c6ff;"></i></a>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <h2>selamat datang, <?php echo htmlspecialchars($display_username); ?>  </h2>
        <!-- Display other content as needed -->

    </div>

</body>
 <!-- akhir navigasi -->

    <!-- content -->
    <div class="background">
        <div class="background-tetap">
           <img src="awal.png" alt="gambar1" height= "100" width="100%" > <!-- img untuk menampilkan gambar,src menentukan lokasi/URL dari gambar yg akan ditampilkan -->
            <div class="text1">     <!-- class text agar diatas gambar yg dijadikan backgroun -->
                <h1 class="text-katalog">Kamar Tersedia</h1>   <!-- judul menggunakan elemen header -->
                    <p></p>
            </div>
        </div> 
    </div>


    <!-- katalog  -->
    <div class="card-container">

       
        </div>
        
    </div>
    <div class="batas"></div> <!--jarak -->
    <div id="room-catalog" class="card-container"></div>



    <link rel="stylesheet" href="style.css">
    <style>
        /* General styles for the form */
        .tambah-kamar {
            background: #f9f9f9;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .tambah-kamar h2 {
            margin-bottom: 20px;
        }

        .tambah-kamar form {
            display: flex;
            flex-direction: column;
        }

        .tambah-kamar input[type="text"],
        .tambah-kamar input[type="number"],
        .tambah-kamar textarea {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .tambah-kamar button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #8A2BE2;
            color: white;
            cursor: pointer;
        }

        .tambah-kamar button:hover {
            background-color: #45a049;
        }

        /* Styles for the card */
        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        .card-content h3 {
            margin: 0 0 10px;
        }

        .card-content p {
            margin: 5px 0;
            color: #555;
        }

        .card-content .card-buttons {
            margin-top: 10px;
        }

        .card-content .card-buttons button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            margin-right: 5px;
        }

        .card-content .card-buttons button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Tambah Kamar Section -->
    <div class="tambah-kamar">
        <h2>Tambahkan Data Kamar</h2>
        <form id="add-room-form">
            <input type="text" id="no_kamar" placeholder="Nomor kamar" required>
            <textarea id="deskripsi" placeholder="Deskripsi" required></textarea>
            <input type="number" id="harga" placeholder="Harga" required>
            <input type="text" id="lokasi" placeholder="Lokasi" required>
            <input type="text" id="foto" placeholder="Tambahkan foto" required>
            <button type="submit">Tambahkan Kamar</button>
        </form>
    </div>

    <script>
        // JavaScript for form submission and card management if needed
        document.getElementById('add-room-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Kamar telah ditambahkan!');
        });
    </script>
<!-- Modal for editing room -->
<div id="edit-room-container" style="display:none;">
    <h2>Edit Room</h2>
    <form id="edit-room-form">
        <input type="hidden" id="edit-id_kamar">
        <input type="text" id="edit-no_kamar" placeholder="ubah nomor kamar" required>
        <input type="textarea" id="edit-deskripsi" placeholder="edit deskripsi" required>
        <input type="number" id="edit-harga" placeholder="ubah harga" required>
        <input type="textarea" id="edit-lokasi" placeholder="ubah lokasi" required>
        <input type="text" id="edit-foto" placeholder="tambahkan foto" required>
        <button type="submit">simpan</button>
    </form>
</div>


<div class="batas"></div> <!--jarak -->


<script>
    fetchRooms();

// Notifikasi selamat datang
document.addEventListener("DOMContentLoaded", function() {
    const showWelcomeMessage = <?php echo json_encode($showWelcomeMessage); ?>;
    if (showWelcomeMessage) {
        alert("Selamat datang, <?php echo htmlspecialchars($display_username); ?>!");
    }
});

// Function to fetch and display rooms
    async function fetchRooms() {
    const response = await fetch('get_rooms.php');
    const rooms = await response.json();
    const roomCatalog = document.getElementById('room-catalog');
    roomCatalog.innerHTML = '';
    rooms.forEach(room => {
        const roomCard = `
    <div class="card" data-id="${room.id_kamar}">
        
            <img src="${room.foto}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">${room.no_kamar}</h5>
                <p class="card-text">${room.deskripsi}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Harga:</strong> ${room.harga}</li>
                    <li class="list-group-item"><strong>Lokasi:</strong> ${room.lokasi}</li>
                </ul>
                <div>
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                    </div>
                <div class="tombol">
                    <a href="payment.php?id_kamar=${room.id_kamar}&no_kamar=${encodeURIComponent(room.no_kamar)}&deskripsi=${encodeURIComponent(room.deskripsi)}&harga=${room.harga}&lokasi=${encodeURIComponent(room.lokasi)}&foto=${encodeURIComponent(room.foto)}" class="button-text">Sewa</a>
                </div>
            </div>
        </a>
    </div>
    `;

        roomCatalog.innerHTML += roomCard;
    });

    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', (e) => {
            const card = e.target.closest('.card');
            const id_kamar = card.getAttribute('data-id');
            const no_kamar = card.querySelector('.card-title').innerText;
            const deskripsi = card.querySelector('.card-text').innerText;
            const harga = card.querySelector('.list-group-item:nth-child(1)').innerText.split(': ')[1];
            const lokasi = card.querySelector('.list-group-item:nth-child(2)').innerText.split(': ')[1];
            const foto = card.querySelector('img').src;

            document.getElementById('edit-id_kamar').value = id_kamar;
            document.getElementById('edit-no_kamar').value = no_kamar;
            document.getElementById('edit-deskripsi').value = deskripsi;
            document.getElementById('edit-harga').value = harga;
            document.getElementById('edit-lokasi').value = lokasi;
            document.getElementById('edit-foto').value = foto;

            document.getElementById('edit-room-container').style.display = 'block';
        });
    });

    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', async (e) => {
            const card = e.target.closest('.card');
            const id_kamar = card.getAttribute('data-id');

            const formData = new FormData();
            formData.append('id_kamar', id_kamar);

            await fetch('delete_room.php', {
                method: 'POST',
                body: formData
            });

            fetchRooms();
        });
    });
}

document.getElementById('add-room-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const no_kamar = document.getElementById('no_kamar').value;
    const deskripsi = document.getElementById('deskripsi').value;
    const harga = document.getElementById('harga').value;
    const lokasi = document.getElementById('lokasi').value;
    const foto = document.getElementById('foto').value;

    const formData = new FormData();
    formData.append('no_kamar', no_kamar);
    formData.append('deskripsi', deskripsi);
    formData.append('harga', harga);
    formData.append('lokasi', lokasi);
    formData.append('foto', foto);

    await fetch('add_room.php', {
        method: 'POST',
        body: formData
    });

    fetchRooms();
});

document.getElementById('edit-room-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const id_kamar = document.getElementById('edit-id_kamar').value;
    const no_kamar = document.getElementById('edit-no_kamar').value;
    const deskripsi = document.getElementById('edit-deskripsi').value;
    const harga = document.getElementById('edit-harga').value;
    const lokasi = document.getElementById('edit-lokasi').value;
    const foto = document.getElementById('edit-foto').value;

    const formData = new FormData();
    formData.append('id_kamar', id_kamar);
    formData.append('no_kamar', no_kamar);
    formData.append('deskripsi', deskripsi);
    formData.append('harga', harga);
    formData.append('lokasi', lokasi);
    formData.append('foto', foto);

    await fetch('update_room.php', {
        method: 'POST',
        body: formData
    });

    document.getElementById('edit-room-container').style.display = 'none';
    fetchRooms();
});

window.onload = fetchRooms;


</script>    
    
    <section id="features" class="section">
        <div>
            <h2>Features</h2>
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-home"></i> <!-- Font Awesome icon for home -->
                </div>
                <div class="feature-text">
                    <h3>Desain Modern</h3>
                    <p>Kamar kami menampilkan desain modern dengan tata ruang yang luas, memberikan kenyamanan dan kebijakan.</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-wifi"></i> <!-- Font Awesome icon for wifi -->
                </div>
                <div class="feature-text">
                    <h3>High-speed Wi-Fi</h3>
                    <p>Nikmati akses Wi-Fi berkecepatan tinggi di semua kamar, memastikan konektivitas tanpa batas untuk bekerja dan bersantai.</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i> <!-- Font Awesome icon for security -->
                </div>
                <div class="feature-text">
                    <h3>24/7 Security</h3>
                    <p>Tempat kami dilengkapi dengan keamanan 24/7 dan pengawasan CCTV untuk ketenangan dan mengawasi situasi.</p>
                </div>
            </div>
            <!-- Add more features as needed -->
        </div>
    </section>

    <!-- Market Section -->
<section id="market" class="section">
    <div>
        <h2>Market</h2>
        <p>Pasar persewaan kami beragam dan dinamis, menawarkan pilihan bagi pelajar, profesional, dan keluarga.
        <br>Dengan harga terjangkau dan pilihan sewa yang fleksibel, kami melayani berbagai kebutuhan dan preferensi.<br>Lokasi utama kami memastikan akses mudah ke fasilitas penting seperti kampus, rumah sakit, pusat perbelanjaan,<br> dan transportasi umum, menjadikan properti kami sangat diminati.</br</p>
        <div class="market-advantages">
            <div class="advantage">
                <i class="fas fa-users"></i> <!-- Font Awesome icon for users -->
                <h3>Diverse Audience</h3>
                <p>Kami melayani pelajar, profesional, dan keluarga, memastikan komunitas yang beragam di properti sewaan kami.</p>
            </div>
            <div class="advantage">
                <i class="fas fa-dollar-sign"></i> <!-- Font Awesome icon for dollar sign -->
                <h3>Harga Terjangkau</h3>
                <p>Harga sewa kami terjangkau, membuat kehidupan berkualitas dapat diakses oleh semua orang.</p>
            </div>
            <div class="advantage">
                <i class="fas fa-map-marked-alt"></i> <!-- Font Awesome icon for map marked -->
                <h3>Lokasi Utama</h3>
                <p>Properti kami berlokasi strategis di dekat fasilitas penting, memastikan kenyamanan bagi penyewa kami.</p>
            </div>
        </div>
    </div>
</section>

   <!-- About Section -->
<section id="about" class="section">
    <div>
        <h2>About</h2>
        <p>Selamat datang di situs web kami yang didedikasikan untuk menyediakan solusi hidup yang nyaman dan terjangkau melalui properti sewaan kami. <br>Kami memahami pentingnya menemukan tempat yang sempurna untuk dijadikan rumah, baik Anda seorang pelajar, profesional, atau keluarga.<br> Misi kami adalah membuat proses penyewaan lancar dan menyenangkan bagi semua penyewa kami.</p>
        <p>Di situs web kami, Anda dapat menjelajahi berbagai pilihan persewaan, mulai dari kamar single yang nyaman hingga apartemen yang luas, semuanya dilengkapi dengan fasilitas penting untuk memastikan pengalaman hidup yang nyaman. Tim kami berkomitmen untuk memberikan layanan dan dukungan terbaik selama Anda menginap.</p>
        <p>Bergabunglah dengan komunitas kami hari ini dan temukan kemudahan dan kenyamanan properti sewaan kami!</p>
    </div>
</section>


    <!-- You can add more sections as needed -->

    <footer>
        <div class="container">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
