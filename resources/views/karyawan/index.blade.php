@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="mb-4">Daftar Karyawan Perusahaan: <strong>{{ $perusahaan->nama_perusahaan }}</strong></h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Karyawan</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Nama Bank</th>
                    <th>Nomor Rekening</th>
                    <th>Tanggal Penggajian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($karyawan->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada karyawan untuk perusahaan ini.</td>
                    </tr>
                @else
                    @foreach ($karyawan as $karyawan)
                        <tr>
                            <td>{{ $karyawan->id_karyawan }}</td>
                            <td>{{ $karyawan->nama_karyawan }}</td>
                            <td>{{ $karyawan->email }}</td>
                            <td>{{ $karyawan->jabatan }}</td>
                            <td>Rp {{ number_format($karyawan->gaji_pokok, 2, ',', '.') }}</td>
                            <td>{{ $karyawan->nama_bank }}</td>
                            <td>{{ $karyawan->no_rekening }}</td>
                            <td>{{ $karyawan->tanggal_penggajian }}</td>
                            <td>
                                <form action="{{ route('transaksi.processPayroll', $karyawan->id_karyawan) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Penggajian</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between mt-3">
    <a href="{{ route('karyawan.exportPdf') }}" class="btn btn-danger btn-sm">Export PDF</a>
    <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary btn-sm">Kembali ke Daftar Perusahaan</a>
    </div>
@endsection
