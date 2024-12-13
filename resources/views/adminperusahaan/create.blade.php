@extends('layouts.app2')

@section('content')
    <h1>Tambah Karyawan untuk Perusahaan: {{ $perusahaan->nama_perusahaan }}</h1>

    <form action="{{ route('adminperusahaan.store', $perusahaan->id_perusahaan) }}" method="POST">
        @csrf
        <input type="hidden" name="nama_perusahaan" id="nama_perusahaan" value="{{ $perusahaan->nama_perusahaan }}">
        
        <input type="hidden" name="id_perusahaan" id="id_perusahaan" value="{{ $perusahaan->id_perusahaan }}">

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
            </select>
        </div>

        <div class="form-group">
    <label for="gaji_pokok">Gaji Pokok</label>
    <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" value="{{ $perusahaan->id_perusahaan }}">
</div>

<script>
    document.getElementById('jabatan').addEventListener('change', function () {
        var jabatan = this.value;
        var gajiPokok;

        switch (jabatan) {
            case 'Manager':
                gajiPokok = 10000000.00; // Tambahkan nilai decimal
                break;
            case 'Staff':
                gajiPokok = 5000000.00;
                break;
            case 'Supervisor':
                gajiPokok = 7000000.00;
                break;
            case 'HRD':
                gajiPokok = 6000000.00;
                break;
            case 'Finance':
                gajiPokok = 8000000.00;
                break;
            default:
                gajiPokok = 0.00;
        }

        // Format gajiPokok menjadi desimal (10,2)
        document.getElementById('gaji_pokok').value = gajiPokok.toFixed(2);
    });
</script>



        <div class="form-group">
            <label for="no_rekening">Nomor Rekening</label>
            <input type="number" name="no_rekening" id="no_rekening" class="form-control"
                placeholder="Masukkan nomor rekening" required>
        </div>

        <div class="form-group">
            <label for="nama_bank">Nama Bank</label>
            <input type="text" name="nama_bank" id="nama_bank" class="form-control" value="BCA" readonly>
        </div>


        <div class="form-group">
            <label for="tanggal_penggajian">Tanggal Penggajian</label>
            <input type="date" name="tanggal_penggajian" id="tanggal_penggajian" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Karyawan</button>
    </form>
@endsection
