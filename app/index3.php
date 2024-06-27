<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="app/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GRIYA KOST</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <div class="container">
                <div class="logo">
                    <img src="logoo.png"/>
                </div>
                <!-- <form class="search-box" action="#" method="GET">
                    <input type="text" name="search" placeholder="Search"> -->
                </form>
                <ul class="nav-icons">
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
document.addEventListener("DOMContentLoaded", function() {
    alert("Anda telah logout. Terima kasih!");
    window.location.href = "#"; // Redirect ke halaman login setelah notifikasi
});

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
                </div>z
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
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="app/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="app/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="app/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="app/plugins/raphael/raphael.min.js"></script>
<script src="app/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="app/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="app/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="app/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="app/dist/js/pages/dashboard2.js"></script>
</body>
</html>
