<?php
include 'db.php';

$no_kamar = $_POST['no_kamar']; // Menggunakan no_kamar sebagai nama field dari form
$deskripsi = $_POST['deskripsi']; // Menggunakan deskripsi sebagai nama field dari form
$harga = $_POST['harga']; // Menggunakan harga sebagai nama field dari form
$lokasi = $_POST['lokasi']; // Menggunakan lokasi sebagai nama field dari form
$foto = $_POST['foto']; // Menggunakan foto sebagai nama field dari form

// Query untuk menambahkan data baru ke dalam database
$query = "INSERT INTO kamar (no_kamar, deskripsi, harga, lokasi, foto) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('sssss', $no_kamar, $deskripsi, $harga, $lokasi, $foto);

// Mengeksekusi query
if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$stmt->close();
$conn->close();
?>
