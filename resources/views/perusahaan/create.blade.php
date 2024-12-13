@extends('layouts.app')

@section('title', 'Tambah Perusahaan')
@section('header', 'Tambah Perusahaan')

@section('content')
    <div class="container">
        <h1>Tambah Perusahaan</h1>
        <form action="{{ route('perusahaan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_admin">Admin</label>
                <input type="text" class="form-control" id="id_admin" name="id_admin" required>
            </div>

            <div class="form-group">
                <label for="id_admin_payroll_perusahaan">Admin Payroll Perusahaan</label>
                <input type="text" class="form-control" id="id_admin_payroll_perusahaan"
                    name="id_admin_payroll_perusahaan" required>
            </div>
            <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>

            <div class="form-group">
                <label for="jumlah_karyawan">Jumlah Karyawan</label>
                <input type="number" class="form-control" id="jumlah_karyawan" name="jumlah_karyawan" required>
            </div>

            <div class="form-group">
                <label for="jumlah_dana_di_bank">Jumlah Dana di Bank</label>
                <input type="number" class="form-control" id="jumlah_dana_di_bank" name="jumlah_dana_di_bank" required>
            </div>



            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
