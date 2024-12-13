<!DOCTYPE html>
<html>
<head>
    <title>Daftar Karyawan Perusahaan: {{ $perusahaan->nama_perusahaan }}</title>
    <style>
        /* Mengatur ukuran dan orientasi kertas A4 Landscape */
        @page {
            size: A4 landscape;
            margin: 20mm; /* Menambah margin sekitar 20mm */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        h1 {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Daftar Karyawan Perusahaan: <strong>{{ $perusahaan->nama_perusahaan }}</strong></h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Nama Bank</th>
                <th>Nomor Rekening</th>
                <th>Tanggal Penggajian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $karyawan)
                <tr>
                    <td>{{ $karyawan->id_karyawan }}</td>
                    <td>{{ $karyawan->nama_karyawan }}</td>
                    <td>{{ $karyawan->email }}</td>
                    <td>{{ $karyawan->jabatan }}</td>
                    <td>Rp {{ number_format($karyawan->gaji_pokok, 2, ',', '.') }}</td>
                    <td>{{ $karyawan->nama_bank }}</td>
                    <td>{{ $karyawan->no_rekening }}</td>
                    <td>{{ $karyawan->tanggal_penggajian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
