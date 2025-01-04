<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            display: flex;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 600px;
        }
        .left-section {
            background-color: #ffffff;
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .right-section {
            width: 50%;
            padding: 20px;
        }
        .thank-you {
            font-size: 24px;
            font-weight: bold;
            color: #ff0000;
            margin-bottom: 10px;
        }
        .invoice-details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="left-section">
            <img src="{{ asset('assets/image/logoec.png') }}" alt="Logo" style="max-width: 100px;"/>
        </div>
        <div class="right-section">
            <div class="thank-you">Thank You For Your Purchases!</div>
            <p>Invoice: xxxxxxxx-yyyyyy-zzzzzz</p>
            <p>Tanggal: 12 Desember 2024</p>
            <p>No. Hp: 089710001144</p>
            <p>Alamat: Jl. Cibiru Indah, Pondok Sultan Kamar No. 3 Kota Sukabumi</p>
            <strong>Total Belanja: </strong><p>Rp. 22.000</p>
        </div>
    </div>

</body>
</html>