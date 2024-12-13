@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to the Dashboard</h1>
        
        <!-- Box Statistik -->
        <div class="row">
            <div class="col-md-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Karyawan</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalKaryawan }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Transaksi Bulan Ini</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalTransaksi }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Transaksi per Bulan -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Grafik Transaksi Per Bulan</h3>
                <canvas id="transaksiChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Data untuk grafik
        var ctx = document.getElementById('transaksiChart').getContext('2d');
        var transaksiChart = new Chart(ctx, {
            type: 'line', // Jenis grafik (bisa juga bar, pie, dll.)
            data: {
                labels: @json($bulan), // Bulan
                datasets: [{
                    label: 'Total Transaksi',
                    data: @json($jumlahTransaksi), // Jumlah transaksi per bulan
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna background
                    borderColor: 'rgba(75, 192, 192, 1)', // Warna border
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>

@endsection


<!-- @extends('layouts.app2')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1>Selamat Datang di Sistem Manajemen Perusahaan</h1>
        <p class="text-muted">Kelola perusahaan, karyawan, dan penggajian dengan mudah dan efisien.</p>
    </div>

    <div class="row">
        Card untuk Perusahaan
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-buildings display-3 text-primary"></i>
                    <h4 class="mt-3">Manajemen Perusahaan</h4>
                    <p class="text-muted">Kelola data perusahaan, tambahkan informasi perusahaan baru, dan perbarui detailnya.</p>
                    <a href="{{ route('perusahaan.index') }}" class="btn btn-primary">Kelola Perusahaan</a>
                </div>
            </div>
        </div>

        Card untuk Karyawan
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-people display-3 text-success"></i>
                    <h4 class="mt-3">Manajemen Karyawan</h4>
                    <p class="text-muted">Lihat, tambahkan, dan kelola data karyawan yang terdaftar di perusahaan Anda.</p>
                    @if ($perusahaan->isEmpty())
                     Cek apakah tidak ada perusahaan
                        <p class="text-muted">Belum ada perusahaan terdaftar.</p>
                    @else
                        @foreach ($perusahaan as $p) Jika menggunakan koleksi, loop setiap perusahaan
                            <a href="{{ route('karyawan.index', ['perusahaanId' => $p->id]) }}" class="btn btn-success mb-2">
                                Kelola Karyawan di {{ $p->nama }}
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        Card untuk Penggajian
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-cash-coin display-3 text-warning"></i>
                    <h4 class="mt-3">Manajemen Penggajian</h4>
                    <p class="text-muted">Atur dan kelola pembayaran gaji karyawan secara cepat dan akurat.</p>
                    <a href="{{ route('penggajian.index') }}" class="btn btn-warning">Kelola Penggajian</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center">
        <p class="text-muted">&copy; {{ date('Y') }} Sistem Manajemen Perusahaan. Semua hak dilindungi.</p>
    </div>
</div>
@endsection -->
