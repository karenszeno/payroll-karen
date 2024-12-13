@extends('layouts.app2')

@section('content')
    <h1>Edit Karyawan untuk Perusahaan: {{ $perusahaan->nama_perusahaan }}</h1>

    <form action="{{ route('adminkaryawan.update', ['perusahaan' => $perusahaan->id_perusahaan, 'adminkaryawan' => $karyawan->id_karyawan]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" value="{{ $karyawan->nama_karyawan }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $karyawan->email }}" required>
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-control" required>
                <option value="Manager" {{ $karyawan->jabatan == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Staff" {{ $karyawan->jabatan == 'Staff' ? 'selected' : '' }}>Staff</option>
                <option value="Supervisor" {{ $karyawan->jabatan == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="HRD" {{ $karyawan->jabatan == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="Finance" {{ $karyawan->jabatan == 'Finance' ? 'selected' : '' }}>Finance</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Karyawan</button>
    </form>
@endsection
