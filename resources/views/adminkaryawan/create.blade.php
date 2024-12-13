@extends('layouts.app2')

@section('content')
    <h1>Tambah Karyawan untuk Perusahaan: {{ $perusahaan->nama_perusahaan }}</h1>

    <form action="{{ route('adminkaryawan.store', $perusahaan->id_perusahaan) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-control" required>
                <option value="">Pilih Jabatan</option>
                <option value="Manager">Manager</option>
                <option value="Staff">Staff</option>
                <option value="Supervisor">Supervisor</option>
                <option value="HRD">HRD</option>
                <option value="Finance">Finance</option>
                <!-- Tambahkan pilihan jabatan sesuai kebutuhan -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Karyawan</button>
    </form>
@endsection