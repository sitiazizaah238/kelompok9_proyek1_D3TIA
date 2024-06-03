<?php
include 'db.php';

$sql = "SELECT id_kamar, no_kamar, deskripsi, harga, lokasi, foto FROM kamar";
$result = $conn->query($sql);

$kamar = array();

while($row = $result->fetch_assoc()) {
    $kamar[] = $row;
}

echo json_encode($kamar);

$conn->close();
?>
