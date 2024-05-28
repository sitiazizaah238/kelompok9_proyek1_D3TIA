<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $image = $_POST['image'];

    $query = "UPDATE rooms SET title = ?, description = ?, price = ?, location = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssssi', $title, $description, $price, $location, $image, $id);

    if ($stmt->execute()) {
        echo "Room updated successfully";
    } else {
        echo "Error updating room: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
