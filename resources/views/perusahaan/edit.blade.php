@extends('layouts.app')

@section('title', 'Edit Perusahaan')
@section('header', 'Edit Perusahaan')

@section('content')
    <div class="container">
        <h1>Edit Perusahaan</h1>
        <form action="{{ route('perusahaan.update', $perusahaan->id_perusahaan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_admin">Admin</label>
                <input type="text" class="form-control" id="id_admin" name="id_admin" value="{{ $perusahaan->id_admin }}" required readonly>
            </div>

            <div class="form-group">
                <label for="id_admin_payroll_perusahaan">Admin Payroll Perusahaan</label>
                <input type="text" class="form-control" id="id_admin_payroll_perusahaan"
                    name="id_admin_payroll_perusahaan" value="{{ $perusahaan->id_admin_payroll_perusahaan }}" required readonly>
            </div>
            <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                    value="{{ $perusahaan->nama_perusahaan }}" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $perusahaan->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $perusahaan->email }}"
                    required>
            </div>

            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $perusahaan->telepon }}"
                    required>
            </div>

            <div class="form-group">
                <label for="jumlah_karyawan">Jumlah Karyawan</label>
                <input type="number" class="form-control" id="jumlah_karyawan" name="jumlah_karyawan"
                    value="{{ $perusahaan->jumlah_karyawan }}" required>
            </div>

            <div class="form-group">
                <label for="jumlah_dana_di_bank">Jumlah Dana di Bank</label>
                <input type="number" class="form-control" id="jumlah_dana_di_bank" name="jumlah_dana_di_bank"
                    value="{{ $perusahaan->jumlah_dana_di_bank }}" required>
            </div>



            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
