<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kamar = $_POST['id_kamar'];
    $no_kamar = $_POST['no_kamar'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];
    $foto = $_POST['foto'];

    // Query untuk melakukan update data kamar berdasarkan id_kamar
    $query = "UPDATE kamar SET no_kamar = ?, deskripsi = ?, harga = ?, lokasi = ?, foto = ? WHERE id_kamar = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssssi', $no_kamar, $deskripsi, $harga, $lokasi, $foto, $id_kamar);

    // Mengeksekusi query
    if ($stmt->execute()) {
        echo "Room updated successfully";
    } else {
        echo "Error updating room: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
