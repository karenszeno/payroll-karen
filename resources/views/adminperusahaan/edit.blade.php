@extends('layouts.app2')

@section('content')
    <h1>Edit Karyawan untuk Perusahaan: {{ $perusahaan->nama_perusahaan }}</h1>

    <form
        action="{{ route('adminperusahaan.update', ['perusahaan' => $perusahaan->id_perusahaan, 'adminperusahaan' => $karyawan->id_karyawan]) }}"
        method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control"
                value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" 
                value="{{ old('email', $karyawan->email) }}" required>
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-control" required>
                <option value="Manager" {{ old('jabatan', $karyawan->jabatan) == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Staff" {{ old('jabatan', $karyawan->jabatan) == 'Staff' ? 'selected' : '' }}>Staff</option>
                <option value="Supervisor" {{ old('jabatan', $karyawan->jabatan) == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="HRD" {{ old('jabatan', $karyawan->jabatan) == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="Finance" {{ old('jabatan', $karyawan->jabatan) == 'Finance' ? 'selected' : '' }}>Finance</option>
            </select>
        </div>

        <div class="form-group">
            <label for="no_rekening">Nomor Rekening</label>
            <input type="number" name="no_rekening" id="no_rekening" class="form-control"
                value="{{ old('no_rekening', $karyawan->no_rekening) }}" placeholder="Masukkan nomor rekening" required>
        </div>

        <div class="form-group">
            <label for="tanggal_penggajian">Tanggal Penggajian</label>
            <input type="date" name="tanggal_penggajian" id="tanggal_penggajian" class="form-control"
                value="{{ old('tanggal_penggajian', $karyawan->tanggal_penggajian) }}" required>
        </div>

        <!-- Tambahan Field Gaji Pokok -->
        <div class="form-group">
            <label for="gaji_pokok">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control"
                value="{{ old('gaji_pokok', $karyawan->gaji_pokok) }}" required>
        </div>

        <!-- Tambahan Field Nama Bank -->
        <div class="form-group">
            <label for="nama_bank">Nama Bank</label>
            <input type="text" name="nama_bank" id="nama_bank" class="form-control"
                value="{{ old('nama_bank', $karyawan->nama_bank) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Karyawan</button>
    </form>
@endsection