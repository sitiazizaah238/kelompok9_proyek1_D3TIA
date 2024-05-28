<?php
include 'db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$location = $_POST['location'];
$image = $_POST['image'];

$sql = "UPDATE rooms SET title='$title', description='$description', price='$price', location='$location', image='$image' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
