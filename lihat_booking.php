<?php
session_start();

require_once('db.php'); // Sesuaikan dengan konfigurasi koneksi database Anda

// Ambil data booking dari database
$sql = "SELECT id_booking, id_penyewa, no_kamar, username, no_hp, durasi, total_harga FROM booking";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<link rel="stylesheet" href="style.css">
<html>
<head>
    <title>Daftar Pemesanan</title>
    <style>
        nav {
            background: #2f1348;
            color: #fff;
            padding: 20 px 0;
            
        }

        .nav-links {
            list-style-type: none;
        }

        .nav-links li {
            display: inline-block;
            text-decoration: none;
            justify-content: center;
            align-items: center;
        }

        .nav-links li a {
            color: #fff;
            text-decoration: none;
        }

        .logo {
            font-size: 34px;
            font-weight: bold;
            margin-left: 80px;
            margin-right: -70px;
            weight:100%;
        }

        
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
     
         
            align-items: cent;
            min-height: 100vh;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

         .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 50px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<div class="container-logo">
    <nav>
     <div>
         <div class="logo">
             <a href="javascript:history.go(-1);"><img src="logoo.png" alt="Logo" /></a>
         </div>
    </div>
    </nav>
<body>
    <div class="container">
        <h1>Daftar Kamar Dipesan</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Booking</th>
                    <th>ID Penyewa</th>
                    <th>No Kamar</th>
                    <th>Username</th>
                    <th>No HP</th>
                    <th>Durasi</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id_booking'] . "</td>";
                        echo "<td>" . $row['id_penyewa'] . "</td>";
                        echo "<td>" . $row['no_kamar'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['no_hp'] . "</td>";
                        echo "<td>" . $row['durasi'] . "</td>";
                        echo "<td>Rp." . $row['total_harga'] . ".000</td>";
                        echo "<td><a href='lihat_detailbooking.php?id=" . $row['id_booking'] . "'>Lihat Detail</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data pemesanan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
