<?php
include 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$location = $_POST['location'];
$image = $_POST['image'];

$sql = "INSERT INTO rooms (title, description, price, location, image) VALUES ('$title', '$description', '$price', '$location', '$image')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
