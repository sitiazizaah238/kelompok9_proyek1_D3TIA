<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--title yaitu judul dari halaman web-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylelogin.css"><!--link ini merujuk ke file eksternal CSS dari Bootstrap-->
</head>
<body>
    <div class="container">
        <!--container ini elemen dari bootsrap untuk mengelompokkan konten,membantu dalam mengatur tata letak dan membuat konten -->
        <div class=  "row justify-content-center mt-2">
            <!-- rowjustify konten ini elemen dari Bootstrap yang digunakan untuk membuat baris di dalam kontainer.-->
            <div class="col-md-5">
                <!-- col md6 ini elemen dari Bootstrap yang digunakan untuk membuat kolom -->
                <div class="card">
                    <!-- card yaitu digunakan untuk membuat kartu menampilkan berbagai jenis konten -->
                    <div class="card-header">
                        <!--Ini adalah bagian dari kartu yang disediakan oleh Bootstrap yg brkaitan dengan kartu seperti judul dan laiin nya-->
                        <h3 class="text-center">LOGIN</h3>
                        <p style="text-align:center">Sign in to your account</p>
                        <center><img src="logo.jpg" alt="logo" height= "100" width="150"></center>
                        <!-- center&h3 digunakan untuk menerapkan gaya teks yang membuat teks berada di tengah secara horizontal.-->
                    </div>
                    <div class="card-body">
                        <!--card body digunakan untuk menampilkan konten di dalam "card",Di dalam "cardbody" ini lah formulir login ditempatkan.-->
                        <form id="loginForm">
                            <div class="form-group">
                                <!--Ini adalah elemen form HTML yang digunakan untuk mengelompokkan elemen-elemen input yang terkait dengan proses login-->
                                <label for="username">Username</label>
                                <!--memasukkan username.type="text" menunjukkan bahwa ini adalah input teks biasa. Atribut id="username"mungkin ini label di atasnya untuk terhubung dengan input ini.-->
                                <input type="text" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <!--form grou ini untuk mengelompokkan elemen-elemen form yang terkait, seperti label dan input.-->
                                <label for="password">Password</label>
                                <!--Ini adalah label untuk input password, dengan cara yang sama seperti label untuk username.-->
                                <input type="password" id="password" class="form-control">
                            </div>
                            <a href="home.html" type="submit" class="btn btn-primary btn-block">Login</a>
                            <center><p>Don't have an account? <b>Register</b></p></center>
                            <!--tombol "submit" yang akan mengirimkan formulir -->
                        </form>
                        <!--form ini digunakan untuk membuat formulir di halaman web. Formulir digunakan untuk mengumpulkan input dari pengguna, seperti teks, kata sandi, pilihan, dll. -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <!--digunakan untuk memuat dan menjalankan kode JavaScript yang terdapat dalam file eksternal script.js-->
</body>
</html>

