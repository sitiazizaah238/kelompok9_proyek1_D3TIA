<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Langkah 1: Koneksi ke database
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "rental"; // Ganti dengan nama database Anda

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Langkah 2: Ambil data dari form dan filter input
    $username = $_POST['username'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Langkah 3: Periksa apakah password dan konfirmasi password cocok
    if ($password !== $confirm_password) {
        die("Password dan konfirmasi password tidak cocok.");
    }

    // Langkah 4: Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Langkah 5: Masukkan data ke database menggunakan prepared statements
    $sql = "INSERT INTO penyewa (username, no_hp, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error: " . $conn->error);
    }
    $stmt->bind_param("ssss", $username, $no_hp, $email, $hashed_password);

    if ($stmt->execute()) {
        // Dapatkan id_pemilik yang baru dimasukkan
        $id_pemilik = $stmt->insert_id;
        echo "Registrasi berhasil! ID Anda adalah: " . $id_pemilik;
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
