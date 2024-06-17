<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika belum login
    header("Location: login.php");
    exit();
}

include 'db.php';

// Mendapatkan id_penyewa dari sesi yang sudah tersimpan
if (!isset($_SESSION['id_penyewa'])) {
    echo "ID Penyewa tidak valid.";
    exit();
}

$id_penyewa = $_SESSION['id_penyewa'];

// Periksa apakah form sudah dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan 'no_kamar', 'username', 'durasi', 'total_harga' dan 'bukti_transfer' diset
    if (!isset($_POST['no_kamar'], $_POST['username'], $_POST['durasi'], $_POST['total_harga'], $_FILES['bukti_transfer'])) {
        echo "Form tidak lengkap.";
        exit();
    }

    $no_kamar = $_POST['no_kamar'];
    $username = $_POST['username'];
    $durasi = $_POST['durasi'];
    $total_harga = $_POST['total_harga'];

    // Penanganan upload file
    $bukti_transfer = $_FILES['bukti_transfer'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($bukti_transfer["name"]);

    // Periksa apakah direktori 'uploads' ada, jika tidak, buat direktori tersebut
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($bukti_transfer["tmp_name"], $target_file)) {
        // Insert data booking ke dalam database
        $sql = "INSERT INTO booking (id_penyewa, no_kamar, username, durasi, total_harga, bukti_transfer) VALUES ('$id_penyewa', '$no_kamar', '$username', '$durasi', '$total_harga', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            // Redirect ke halaman nota.php dan kirimkan data yang diperlukan
            header("Location: nota.php?id_penyewa=$id_penyewa&no_kamar=$no_kamar&username=$username&durasi=$durasi&total_harga=$total_harga&bukti_transfer=$target_file");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file.";
        echo " Source: " . $bukti_transfer["tmp_name"];
        echo " Destination: " . $target_file;
        echo " Error: " . $_FILES['bukti_transfer']['error'];
    }
}

$conn->close();
?>
