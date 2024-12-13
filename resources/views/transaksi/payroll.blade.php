@extends('layouts.app')

@section('title', 'Detail Payroll')
@section('header', 'Detail Karyawan Perusahaan')

@section('content')
    <div class="container">
        <h1>Detail Karyawan Perusahaan: {{ $perusahaan->nama_perusahaan }}</h1>

        <!-- Table to display Payroll Details -->
        <table class="table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Gaji Pokok
                <th>Nomor Rekening</th>
                <th>Tanggal Penggajian</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payrolls as $index => $payroll)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $payroll->nama_karyawan }}</td>
                        <td>{{ $payroll->jabatan }}</td>
                        <td>Rp {{ number_format($payroll->gaji_pokok, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($payroll->tunjangan_jabatan, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($payroll->lembur, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($payroll->uang_makan, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($payroll->jmlh_gaji, 0, ',', '.') }}</td>
                        <td>{{ $payroll->tgl_penggajian }}</td>
                        <td>
                            <a href="{{ route('payroll.process', $payroll->id) }}" class="btn btn-primary btn-sm">Proses Penggajian</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Perusahaan</a>
    </div>
@endsection
