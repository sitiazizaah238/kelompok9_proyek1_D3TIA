<?php
include 'db.php';

$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

$rooms = array();

while($row = $result->fetch_assoc()) {
    $rooms[] = $row;
}

echo json_encode($rooms);

$conn->close();
?>
