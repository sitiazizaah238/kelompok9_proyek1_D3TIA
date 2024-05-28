<?php
include 'db.php';

$id = $_POST['id'];

$sql = "DELETE FROM rooms WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Room deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


