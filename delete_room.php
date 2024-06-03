<?php
include 'db.php';

$id_kamar = $_POST['id_kamar']; // Sesuaikan dengan nama variabel yang dikirimkan dari JavaScript

$sql = "DELETE FROM kamar WHERE id_kamar='$id_kamar'"; // Sesuaikan dengan nama kolom pada tabel kamar

if ($conn->query($sql) === TRUE) {
    echo "Room deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
