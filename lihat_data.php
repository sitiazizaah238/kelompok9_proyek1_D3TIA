<?php include 'db.php' ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
<center><h2>Membuat Laporan PDF Dengan PHP dan MySQLi</h2></center>
<br>
<div class="float-right">
<a href="print_data.php" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp PRINT</a>
<br>
<br>
</div>

<table class="table table-bordered">
<thead>
<tr>
<th style="text-align: center;">No</th>
<th style="text-align: center;">ID</th>
<th style="text-align: center;">Nama</th>
<th style="text-align: center;">Deskripsi</th>
<th style="text-align: center;">Harga</th>
<th style="text-align: center;">Lokasi</th>
<th style="text-align: center;">Foto</th>
</tr>
</thead>
<tbody>
<?php
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM kamar");
while ($d = mysqli_fetch_array($data)) {
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $d['id_kamar']; ?></td>
<td><?php echo $d['no_kamar']; ?></td>
<td><?php echo $d['deskripsi']; ?></td>
<td><?php echo $d['harga']; ?></td>
<td><?php echo $d['lokasi']; ?></td>
<td><img src="<?php echo $d['foto']; ?>" alt="" width="150"></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</body>
</html>
