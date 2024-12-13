@extends('layouts.app')

@section('title', 'Detail Perusahaan')

@section('content')
    <div class="container">
        <h1 style="font-size: 2.5rem;">Detail Perusahaan</h1>
        <div class="card">
            <div class="card-body">
                <h3 style="font-size: 2rem;">{{ $perusahaan->nama_perusahaan }}</h3>
                <p style="font-size: 1.2rem;"><strong>Alamat:</strong> {{ $perusahaan->alamat }}</p>
                <p style="font-size: 1.2rem;"><strong>Telepon:</strong> {{ $perusahaan->telepon }}</p>
                <p style="font-size: 1.2rem;"><strong>Jumlah Karyawan:</strong> {{ $perusahaan->jumlah_karyawan }}</p>
                <p style="font-size: 1.2rem;"><strong>Jumlah Dana di Bank:</strong> Rp {{ number_format($perusahaan->jumlah_dana_di_bank, 2, ',', '.') }}</p>
            </div>
        </div>
        <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Perusahaan</a>
        <a href="{{ route('karyawan.index', $perusahaan->id_perusahaan) }}" class="btn btn-primary mt-3">Detail Karyawan</a>
        <a href="{{ route('perusahaan.export_pdf', $perusahaan->id_perusahaan) }}" class="btn btn-danger mt-3">Export PDF</a>
    </div>
@endsection
