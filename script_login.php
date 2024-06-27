<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "rental";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ambil data dari form
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // Ambil data pengguna berdasarkan username dari tabel pemilik
    $sql = "SELECT * FROM pemilik WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password untuk pemilik
        if (password_verify($password, $user['password'])) {
            // Password benar = login berhasil sebagai pemilik
            $_SESSION['username'] = $user['username'];

            // waktu sesi pengguna, masa berlaku 1 jam
            setcookie("username", $user['username'], time() + 3000, "/");

            header("Location: home_pemilik.php");
            exit();
        } else {
            // Password salah
            echo "Password salah.";
        }
    } else {
        // Jika tidak ditemukan di tabel pemilik, cek di tabel penyewa
        $sql = "SELECT * FROM penyewa WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifikasi password untuk penyewa
            if (password_verify($password, $user['password'])) {
                // Password benar, login berhasil sebagai penyewa
                $_SESSION['username'] = $user['username'];
                $_SESSION['id_penyewa'] = $user['id_penyewa']; // Tambahkan ini

                // waktu sesi pengguna
                setcookie("username", $user['username'], time() + 3000, "/");

                // Redirect ke halaman home_penyewa.php
                header("Location: home_penyewa.php");
                exit();
            } else {
                echo "Password salah.";
            }
        } else {
            // Username tidak ditemukan di kedua tabel
            echo "Username tidak ditemukan.";
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
