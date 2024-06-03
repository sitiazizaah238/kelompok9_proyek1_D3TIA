<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/4592f70558.js" crossorigin="anonymous"></script>
    <!-- You can add any additional stylesheets or scripts here -->
</head>

<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <img src="logoo.png"/>
                </div>
                <form class="search-box" action="#" method="GET">
                    <input type="text" name="search" placeholder="Search">
                </form>
                <ul class="nav-icons">
                    <a href="#"><i class="fa-regular fa-heart fa-2xl" style="padding-right: 35px; color: #e4c6ff;"></i></a>
                    <a href="login.php"><i class="fa-solid fa-user fa-2xl" style="padding-right: 25px; color: #e4c6ff;"></i></a>
                </ul>
            </div>
        </nav>
    </header>

    <div class="background">
        <div class="background-tetap">
            <img src="awal.png" alt="gambar1" height= "100" width="200" > <!-- img untuk menampilkan gambar,src menentukan lokasi/URL dari gambar yg akan ditampilkan -->
            <div class="text1">     <!-- class text agar diatas gambar yg dijadikan backgroun -->
                <h1 class="text-katalog">Kamar Tersedia</h1>   <!-- judul menggunakan elemen header -->
                    <p></p>
            </div>
        </div> 
    </div>

    <div id="room-catalog" class="card-container"></div>

    <div class="batas"></div> <!--jarak -->

    <div class="tambah-kamar">
        <form id="add-room-form">
           
        </form>
    </div>

    <!-- Modal for editing room -->
    <div id="edit-room-container" style="display:none;">
        <form id="edit-room-form">

        </form>
    </div>

    <script>
        async function fetchRooms() {
            const response = await fetch('get_rooms.php');
            const rooms = await response.json();
            const roomCatalog = document.getElementById('room-catalog');
            roomCatalog.innerHTML = '';
            rooms.forEach(room => {
                const roomCard = `
                    <div class="card" data-id="${room.id}">
                        <img src="${room.foto}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">${room.no_kamar}</h5>
                            <p class="card-text">${room.deskripsi}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Harga:</strong> ${room.harga}</li>
                                <li class="list-group-item"><strong>Lokasi:</strong> ${room.lokasi}</li>
                            </ul>
                            <div>
                               
                            </div>
                            <div class="tombol">
                                <a href="payment.html" class="button-text">Sewa</a>
                            </div>
                        </div>
                    </div>
                `;
                roomCatalog.innerHTML += roomCard;
            });

            document.querySelectorAll('.edit-button').forEach(button => {
                button.addEventListener('click', (e) => {
                    const card = e.target.closest('.card');
                    const id = card.getAttribute('data-id');
                    const no_kamar = card.querySelector('.card-title').innerText;
                    const deskripsi = card.querySelector('.card-text').innerText;
                    const harga = card.querySelector('.list-group-item:nth-child(1)').innerText.split(': ')[1];
                    const lokasi = card.querySelector('.list-group-item:nth-child(2)').innerText.split(': ')[1];
                    const foto = card.querySelector('img').src;

                    document.getElementById('edit-id_kamar').value = id;
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
