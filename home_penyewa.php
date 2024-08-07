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

$sql = "SELECT username FROM penyewa WHERE username = ?";
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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
   
<style>
    .swiper-container {
    width: 100%;
    height: 270px;
}

.swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Section styles */
.section {
    padding: 60px 0;
    text-align: center;
}

.section-header {
    margin-bottom: 40px;
}

.section-header h2 {
    font-size: 2em;
    margin-bottom: 10px;
}

.section-header p {
    font-size: 1.2em;
    color: #666;
}

.features-content, .testimonials-content, .contact-content {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.feature, .testimonial, .contact-info {
    flex: 1;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.feature i, .testimonial img {
    margin-bottom: 10px;
}

.feature h3, .testimonial h4 {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.contact-content form {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.contact-content form input, .contact-content form textarea {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.contact-content form button {
    padding: 10px;
    border: none;
    background-color: #333;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.contact-content form button:hover {
    background-color: #555;
}

.contact-info p {
    margin-bottom: 10px;
}
</style>

</head>

    <!-- navigasi -->
    <body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                <img src="LOGO2.png" style="max-width: 210px;
                    max-height: 150px;"/>
                </div>
                <!-- <form class="search-box" action="#" method="GET">
                    <input type="text" name="search" placeholder="Search"> -->
                </form>
                <ul class="nav-icons">
                
                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-2xl" style="padding-right: 35px; color: #e4c6ff;"></i></a>
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
           <img src="awal.png" alt="gambar1" height= "120" width="100vh" > <!-- img untuk menampilkan gambar,src menentukan lokasi/URL dari gambar yg akan ditampilkan -->
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



   

<!-- Modal for editing room -->
<div id="edit-room-container" style="display:none;">
    
    <form id="edit-room-form">
    
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
        <a href="info_kamar.php?id_kamar=${room.id_kamar}&no_kamar=${encodeURIComponent(room.no_kamar)}&deskripsi=${encodeURIComponent(room.deskripsi)}&harga=${room.harga}&lokasi=${encodeURIComponent(room.lokasi)}&foto=${encodeURIComponent(room.foto)}">
            <img src="${room.foto}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">${room.no_kamar}</h5>
                <p class="card-text">${room.deskripsi}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Harga:</strong> ${room.harga}</li>
                    <li class="list-group-item"><strong>Lokasi:</strong> ${room.lokasi}</li>
                </ul>
                <div class="tombol">
                    <a href="payment.php?id_kamar=${room.id_kamar}&no_kamar=${encodeURIComponent(room.no_kamar)}&deskripsi=${encodeURIComponent(room.deskripsi)}&harga=${room.harga}&lokasi=${encodeURIComponent(room.lokasi)}&foto=${encodeURIComponent(room.foto)}" class="button-text">Sewa</a>
                </div>
            </div>
        </a>
    </div>
`;

        roomCatalog.innerHTML += roomCard;
    });

    // Add event listeners for edit and delete buttons
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


    <footer>
        <div class="container">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
