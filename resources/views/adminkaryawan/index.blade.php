@extends('layouts.app2')

@section('content')
    <h1>Daftar Karyawan Perusahaan: {{ $perusahaan->nama_perusahaan }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($karyawans->isEmpty())
                <tr>
                    <td colspan="5">Tidak ada karyawan untuk perusahaan ini.</td>
                </tr>
            @else
                @foreach ($karyawans as $karyawan)
                    <tr>
                        <td>{{ $karyawan->id_karyawan }}</td>
                        <td>{{ $karyawan->nama_karyawan }}</td>
                        <td>{{ $karyawan->email }}</td>
                        <td>{{ $karyawan->jabatan }}</td>
                        <td>
                            <a href="{{ route('adminkaryawan.edit', ['perusahaan' => $perusahaan->id_perusahaan, 'adminkaryawan' => $karyawan->id_karyawan]) }}"
                                class="btn btn-warning">Edit</a>
                            <form
                                action="{{ route('adminkaryawan.destroy', ['perusahaan' => $perusahaan->id_perusahaan, 'adminkaryawan' => $karyawan->id_karyawan]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
