<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran Kost</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"], select, input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .submit-container {
            text-align: right;
        }
        input[type="submit"] {
            background-color: #8000ff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #8000ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Konfirmasi Pembayaran Kost</h2>
        <form action="process_payment.php" method="post" enctype="multipart/form-data">
            <label for="tenantName">Nama Penyewa:</label>
            <input type="text" id="tenantName" name="tenantName" required>
            
            <label for="rentDuration">Durasi Sewa (bulan):</label>
            <input type="number" id="rentDuration" name="rentDuration" required>
            
            <label for="totalAmount">Total Harga (Rp):</label>
            <input type="text" id="totalAmount" name="totalAmount" readonly>
            
            <label for="block">Blok:</label>
            <select id="block" name="block" required>
                <option value="A">A</option>
                <option value="B">B</option>
            </select>

            <label for="accountNumber">Nomor Rekening Tujuan:</label>
            <input type="text" id="accountNumber" name="accountNumber" required>
            
            <label for="transferProof">Bukti Transfer:</label>
            <input type="file" id="transferProof" name="transferProof" accept="image/*" required>
            
            <div class="submit-container">
                <input type="submit" value="Konfirmasi Pembayaran">
            </div>
        </form>
    </div>

    <script>
        document.getElementById('rentDuration').addEventListener('input', calculateTotal);

        function calculateTotal() {
            var rentDuration = parseInt(document.getElementById('rentDuration').value);
            var totalAmount = 500000 * rentDuration; // Harga tetap per bulan adalah 500 ribu

            document.getElementById('totalAmount').value = totalAmount.toLocaleString('id-ID'); // Format harga sebagai mata uang Indonesia
        }
    </script>
</body>
</html>
