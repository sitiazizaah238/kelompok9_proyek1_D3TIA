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
                
                <form class="search-box" action="#" method="GET">
                    <input type="text" name="search" placeholder="                                                          Search">
                </form>

                <ul class="nav-icons">
                    <a href="#"><i class="fa-regular fa-heart fa-2xl" style="
                        padding-right: 35px;
                        color: #e4c6ff;"></i></a>

                    <a href="Register.html"><i class="fa-solid fa-user fa-2xl" style="
                    padding-right: 25px; 
                    color: #e4c6ff;       "></i></a>
                </ul>

            </div>
        </nav>
    </header>
 <!-- akhir navigasi -->

    <!-- content -->
    <div class="background">
        <div class="background-tetap">
           <img src="gambar1.jpg" alt="gambar1" height= "100" width="200" > <!-- img untuk menampilkan gambar,src menentukan lokasi/URL dari gambar yg akan ditampilkan -->
            <div class="text1">     <!-- class text agar diatas gambar yg dijadikan backgroun -->
                <h1 class="text-katalog">Kamar Tersedia</h1>   <!-- judul menggunakan elemen header -->
                    <p></p>
            </div>
        </div> 
    </div>


    <!-- katalog  -->
    <div class="card-container">

        <div class="card">
            <img src="gambar5.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Kamar 1</h5>
                <p class="card-text">Luas kamar 3x5 meter dilengkapi dengan fasilitas kamar mandi dalam,kasur,meja,lemari,kipas,wifi</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Price:</strong> Rp.500,000/Bulan</li>
                    <li class="list-group-item"><strong>Lokasi:</strong> Jl.Lohbener Lama</li>
                </ul>
                <div class="tombol">
                    <a href="payment.html" class="button-text">Sewa</a>
                </div>
    
            </div>
        </div>
        

        <div class="card">
            <img src="gambar6.jpeg" class="card-img-top" alt="">
            <div class="card-body">     <!-- Body deskripsi -->
                <h5 class="card-title">Kamar 2</h5>
                <p class="card-text">Luas kamar 3x5 meter dilengkapi dengan fasilitas kamar mandi dalam,kasur,meja,lemari,kipas,wifi</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Price:</strong> Rp.500,000/Bulan</li>
                    <li class="list-group-item"><strong>Lokasi:</strong> Jl.Lohbener Lama</li>
                </ul>
                <div class="tombol">
                    <a href="payment.html" class="button-text">Sewa</a>
                </div>
    
            </div>
        </div>
    

        <div class="card">
            <img src="gambar7.jpeg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Kamar 3</h5>
                <p class="card-text">Luas kamar 3x5 meter dilengkapi dengan fasilitas kamar mandi dalam,kasur,meja,lemari,kipas,wifi</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Price:</strong> Rp.500,000/Bulan</li>
                    <li class="list-group-item"><strong>Lokasi:</strong> Jl.Lohbener Lama</li>
                </ul>
                <div class="tombol">
                    <a href="payment.html" class="button-text">Sewa</a>
                </div>
    
            </div>
        </div>
        
    </div>
    <div class="batas"></div> <!--jarak -->
    <div id="room-catalog" class="card-container"></div>

 <div class="batas"></div> <!--jarak -->

<div class="tambah-kamar">
    <h2>Tambahkan kamar</h2>
    <form id="add-room-form">
        <input type="text" id="title" placeholder="nomor kamar" required>
        <input type="textarea" id="description" placeholder="deskripsi" required>
        <input type="number" id="price" placeholder="harga" required>
        <input type="text" id="location" placeholder="lokasi" required>
        <input type="text" id="image" placeholder="tambahkan foto" required>
        <button type="submit">tambahkan kamar</button>
    </form>
</div>

<!-- Modal for editing room -->
<div id="edit-room-container" style="display:none;">
    <h2>Edit Room</h2>
    <form id="edit-room-form">
        <input type="hidden" id="edit-id">
        <input type="text" id="edit-title" placeholder="ubah nomor kamar" required>
        <input type="textarea" id="edit-description" placeholder="edit deskripsi" required>
        <input type="number" id="edit-price" placeholder="ubah harga" required>
        <input type="textarea" id="edit-location" placeholder="ubah lokasi" required>
        <input type="text" id="edit-image" placeholder="tambahkan foto" required>
        <button type="submit">simpan</button>
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
                <img src="${room.image}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">${room.title}</h5>
                    <p class="card-text">${room.description}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Price:</strong> ${room.price}</li>
                        <li class="list-group-item"><strong>Location:</strong> ${room.location}</li>
                    </ul>
                    <div>
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
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
        const title = card.querySelector('.card-title').innerText;
        const description = card.querySelector('.card-text').innerText;
        const price = card.querySelector('.list-group-item:nth-child(1)').innerText.split(': ')[1];
        const location = card.querySelector('.list-group-item:nth-child(2)').innerText.split(': ')[1];
        const image = card.querySelector('img').src;

        document.getElementById('edit-id').value = id;
        document.getElementById('edit-title').value = title;
        document.getElementById('edit-description').value = description;
        document.getElementById('edit-price').value = price;
        document.getElementById('edit-location').value = location;
        document.getElementById('edit-image').value = image;

        document.getElementById('edit-room-container').style.display = 'block';
    });
});


    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', async (e) => {
            const card = e.target.closest('.card');
            const id = card.getAttribute('data-id');

            const formData = new FormData();
            formData.append('id', id);

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
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const price = document.getElementById('price').value;
    const location = document.getElementById('location').value;
    const image = document.getElementById('image').value;

    const formData = new FormData();
    formData.append('title', title);
    formData.append('description', description);
    formData.append('price', price);
    formData.append('location', location);
    formData.append('image', image);

    await fetch('add_room.php', {
        method: 'POST',
        body: formData
    });

    fetchRooms();
});

document.getElementById('edit-room-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const id = document.getElementById('edit-id').value;
    const title = document.getElementById('edit-title').value;
    const description = document.getElementById('edit-description').value;
    const price = document.getElementById('edit-price').value;
    const location = document.getElementById('edit-location').value;
    const image = document.getElementById('edit-image').value;

    const formData = new FormData();
    formData.append('id', id);
    formData.append('title', title);
    formData.append('description', description);
    formData.append('price', price);
    formData.append('location', location);
    formData.append('image', image);

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
