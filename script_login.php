<?php
session_start();

// Simpan nilai ke dalam $_SESSION
$_SESSION['username'] = "contohusername";

// Akses nilai yang disimpan dalam $_SESSION
$username = $_SESSION['username'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "rental"; // Ganti dengan nama database Anda

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ambil data dari form
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // Ambil data pengguna berdasarkan username
    $sql = "SELECT * FROM pemilik WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Password benar, login berhasil
            echo "Login berhasil! Selamat datang, " . $user['username'];
            // Anda dapat mengarahkan pengguna ke halaman lain, misalnya:
            header("Location: home.php");
            exit();
        } else {
            // Password salah
            echo "Password salah.";
        }
    } else {
        // Username tidak ditemukan
        echo "Username tidak ditemukan.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
