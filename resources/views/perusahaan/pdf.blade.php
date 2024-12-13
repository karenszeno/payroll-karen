<!DOCTYPE html>
<html>
<head>
    <title>Detail Perusahaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
        }
        .content {
            margin: 20px;
        }
        .content p {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Detail Perusahaan</h1>
    <div class="content">
        <p><strong>Nama Perusahaan:</strong> {{ $perusahaan->nama_perusahaan }}</p>
        <p><strong>Alamat:</strong> {{ $perusahaan->alamat }}</p>
        <p><strong>Telepon:</strong> {{ $perusahaan->telepon }}</p>
        <p><strong>Jumlah Karyawan:</strong> {{ $perusahaan->jumlah_karyawan }}</p>
        <p><strong>Jumlah Dana di Bank:</strong> Rp {{ number_format($perusahaan->jumlah_dana_di_bank, 2, ',', '.') }}</p>
    </div>
</body>
</html>
