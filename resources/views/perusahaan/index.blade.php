@extends('layouts.app')

@section('title', 'Daftar Perusahaan')
@section('header', 'Daftar Perusahaan')

@section('content')
    <div class="container">
        <h1>Daftar Perusahaan</h1>

        <!-- Search Form -->
        <form action="{{ route('perusahaan.index') }}" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Cari Perusahaan" value="{{ request()->query('search') }}" class="form-control" style="width: 300px; display: inline-block;">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

        <!-- Link to create a new Perusahaan -->
        <a href="{{ route('perusahaan.create') }}" class="btn btn-success mb-3">Tambah Perusahaan</a>

        <!-- Table to display Perusahaan -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID Perusahaan</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Jumlah Karyawan</th>
                    <th>Jumlah Dana di Bank</th>
                    <th>Detail</th>
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perusahaans as $perusahaan)
                    <tr>
                        <td>{{ $perusahaan->id_perusahaan }}</td>
                        <td>{{ $perusahaan->nama_perusahaan }}</td>
                        <td>{{ $perusahaan->alamat }}</td>
                        <td>{{ $perusahaan->telepon }}</td>
                        <td>{{ $perusahaan->jumlah_karyawan }}</td>
                        <td>Rp {{ number_format($perusahaan->jumlah_dana_di_bank, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('perusahaan.show', $perusahaan->id_perusahaan) }}" class="btn btn-info">Detail</a>
                        </td>
                        <td>
                            <a href="{{ route('perusahaan.edit', $perusahaan->id_perusahaan) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('perusahaan.destroy', $perusahaan->id_perusahaan) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
