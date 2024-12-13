@extends('layouts.app')

@section('title', 'Transaksi')
@section('header', 'Daftar Perusahaan')

@section('content')
    <div class="container">
        <h1 class="mb-3">Daftar Perusahaan</h1>

        <!-- Search Form -->
        <form action="{{ route('transaksi.index') }}" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Cari Perusahaan" value="{{ request()->query('search') }}" class="form-control" style="width: 300px; display: inline-block;">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

        <!-- Table to display Perusahaan -->
        <table class="table">
            <thead>
                <tr>
                    <th>Id Perusahaan</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Dana di Bank</th>
                    <th>Jumlah Karyawan</th>
                    <th>Detail </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perusahaans as $index => $perusahaan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $perusahaan->nama_perusahaan }}</td>
                        <td>{{ $perusahaan->alamat }}</td>
                        <td>Rp {{ number_format($perusahaan->jumlah_dana_di_bank, 2, ',', '.') }}</td>
                        <td>{{ $perusahaan->jumlah_karyawan }}</td>
                        <td>
                            <a href="{{ route('karyawan.index', $perusahaan->id_perusahaan) }}" class="btn btn-info">
                                Detail Karyawan
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
