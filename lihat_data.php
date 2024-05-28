<?php
include 'db.php';

$query = "SELECT * FROM rooms";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple CRUD Using PHP, MySQL and Bootstrap</title>
</head>
<body>
    <h2>Data katalog kamar</h2>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Location</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if ($result->num_rows > 0):
            $nomor = 1;
            while($data = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['title']; ?></td>
                <td><?php echo $data['description']; ?></td>
                <td><?php echo $data['price']; ?></td>
                <td><?php echo $data['location']; ?></td>
                <td><img src="<?php echo $data['image']; ?>" alt="Room Image" width="100"></td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" rowspan="1" headers="">No data found!</td>
            </tr>
        <?php endif; ?>
        <?php mysqli_free_result($result); ?>
        </tbody>
    </table>
</body>
</html>
